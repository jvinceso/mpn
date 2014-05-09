SELECT 
	rd.nRedId
	,case 
		when st.nSetId IN( 1,2,3) then SUM(rd.cRedPrecio)
		else 0.0
	end as "Agua"
	,case 
		when st.nSetId IN (12,13) then SUM(rd.cRedPrecio)
		else 0.0
	end as "Desague"
	,case 
		when st.nSetId IN (15,16) then SUM(rd.cRedPrecio)
		else 0.0
	end as "Limpieza Municipal"
,SUM(rd.cRedPrecio) as "Deuda"
from recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
	where rd.nRecId = 98;
-- Servicios Tipo 
select st.nSetId,ms.cMulDescripcion as Servicio, mt.cMulDescripcion as Tipo,cst.fCstPago from servicios_tipo st
inner join multitabla ms on ms.nMulId = st.nMulServicio
inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
inner join costo_servicios_tipo cst on cst.nSetId = st.nSetId
order by ms.cMulDescripcion,st.nSetId;

select * from servicios_contribuyente;
select * from servicios_tipo st
inner join multitabla ms on ms.nMulId = st.nMulServicio
inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
inner join costo_servicios_tipo cst on cst.nSetId = st.nSetId
;
SELECT 
	rd.nRedId AS nRedId

,rd.cRedPrecio as Deuda
from recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
where rd.nRecId = 98;