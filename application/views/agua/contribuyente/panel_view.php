<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/contribuyente/contribuyente_panel.js'></script>
<style>
.icon-pagos:before{
	content: url( '<?php echo URL_IMG ?>/essen/16/advertising.png');
}
.icon-direccion:before{
	content: url( '<?php echo URL_IMG ?>/essen/16/home.png');
}
.icon-documento:before{
	content: url( '<?php echo URL_IMG ?>/essen/16/my-account.png');
}
.icon-telefono:before{
	content: url( '<?php echo URL_IMG ?>/essen/16/phone.png');
}
.icon-darbaja:before{
	content: url( '<?php echo URL_IMG ?>/essen/16/busy.png');
}
/*.ui-icon-trash{color:#dd5a43}.ui-icon-trash:before{content:"\f014"}	*/
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

			<div class="tab-content">
				<div id="home3" class="tab-pane">
					
					<?php $this->load->view('agua/contribuyente/ins_view'); ?>						
					
				</div>

				<div id="qry_contribuyente" class="tab-pane in active">
					<p>
						<h2 class="header lighter blue">Listado Contribuyentes</h2>
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
