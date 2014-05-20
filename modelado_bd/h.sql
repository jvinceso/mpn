SELECT rd.nRecId ,
       p.nPerId AS CodigoPersona ,
	   case MONTH(fv.dFevFecha_vence) 
			WHEN 1 THEN 'Enero'
			WHEN 2 THEN 'Febrero'
			WHEN 3 THEN 'Marzo'
			WHEN 4 THEN 'Abril'
			WHEN 5 THEN 'Mayo'
			WHEN 6 THEN 'Junio'
			WHEN 7 THEN 'Julio'
			WHEN 8 THEN 'Agosto'
			WHEN 9 THEN 'Septiembre'
			WHEN 10 THEN 'Octubre'
			WHEN 11 THEN 'Noviembre'
			WHEN 12 THEN 'Diciembre'
			ELSE 'Esto no es un Mes'
	   END as Mes,
	   YEAR( fv.dFevFecha_vence ) as Anio,
       CONCAT(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) AS Nombres ,
       CONCAT(v.cViaNombre,' ',c.cCalNombre,' ',pd.cPdeValor) AS Domicilio ,
       s.cSecNombre AS Lugar ,
       CONCAT(m.cMulDescripcion,' - ',mt.cMulDescripcion) AS Concepto ,
       rd.cRedPrecio AS Importe ,
       DATE_FORMAT(cast(r.dRecFechaImpresion AS datetime),'%d/%m/%Y') AS FechaEmision ,
       fv.dFevFecha_vence AS FechaVencimiento ,
       fv.dFevFecha_corte AS FechaCorte ,
       r.fRecDeuda
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
WHERE rd.nRecId IN(157,158,159,160,161,162,163);
select * from calle;
select * from recibo;
select * from recibo_detalle;
select * from fechas_vencimiento;
-- Sin Tratar
SELECT 
 *
from recibo_detalle rd
INNER JOIN servicios_contribuyente sc on sc.nSecId = rd.nSecId
INNER JOIN servicios_tipo st on st.nSetId = sc.nSetId
	 inner join multitabla m on m.nMulId = st.nMulServicio
	 -- inner join multitabla mt on mt.nMulId = st.nMulTipoServicio
where rd.nRecId = 157;
select DATE_FORMAT(NOW(),'%d/%m/%Y');
select * from persona_detalle where nPerId = 51;
select * from multitabla where nMulId = 46;
select * from persona_detalle pd where pd.nPerId = 51 and pd.nMulId = 46;