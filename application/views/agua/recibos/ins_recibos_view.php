<form id="frm_proc_anios"  name = "frm_proc_anios" class="form-horizontal" role="form">
	<div class="alert alert-info">
		<button data-dismiss="alert" class="close" type="button">
			<i class="icon-remove"></i>
		</button>
		<strong>Aviso!</strong>
		Los Arbitrios que se procederan a generar seran para el presente año <?php echo date("Y"); ?> 
		<br>
	</div>
	<div class="centrado">
		<p>
			<a id="btnProcesar" class="btn btn-light btn-app radius-4" href="#">
				<i class="icon-cog bigger-230"></i>
				Procesar <br>Arbitrios
			</a>
			
		</p>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9"></div>
	</div>
</form>
<!-- Formulario para procesar recibos por contribuyente -->
<div id="frm_proc_recibos_contribuyente">
	<div class="alert alert-info">
		<button data-dismiss="alert" class="close" type="button">
			<i class="icon-remove"></i>
		</button>
		<strong>Aviso!</strong>
		Los Arbitrios que se procederan a generar seran para el contribuyente que sea seleccionado <?php echo date("Y"); ?> 
		<br>
	</div>
	<div>
		<div class="row centrado">
			<form id="frm_ins_procesar_parcial" name = "frm_ins_procesar_parcial" class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">Contribuyente</label>
					<span class="input-icon col-xs-4">
						<input type="text" id="txt_ins_contribuyente_nombre" name = "txt_ins_contribuyente_nombre" placeholder="Ingrese el nombre del contribuyente" class="col-xs-10 col-sm-12" />
						<input type="hidden" id="hid_fnd_ins_id_Contribuyente" name = "hid_fnd_ins_id_Contribuyente"/>
					</span>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">
						Año
					</label>
					<div class="col-sm-9">
						<?php 
						echo form_dropdown("cbo_in_contribuyente_anio", creaCombo( $anios ),'', 'id="cbo_in_contribuyente_anio" class="chosen-select w360"');
						?>
						<!-- <input type="text" name="txt_upd_servpt_costo" id="txt_upd_servpt_costo" placeholder="Ingrese el costo" value = "<?php echo $fila['costo'] ?>" /> -->
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">
						Mes de Inicio
					</label>
					<div class="col-sm-9">
						<?php 
						echo form_dropdown("cbo_in_contribuyente_mes", creaCombo( generaMeses() ),'', 'id="cbo_in_contribuyente_mes" class="chosen-select w360"');
						?>
						<!-- <input type="text" name="txt_upd_servpt_costo" id="txt_upd_servpt_costo" placeholder="Ingrese el costo" value = "<?php echo $fila['costo'] ?>" /> -->
					</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button id="btn_process_contribuyente" class="btn btn-purple btn-sm" type="button">
							Procesar
							<i class="icon-cogs icon-on-right bigger-110"></i>
						</button>
						&nbsp; &nbsp; &nbsp;
						<button class="btn" type="reset">
							<i class="icon-undo bigger-110"></i>
							Limpiar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9"></div>
	</div>
</div>
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/recibo_ins.js'></script>