<form id="frm_proc_anios"  name = "frm_proc_anios" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="cbo_servicio"> Servicio</label>
		<div class="col-sm-9">
			<?php echo form_dropdown("cbo_servicio", creaCombo($cboServicio),'', 'id="cbo_servicio" class="chosen-select w360"');?>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="cbo_anios"> Año</label>
		<div class="col-sm-9">
			<div id="c_cbo_anios">
			    <?php echo form_dropdown("cbo_anio", creaCombo(array(0=>array('Id'=>0,'nAnioId' => '2014'))),'', 'id="cbo_anio" class="chosen-select w360"'); ?>
			</div>
		</div>
	</div>	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_sec_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-cog bigger-110"></i>
				Procesar
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				cancelar
			</button>
		</div>
	</div>
</form>	
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/recibo_ins.js'></script>