<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/periodo_recibo_ins.js'></script>
<form id="frm_qry_reciboPeriodo" name = "frm_qry_reciboPeriodo" class="form-horizontal" role="form">
	<div class="alert alert-info">
		<button data-dismiss="alert" class="close" type="button">
			<i class="icon-remove"></i>
		</button>
		<strong>Aviso!</strong>
		Los Recibos que se Cancelaran de Forma Masiva a Partir del Ultimo Pendiente de Pago
		<br>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Hasta </label>
		<span class="input-icon col-xs-3">
			<div id="c_cbo_ins_pag_hasta">
				<?php 
				echo form_dropdown("cbo_periodo_fin", creaCombo( generaMeses() ),'', 'id="cbo_periodo_fin" class="chosen-select w360"');
				?>
			</div>
		</span>
	</div>
</form>