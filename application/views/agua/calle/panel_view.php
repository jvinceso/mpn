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
						<i class="pink icon-dashboard bigger-110"></i>
						Registrar
					</a>
				</li>

				<li>
					<a id="tb_lista_trabajador" data-toggle="tab" href="#callel">
						<i class="blue icon-user bigger-110"></i>
						Listado
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="caller" class="tab-pane in active">					
					<?php $this->load->view('agua/calle/ins_view'); ?>
				</div>

				<div id="callel" class="tab-pane">
					<p>
						sadasd
					</p>
				</div>
			</div>
		</div>
		<!-- fin codigo propio del cuerpo -->
	</div>
</div>
