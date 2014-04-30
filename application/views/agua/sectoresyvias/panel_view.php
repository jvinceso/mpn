<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/sectoresyvias/sectoresyvias_panel.js'></script>
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
			<ul class="nav nav-tabs" id="TabSectoresyVias">
				<li class="dropdown active">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="pink icon-exchange bigger-110"></i>
						Registrar
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a data-toggle="tab" href="#sectoresr">Sectores</a>
						</li>

						<li>
							<a data-toggle="tab" href="#viasr">Vías</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="blue icon-list bigger-110"></i>
						Listado
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a id="lista_sectores" data-toggle="tab" href="#sectorl">Sectores</a>
						</li>
						<li>
							<a id="lista_vias" data-toggle="tab" href="#viasl">Vías</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div id="sectoresr" class="tab-pane in active">
					<p><?php $this->load->view('agua/sectoresyvias/ins_sector_view'); ?></p>
				</div>
				<div id="viasr" class="tab-pane">
					<p><?php $this->load->view('agua/sectoresyvias/ins_via_view'); ?></p>
				</div>
				<div id="sectorl" class="tab-pane">
					<div class="table-header">Resultado de los Sectores"</div>
					<div id="tabla_sectores" class="table-responsive"></div>					
				</div>
				<div id="viasl" class="tab-pane">
					<div class="table-header">Resultado de los Vías"</div>
					<div id="tabla_vias" class="table-responsive"></div>	
				</div>
			</div>		
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
