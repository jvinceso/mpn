<style>
	.highlight{
		background-color: #6FAED9;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		color: #FFF;
	}
	#idTablaPermisos tbody tr{
		cursor: pointer;
	}
</style>

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
					<a data-toggle="tab" href="#permisos">
						<i class="pink icon-dashboard bigger-110"></i>
						Usuarios
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="permisos" class="tab-pane in active">

					<p>

											<div class="widget-body">
												<div class="widget-main">
													<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">
														<ul class="wizard-steps">
															<li data-target="#step1" class="active">
																<span class="step">1</span>
																<span class="title">Seleccione un Usuario</span>
															</li>

															<li data-target="#step2">
																<span class="step">2</span>
																<span class="title">Seleccione los permisos</span>
															</li>

															<li data-target="#step3">
																<span class="step">3</span>
																<span class="title">Finalizar</span>
															</li>
														</ul>
													</div>

													<hr />
													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
													     <form class="form-horizontal" >
															<div class="row">
																<div class="col-xs-12 col-sm-5">
																	<div class="input-group">
																		<input type="text" class="form-control search-query" placeholder="Ingrese el nombre del usuario" />
																		<span class="input-group-btn">
																			<button type="button" class="btn btn-purple btn-sm">
																				Buscar
																				<i class="icon-search icon-on-right bigger-110"></i>
																			</button>
																		</span>
																	</div>
																</div>
															</div>
														</form>	
															<div id="tabla_permisos" class="table-responsive"></div>
														</div>
														<div class="step-pane" id="step2">
															<?php $this->load->view('administrador/permisos/per_view'); ?>
														</div>
														<div class="step-pane" id="step3">
															<div class="center">
																<h3 class="green">Felicitaciones</h3>
																Se Asignaron los Permisos Correctamente
															</div>
														</div>
													</div>

													<hr />
													<div class="row-fluid wizard-actions">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Prev
														</button>

														<button id = "next-permisos" class="btn btn-success btn-next" data-last="Finish ">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->						
					</p>
				</div>
			</div>
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
<script src="<?php echo URL_JS; ?>fuelux/fuelux.wizard.min.js"></script>
<script src="<?php echo URL_JS; ?>ace-elements.min.js"></script>
<!-- // <script src="<?php echo URL_JS; ?>ace.min.js"></script> -->
<script src="<?php echo URL_JS; ?>bootbox.min.js"></script>
<script src="<?php echo URL_JS; ?>fuelux/fuelux.tree.min.js"></script>
<script src="<?php echo URL_JS; ?>fuelux/data/fuelux.tree-sampledata.js"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/permisos/permisos_panel.js'></script>
<script type="text/javascript">
			jQuery(function($) {
			// $('#fuelux-wizard').ace_wizard()
				// var $validation = false;
				// $('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
				// 	if(info.step == 1 && $validation) {
				// 		if(!$('#validation-form').valid()) return false;
				// 	}
				// }).on('finished', function(e) {
				// 	bootbox.dialog({
				// 		message: "Thank you! Your information was successfully saved!", 
				// 		buttons: {
				// 			"success" : {
				// 				"label" : "OK",
				// 				"className" : "btn-sm btn-primary"
				// 			}
				// 		}
				// 	});
				// });	

		// $('#tree1').ace_tree({
		// 	dataSource: treeDataSource ,
		// 	multiSelect:true,
		// 	loadingHTML:'<div class="tree-loading"><i class="icon-refresh icon-spin blue"></i></div>',
		// 	'open-icon' : 'icon-minus',
		// 	'close-icon' : 'icon-plus',
		// 	'selectable' : true,
		// 	'selected-icon' : 'icon-ok',
		// 	'unselected-icon' : 'icon-remove'
		// });
			})
</script>