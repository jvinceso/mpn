SELECT 
  r.nRecId as "ID"
	,@i := @i + 1 as Cuota -- Contador stilo Row_Number() sql server
	,f.dFevFecha_vence AS "Fecha Vencimiento"
	,(
SELECT
	case 
		when st.nSetId IN( 1,2,3) then SUM(rd.cRedPrecio)
		else 0.0
	end 
FROM recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
	where rd.nRecId = r.nRecId
	 ) as "Agua"
	,(
SELECT
	case 
		when st.nSetId IN (12,13) then SUM(rd.cRedPrecio)
		else 0.0
	end 
FROM recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
	where rd.nRecId = r.nRecId
	 ) as "Desague"
	,(
SELECT
case 
		when st.nSetId IN (15,16) then SUM(rd.cRedPrecio)
		else 0.0
	end 
FROM recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
	where rd.nRecId = r.nRecId
	 ) as "Limpieza Municipal"

	,r.fRecDeuda AS "Deuda"
	,r.fRecAbono AS "Abonos"
FROM recibo r
	INNER JOIN fechas_vencimiento f ON f.nFevId = r.nFevId
	,(select @i := 0) temp
WHERE r.nPerIdContribuyente = 14
	ORDER BY nRecId ASC;