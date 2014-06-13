<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/administrador/trabajador/trabajador_panel.js'></script>
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
					<a data-toggle="tab" href="#trabajadorr">
						<i class="pink icon-user bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="lista_trabajador" data-toggle="tab" href="#trabajadorl">
						<i class="blue icon-list bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="trabajadorr" class="tab-pane in active">					
					<?php $this->load->view('administrador/trabajador/ins_view'); ?>											
				</div>
				<div id="trabajadorl" class="tab-pane">
					<div class="table-header">Resultado de los Trabajadores</div>
					<div id="tabla_trabajador" class="table-responsive"></div>				
				</div>
			</div>
		<!-- fin codigo propio del cuerpo -->
		</div>
	</div>
</div>
