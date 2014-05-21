select * from caja_pagos;
describe caja_pagos;
select * from concepto;
describe recibo;
DELETE from recibo where YEAR(dFecFechaRegistro) = YEAR( now() );
select * from recibo where nRecId = 374  AND cRecEstado = "P" AND cRecPagado is null;
select  * from trabajador_municipal;
UPDATE recibo SET cRecPagado = 'T' where nRecId = 4;

select nTmuId
            from persona p 
			inner join trabajador_municipal tm on p.nPerId = tm.nPerId
		 	inner join multitabla m1			   on  tm.nMulArea = m1.nMulId
            where p.cPerContribuyente='NO' and p.cPerEstado=1  and m1.cMulEstado = 1
and p.nPerId= 2;
SELECT 
	r.nRecId, r.dRecFechaImpresion, ( IFNULL(r.fRecDeuda,0) + IFNULL(r.fRecAbono,0) ) as Monto, 
	case MONTH(fv.dFevFecha_vence) 
				WHEN 1 THEN "Enero"
				WHEN 2 THEN "Febrero"
				WHEN 3 THEN "Marzo"
				WHEN 4 THEN "Abril"
				WHEN 5 THEN "Mayo"
				WHEN 6 THEN "Junio"
				WHEN 7 THEN "Julio"
				WHEN 8 THEN "Agosto"
				WHEN 9 THEN "Septiembre"
				WHEN 10 THEN "Octubre"
				WHEN 11 THEN "Noviembre"
				WHEN 12 THEN "Diciembre"
				ELSE "Esto no es un Mes"
	END as Mes,
	YEAR( fv.dFevFecha_vence ) as Anio,
	r.dRecFechaPago, r.nFevId, r.nPerIdContribuyente FROM recibo r
	INNER JOIN fechas_vencimiento fv ON fv.nFevId = r.nFevId
where nRecId = 373;
SELECT SUBSTRING_INDEX('AGUA-45345', '-', -1);