select * from demo;
-- Iteration Recibos por Mes
select nFevId,nFevCuota from fechas_vencimiento where nFevAnio = 2014;
-- Encabezado Recibo
-- 	nRecId,dRecFechaImpresion,fRecDeuda,fRecAbono,fRecDescuento,cRecPagado,dRecFechaPago,nFevId,nPerId,nTmuId
select p.nPerId from persona p
	inner join servicios_contribuyente sc on p.nPerId = sc.nPerId
	inner join costo_servicios_tipo cst on sc.nSetId = cst.nSetId
where cPerEstado = 1 and cst.nCstAnio = 2014
group by p.nPerId;
-- Detalle Recibo ------------nSecId,cRedPrecio
select * from servicios_contribuyente sc
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	-- inner join multitabla m on m.nMulId = st.nMulServicio
	-- inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.nPerId = 14  and sc.cSecEstado = 1 and cst.nCstAnio = 2014; -- and st.nMulServicio = 52 ;
select sc.nSecId,cst.fCstPago from servicios_contribuyente sc
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.nPerId = 11  and sc.cSecEstado = 1 and cst.nCstAnio = 2014;
describe Recibo_Detalle;
select * from costo_servicios_tipo ;
select * from trabajador_municipal where nPerId= 2;
select * from servicios_contribuyente order by 1 desc;
select * from servicios_contribuyente sc where sc.nPerId = 14 ;
select * from direccion_calle where nPdeId = 135;
select * from Recibo ;
select * from Recibo where nPerIdContribuyente = 11;
select * from Recibo_Detalle where nRecId = 98;
delete from recibo where true = true;
truncate table recibo;
truncate table recibo_detalle;

select * from servicios_contribuyente;
select * from persona where nPerId = 35;
select * from multitabla where nMulIdPadre = 51;