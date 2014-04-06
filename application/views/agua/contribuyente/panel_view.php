<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/contribuyente/contribuyente_panel.js'></script>
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
					<a data-toggle="tab" href="#qry_contribuyente" id="anc_contri_listado">
						<i class="blue icon-user bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="home3" class="tab-pane in active">
					
					<?php $this->load->view('agua/contribuyente/ins_view'); ?>						
					
				</div>

				<div id="qry_contribuyente" class="tab-pane">
					<p>				
						<form class="form-horizontal" >
							<div class="row">
								<div class="col-xs-12 col-sm-5">
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
						<div id="tbl_contribuyentes_principal" class="table-responsive">
						</div>
					</p>
				</div>
			</div>
		</div>



		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
