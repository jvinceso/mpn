<link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap-timepicker.css" />
<link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" />
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/caja/caja_pagos/pagos_panel.js'></script>
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
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="blue icon-list bigger-110"></i>
						Listado
						<i class="icon-caret-down bigger-110 width-auto"></i>
					</a>

					<ul class="dropdown-menu dropdown-info">
						<li>
							<a id="lista_pagos" data-toggle="tab" href="#pagosl">Pagos</a>
						</li>
						<li>
							<a id="lista_agua" data-toggle="tab" href="#agual">Agua</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
				<div id="pagosr" class="tab-pane in active">					
					<?php $this->load->view('caja/caja_pagos/ins_view'); ?>
				</div>
				<div id="pagosl" class="tab-pane">
					<div class="table-header">Resultado de los Pagos</div>
					<div id="tabla_pagos" class="table-responsive"></div>
				</div>
				<div id="agual" class="tab-pane">
					<div class="table-header">Resultado de Recibos de Agua por Cobrar</div>
					<div id="tabla_agua" class="table-responsive"></div>
				</div>
			</div>		
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>			

</div>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script>