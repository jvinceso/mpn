select * from persona;
select * from usuario;
insert into persona(cPerApellidoPaterno,cPerApellidoMaterno,cPerNombres,cPerRandom)
values('Castro','Aurora','Diego Armando','e10adc3949ba59abbe56e057f20f883e'),('Vinces','Ortiz','José Alexander','e10adc3949ba59abbe56e057f20f883e');

describe usuario;

insert into usuario(nPerId,cPerUsuCodigo,cPerUsuClave) values(1,'dcastro','e10adc3949ba59abbe56e057f20f883e'),(2,'jvinces','e10adc3949ba59abbe56e057f20f883e');
select * from ubigeo;
/*Configuraciòn de Menus*/
INSERT INTO `bdmpnintegrado`.`aplicacion` (`cAplNombre`, `nAplTipo`, `cAplIcono`) VALUES ('Utilitarios', '1', 'fa-cogs');
INSERT INTO `bdmpnintegrado`.`objeto` (`nAplId`, `cObjNombre`, `bObjTipo`, `nObjIdPadre`) VALUES ('1', 'ConFigurar Modulos', '1', '0');
INSERT INTO `bdmpnintegrado`.`objeto_detalle` (`nObjId`, `cOdetNombreArchivo`, `nOdetTipo`, `cOdetPlataforma`) VALUES ('1', '../utilitarios/modulo.html', '1', 'I');
/*Permisos */
INSERT INTO `bdmpnintegrado`.`usuario_objeto` (`nObjId`, `nUsuId`) VALUES ('1', '2');
