<?php 
	$parametros = $this->input->post('json');
?>
<input type="hidden" id="txt_ins_apli_codigo" name = "txt_ins_apli_codigo" value="<?php print $parametros['docs'] ?>" />
<form id="frm_ins_mod_objeto" class="form-horizontal" role="form">
	<h3 class="header smaller lighter blue">
		Registrar Opciones para la Aplicación <?php print $parametros['nombre']; ?>
		<!-- // <small><?php print $parametros['nombre']; ?></small> -->
	</h3>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre de Opción </label>
		<div class="col-sm-9">
			<!-- <input type="hidden" id="txt_ins_ruta" name = "txt_ins_ruta" /> -->
			<input type="text" id="txt_ins_obj_nombre" name = "txt_ins_obj_nombre" placeholder="Ingrese Nombre de la Opción" class="col-xs-10 col-sm-5" />
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Archivo Controlador </label>
		<div class="col-sm-9">
			<input type="text" id="txt_ins_obj_file" name = "txt_ins_obj_file" placeholder="Ingrese su ruta controlador" class="col-xs-10 col-sm-5" />
			<span class="input-group-btn">
				<button id="btnBuscarController" type="button" class="btn btn-purple btn-sm">
					Buscar
					<i class="icon-sitemap bigger-110"></i>
				</button>
			</span>	
		</div>
	</div>
	<div class="space-4"></div>
	<center>
		<div class="form-group">
			<div class="col-sm-9">
				<span class="input-group-btn">
					<button id="btnInsObjeto" type="submit" class="btn btn-purple btn-sm">
						Agregar
						<i class="icon-ok bigger-110"></i>
					</button>
				</span>	
			</div>
		</div>	
	</center>		
</form>
<div id="pnl_mensaje_objeto"></div>
<div id="c_frm_mod_aplicaciones" class="table-responsive"></div>
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/utilitarios/modulo/modulo_objeto_ins.js'></script>