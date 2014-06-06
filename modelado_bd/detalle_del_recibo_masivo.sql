SELECT rd.nRecId ,
		CONCAT(m.cMulDescripcion," - ",mt.cMulDescripcion) AS Concepto ,
		rd.cRedPrecio AS Importe 
		,r.fRecDeuda
		FROM recibo_detalle rd
		INNER JOIN recibo r ON rd.nRecId = r.nRecId
		INNER JOIN servicios_contribuyente sc ON sc.nSecId = rd.nSecId
		INNER JOIN servicios_tipo st ON st.nSetId = sc.nSetId
		INNER JOIN multitabla m ON m.nMulId = st.nMulServicio
		INNER JOIN multitabla mt ON mt.nMulId = st.nMulTipoServicio
		INNER JOIN fechas_vencimiento fv ON fv.nFevId = r.nFevId
		INNER JOIN persona p ON p.nPerId = r.nPerIdContribuyente
		INNER JOIN direccion_calle dc ON dc.nDicId = sc.nDicId
		INNER JOIN persona_detalle pd ON pd.nPdeId = dc.nPdeId
		INNER JOIN calle c ON c.nCalId = dc.nCalId
		INNER JOIN via v ON v.nViaId = c.nViaId
		INNER JOIN sector s ON s.nSecId = c.nSecId
		WHERE sc.cSecEstado = 1 AND st.cSetEstado = 1  AND m.cMulEstado = 1 AND mt.cMulEstado = 1 AND
		fv.cFevEstado = 1 AND p.cPerEstado = 1 AND c.cCalEstado = 1 AND v.cViaEstado = 1 AND s.cSecEstado = 1 AND   rd.nRecId = 7;
select * from recibo_detalle where nRecId = 7;
select * from recibo where nRecId = 7;