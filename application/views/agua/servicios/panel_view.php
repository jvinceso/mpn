<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/servicios/servicios_panel.js'></script>
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
						<i class="pink icon-cog bigger-110"></i>
							Registrar
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a data-toggle="tab" href="#serviciosr">Servicios</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tiposerviciosr">Tipo de Servicios</a>
						</li>
						<li>
							<a data-toggle="tab" href="#serviciostipor">Servicios por Tipo</a>
						</li>

					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="blue icon-list bigger-110"></i>
							Listados
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a id="lista_servicios" data-toggle="tab" href="#serviciosl">Servicios</a>
						</li>
						<li>
							<a id="lista_tipo_servicios" data-toggle="tab" href="#tiposerviciosl">Tipo de Servicios</a>
						</li>
						<li>
							<a id="lista_servicios_por_tipo" data-toggle="tab" href="#serviciostipol">Servicios por Tipo</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div id="serviciosr" class="tab-pane">
					<p><?php $this->load->view('agua/servicios/ins_tiposervicio_view'); ?></p>
				</div>
				<div id="tiposerviciosr" class="tab-pane">
					<p><?php $this->load->view('agua/servicios/ins_tiposervicio_view'); ?></p>
				</div>
				<div id="serviciostipor" class="tab-pane in active">
					<p><?php $this->load->view('agua/servicios/ins_servicio_view'); ?></p>
				</div>
				<div id="serviciosl" class="tab-pane">
					<div class="table-header">Resultado de los Servicios</div>				
					<div id="tabla_servicios" class="table-responsive"></div>	
				</div>
				<div id="tiposerviciosl" class="tab-pane">
					<div class="table-header">Resultado de los Tipo de Servicios</div>				
					<div id="tabla_tipo_servicios" class="table-responsive"></div>	
				</div>
				<div id="serviciostipol" class="tab-pane">	
					<div class="table-header">Resultado de los Servicios por tipo</div>				
					<div id="tabla_servicios_por_tipo" class="table-responsive"></div>					
				</div>
			</div>		
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
