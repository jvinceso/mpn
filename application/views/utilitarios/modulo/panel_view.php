<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/utilitarios/modulo/modulo_panel.js'></script>
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
					<a data-toggle="tab" href="#home3">
						<i class="pink icon-dashboard bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="btnQryModulo" data-toggle="tab" href="#profile3">
						<i class="blue icon-user bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="home3" class="tab-pane in active">
					
					<?php $this->load->view('utilitarios/modulo/ins_view'); ?>						
					
				</div>

				<div id="profile3" class="tab-pane">
					<p>				
						<form class="form-horizontal" >
							<div class="row">
								<div id="pnl_frm_busqueda" class="col-xs-12 col-sm-5">
									<div class="input-group">
										<input type="text" class="form-control search-query" placeholder="Ingrese el nombre del módulo" />
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
					</p>
					<p>
						<div id="tabla_modulos" class="table-responsive"></div>
						<!-- <div id="pnlAsignarObjetos" class="ocultar">ererter</div> -->

					</p>
					<div id="c_frm_modulo" class="switchs disnone w860" >
					    <a href="#" id="anc_back_modulo" class="ui-dialog-titlebar-close ui-corner-all" role="button">
					        <span><img src="../statics/images/iconos_regresar.png"></span>
					    </a>
					    <div id="c_frm_procesos" class="w100Percent"></div>  
					</div>
				</div>
			</div>
		</div>



		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
