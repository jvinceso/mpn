select 

r.nRecId
	,p.nPerId AS CodigoPersona
	,CASE MONTH(fv.
dFevFecha_vence)
		WHEN 1
			THEN "Enero"
		WHEN 2
			THEN "Febrero"
		WHEN 3
			THEN "Marzo"
		WHEN 4
			THEN "Abril"
		WHEN 5
			THEN "Mayo"
		WHEN 6
			THEN "Junio"
		WHEN 7
			THEN "Julio"
		WHEN 8
			THEN "Agosto"
		WHEN 9
			THEN "Septiembre"
		WHEN 10
			THEN "Octubre"
		WHEN 11
			THEN "Noviembre"
		WHEN 12
			THEN "Diciembre"
		ELSE "Esto no es un Mes"
		END AS Mes
	,YEAR(fv.dFevFecha_vence) AS Anio
	,CONCAT (
		p.cPerApellidoPaterno
		," "
		,p.cPerApellidoMaterno
		," "
		,p.cPerNombres
		) AS Nombres
	,CONCAT (
		v.cViaNombre
		," "
		,c.cCalNombre
		," "
		,pd.cPdeValor
		) AS Domicilio
	,s.cSecNombre AS Lugar
	,DATE_FORMAT(cast(r.dRecFechaImpresion AS DATETIME), "%d/%m/%Y") AS FechaEmision
	,fv.dFevFecha_vence AS FechaVencimiento
	,fv.dFevFecha_corte AS FechaCorte
	,CONCAT (
		"S/. "
		,r.fRecDeuda
		) AS Deuda


from recibo r 
	inner join fechas_vencimiento fv on r.nFevId = fv.nFevId
 	inner join  recibo_detalle rd on rd.nRecId and r.nRecId
	INNER JOIN servicios_contribuyente sc ON sc.nSecId = rd.nSecId
	INNER JOIN persona p ON p.nPerId = r.nPerIdContribuyente
	INNER JOIN direccion_calle dc ON dc.nDicId = sc.nDicId
	INNER JOIN persona_detalle pd ON pd.nPdeId = dc.nPdeId
	INNER JOIN calle c ON c.nCalId = dc.nCalId
	INNER JOIN via v ON v.nViaId = c.nViaId
	INNER JOIN sector s ON s.nSecId = c.nSecId
where fv.nFevCuota = 5 and fv.nFevAnio = 2014
AND sc.cSecEstado = 1 AND fv.cFevEstado = 1 AND p.cPerEstado = 1 AND c.cCalEstado = 1 AND v.cViaEstado = 1 	AND s.cSecEstado = 1
group by r.nRecId;