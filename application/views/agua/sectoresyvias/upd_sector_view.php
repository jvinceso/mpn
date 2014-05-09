 <script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/sectoresyvias/sectoresyvias_upd.js'></script> 


<form id="frm_upd_sector" name = "frm_upd_sector" class="form-horizontal" role="form">
	<input type="hidden" id="txt_upd_nSecId" name="txt_upd_nSecId" value="<?php echo $fila['nSecId'] ?>" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre del Sector</label>

		<div class="col-sm-9">
			<input type="text" id="txt_upd_sec_nom" name = "txt_upd_sec_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-8" value = "<?php echo $fila['cSecNombre'] ?>"/>
		</div>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_upd_sec_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-ok bigger-110"></i>
				Actualizar
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				Limpiar
			</button>
		</div>
	</div>
</form>