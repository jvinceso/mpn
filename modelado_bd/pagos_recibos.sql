SELECT GROUP_CONCAT(r.nRecId) as codRecibo
 FROM recibo r 
	inner join fechas_vencimiento fv on fv.nFevId = r.nFevId
where r.nPerIdContribuyente = 38 and r.cRecPagado = 'P' and r.cRecEstado = 1
and fv.nFevAnio = 2014 and fv.cFevEstado = 1;
select *from fechas_vencimiento;
select * from recibo;
SELECT r.nRecId,fv.nFevAnio, fv.nFevCuota,r.fRecDeuda	
 FROM recibo r 
	inner join fechas_vencimiento fv on fv.nFevId = r.nFevId
where r.nPerIdContribuyente = 38 and r.cRecPagado = 'P' and r.cRecEstado = 1
and fv.nFevAnio = 2014 and fv.cFevEstado = 1;


SELECT r.*
 FROM recibo r 
where r.nPerIdContribuyente = 38 ;
select * from caja_pagos where cCpaSerieNumero like 'AGUA-%' and nPerId = 38 and nCpaId > 33;