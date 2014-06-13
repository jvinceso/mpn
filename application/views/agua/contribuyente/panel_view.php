<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/contribuyente/contribuyente_panel.js'></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />
<div class="page-header">
	<h1>
		<?php echo $aplicacion; ?>
		<small>
			<i class="icon-double-angle-right"></i>
			<?php echo $objeto; ?>
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- codigo propio del cuerpo -->
		<div class="tabbable tabs-left">
			<ul class="nav nav-tabs" id="myTab3">
				<li class="active">
					<a data-toggle="tab" href="#qry_contribuyente" id="anc_contri_listado">
						<i class="blue icon-list bigger-110"></i>
						Listado
					</a>
				</li>
				<li>
					<a data-toggle="tab" href="#home3">
						<i class="pink icon-user bigger-110"></i>
						Registrar
					</a>
				</li>

			</ul>

			<div class="tab-content min450">
				<div id="home3" class="tab-pane">
					
					<?php $this->load->view('agua/contribuyente/ins_view'); ?>						
					
				</div>

				<div id="qry_contribuyente" class="tab-pane in active">

					<div class="table-header">Resultado de los Contribuyentes</div>	

					<div id="tbl_contribuyentes_principal" class="table-responsive"></div>
					
					<div id="c_frm_contribuyente" class="switchs disnone w860" >
						<a href="#" id="anc_back_contribuyente" class="ancla_regresar ui-dialog-titlebar-close ui-corner-all" role="button">
							<span><img src="../statics/images/iconos_regresar.png"></span>
						</a>
						<div id="c_frm_procesos_contribuyente" class="w100Percent"></div>  
					</div>
				</div>
			</div>
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>
</div>
<script src="<?php echo URL_JS; ?>jquery.maskedinput.min.js"></script>