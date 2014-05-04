-- Row_number()
select  @i := @i + 1 as Cuota,nRecId from recibo ,(select @i := 0) temp where nPerIdContribuyente = 45 order by nRecId ASC ;

-- Iteration Recibos por Mes
select nFevId,nFevCuota from fechas_vencimiento where nFevAnio = 2014;
-- Encabezado Recibo
-- 	nRecId,dRecFechaImpresion,fRecDeuda,fRecAbono,fRecDescuento,cRecPagado,dRecFechaPago,nFevId,nPerId,nTmuId
select p.nPerId from persona p
	inner join servicios_contribuyente sc on p.nPerId = sc.nPerId
	inner join costo_servicios_tipo cst on sc.nSetId = cst.nSetId
where cPerEstado = 1 and cst.nCstAnio = 2013
group by p.nPerId;
-- Detalle Recibo ------------nSecId,cRedPrecio
select * from servicios_contribuyente sc
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	-- inner join multitabla m on m.nMulId = st.nMulServicio
	-- inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.nPerId = 35  and sc.cSecEstado = 1 and cst.nCstAnio = 2013; -- and st.nMulServicio = 52 ;
select sc.nSecId,cst.fCstPago from servicios_contribuyente sc
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.nPerId = 11  and sc.cSecEstado = 1 and cst.nCstAnio = 2014;
select * from Recibo where nPerIdContribuyente = 35;
select * from Recibo_Detalle where nRecId = 98;
-- Verificar Recibos
select  year(now());
select nRecId from recibo r
inner join servicios_contribuyente sc ON r.nPerIdContribuyente = sc.nPerId
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.cSecEstado = 1 and cst.nCstAnio = 2013;
 -- where YEAR(dFecFechaRegistro) = '2014' and nPerIdContribuyente IN(11,14,37,39);

select * from servicios_contribuyente;
select * from persona where nPerId = 35;
select * from multitabla where nMulIdPadre = 51;

select * from recibo_detalle rd
inner join servicios_contribuyente sc on rd.nSecId = sc.nSecId
inner join servicios_tipo st on st.nSetId = sc.nSetId
inner join multitabla ms on ms.nMulId = st.nMulServicio
inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
where sc.nPerId = 37;
select * from multitabla where nMulIdPadre = 51;