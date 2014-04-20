<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/panel.js'></script>
<div class="page-header">
	<h1>
		<?php echo $aplicacion; ?>
		<small>
			<i class="icon-double-angle-right"></i>
			<?php echo $objeto; ?>
		</small>
	</h1>
</div><!-- /.page-header -->
<style>
	#centrado p{
		margin:0 auto;
		width:250px;
		/*max-width:550px;*/
	}
</style>
<div class="row">
	<div class="col-xs-12">
		<!-- codigo del cuerpo -->
		<!-- <h3 class="header smaller lighter green">Operaciones Principales</h3> -->
		<div id="centrado">
			<p>
				<a id="btnProcesar" class="btn btn-light btn-app radius-4" href="#">
					<i class="icon-cog bigger-230"></i>
					Generar <br>Recibos
				</a>
				<a id="btnPrint" class="btn btn-light btn-app radius-4" href="#">
					<i class="icon-print bigger-230"></i>
					Impresion <br>Masiva
				</a>
			</p>
		</div>
		<div id="c_frm_recibos">
			<?php 
			$this->load->view('agua/recibos/ins_recibos_view');
			?>
		</div>
		<!-- fin codigo del cuerpo -->
	</div>

</div>
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>