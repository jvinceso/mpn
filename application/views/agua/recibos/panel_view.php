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
.centrado p{
	margin:0 auto;
	width:250px;
	/*max-width:550px;*/
}
</style>

<div class="row">
	<div class="col-xs-11">
		<!-- codigo del cuerpo -->
		<div id="c_frm_recibos">
			<?php 
			$this->load->view('agua/recibos/ins_recibos_view');
			?>
		</div>
		<!-- fin codigo del cuerpo -->
	</div>
</div>
<script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>