<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/concepto/concepto_panel.js'></script>
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
						<i class="pink icon-money bigger-110"></i>
							Registrar
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a id="registra_concepto" data-toggle="tab" href="#conceptor">Concepto</a>
						</li>

						<li>
							<a data-toggle="tab" href="#tipopagor">Tipo de Pago</a>
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
							<a id="lista_concepto" data-toggle="tab" href="#conceptol">Concepto</a>
						</li>
						<li>
							<a id="lista_tipo_pago" data-toggle="tab" href="#tipopagol">Tipo de Pago</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div id="conceptor" class="tab-pane in active">
					<p><?php $this->load->view('caja/concepto/ins_concepto_view'); ?></p>
				</div>
				<div id="tipopagor" class="tab-pane">
					<p><?php $this->load->view('caja/concepto/ins_tipopago_view'); ?></p>
				</div>
				<div id="conceptol" class="tab-pane">
					<div class="table-header">Resultado de los Conceptos</div>				
					<div id="tabla_concepto" class="table-responsive"></div>	
				</div>
				<div id="tipopagol" class="tab-pane">
					<div class="table-header">Resultado de los Tipos de Pago</div>				
					<div id="tabla_tipo_pago" class="table-responsive"></div>	
				</div>
			</div>		
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
