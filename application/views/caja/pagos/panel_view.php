<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/pagos/pagos_panel.js'></script>
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
			<ul class="nav nav-tabs" id="TabPagos">
				<li class="active">
					<a data-toggle="tab" href="#pagosr">
						<i class="pink icon-money bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="lista_pagos" data-toggle="tab" href="#pagosl">
						<i class="blue icon-list bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="pagosr" class="tab-pane in active">					
					<?php $this->load->view('caja/pagos/ins_view'); ?>
				</div>

				<div id="pagosl" class="tab-pane">
					<div class="table-header">Resultado de los Pagos</div>
					<div id="tabla_pagos" class="table-responsive"></div>
				</div>
			</div>		
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
