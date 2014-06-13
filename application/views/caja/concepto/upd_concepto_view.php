<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/concepto/concepto_upd.js'></script>
<form id="frm_upd_concepto" name = "frm_upd_concepto" class="form-horizontal" role="form">
	<input type="hidden" id="txt_upd_con_nConId" name="txt_upd_con_nConId" value="<?php echo $fila['nConId'] ?>" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripción </label>

		<div class="col-sm-9">
			<input type="text" id="txt_upd_con_desc" name = "txt_upd_con_desc" placeholder="Ingrese la descripción" class="col-xs-10 col-sm-5" value="<?php echo $fila['cConDescripcion'] ?>" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Costo</label>
		<div class="col-sm-9">
			<input type="text" id="txt_upd_con_costo" name = "txt_upd_con_costo" placeholder="Ingrese el costo" class="col-xs-10 col-sm-2" value="<?php echo $fila['fConCosto'] ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label for = "sb_upd_conp_tipopago" class="col-sm-3 control-label no-padding-right">Tipo de Pago</label>
		<span class="col-sm-2">			
			<div id="c_cbo_upd_con_tipopago"></div>
			<input type="hidden" id="txt_upd_con_nMulId" name="txt_upd_con_nMulId" value="<?php echo $fila['nMulIdTipoPago'] ?>" />
		</span>		
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_upd_concepto_actualizar" class="btn btn-info" data-loading-text="Loading..." type="submit">
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
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>