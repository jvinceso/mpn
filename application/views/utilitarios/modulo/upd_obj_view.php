<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/utilitarios/modulo/modulo_objeto_upd.js'></script>
<form id = "frm_upd_modulo" class="form-horizontal" >
	<div class="row">
		<div class="col-xs-12 col-sm-5">
			<div class="input-group">
				<input name = "txt_upd_obj_id" type="hidden" value="<?php print $nObjId ?>"/>			
				<input name = "txt_upd_obj_nombre" type="text" value="<?php print $cObjNombre ?>" class="form-control search-query" placeholder="Ingrese el nombre" />
			</div>
			<div class="space-4"></div>
			<div class="input-group">
				<input name = "txt_upd_obj_order" type="text" value="<?php print $nObjOrden ?>" class="form-control search-query" placeholder="Ingrese el icono" />
			</div>
			<div class="space-4"></div>
			<div class="input-group">
				<span class="input-group-btn">
					<button id="btnUpdObjeto" data-loading-text="Actualizando..." type="submit" class="btn btn-purple btn-sm">
						Actualizar
						<i class="icon-ok bigger-110"></i>
					</button>
				</span>	
			</div>
		</div>
	</div>
</form>