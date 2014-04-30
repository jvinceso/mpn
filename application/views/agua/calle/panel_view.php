<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/calle/calle_panel.js'></script>
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
					<a data-toggle="tab" href="#caller">
						<i class="pink icon-road bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="lista_calles" data-toggle="tab" href="#callel">
						<i class="blue icon-list bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="caller" class="tab-pane in active">					
					<?php $this->load->view('agua/calle/ins_view'); ?>
				</div>

				<div id="callel" class="tab-pane">
					<div class="table-header">Resultado de las Calles"</div>
					<div id="tabla_calles" class="table-responsive"></div>
				</div>
			</div>
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>
</div>
