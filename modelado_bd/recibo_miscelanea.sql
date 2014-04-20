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
-- Detalle Recibo ------------
select * from servicios_contribuyente sc
	inner join servicios_tipo st ON sc.nSetId = st.nSetId
	inner join multitabla m on m.nMulId = st.nMulServicio
	inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
	inner join costo_servicios_tipo cst on st.nSetId = cst.nSetId
where sc.nPerId = 14  and sc.cSecEstado = 1 and cst.nCstAnio = 2014; -- and st.nMulServicio = 52 ;
select * from costo_servicios_tipo ;
select * from trabajador_municipal where nPerId= 2;
select * from servicios_contribuyente order by 1 desc;
select * from servicios_contribuyente sc where sc.nPerId = 14 ;
select * from direccion_calle where nPdeId = 135;
select * from Recibo_Detalle;
select * from Recibo;
describe Recibo;
select * from servicios_contribuyente;
select * from persona where nPerId = 35;
select * from multitabla where nMulIdPadre = 51;