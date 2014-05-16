<form id="frm_proc_anios"  name = "frm_proc_anios" class="form-horizontal" role="form">
	<div class="alert alert-info">
		<button data-dismiss="alert" class="close" type="button">
			<i class="icon-remove"></i>
		</button>
		<strong>Aviso!</strong>
		Los Arbitrios que se procederan a generar seran para el presente año <?php echo date("Y"); ?> 
		<br>
	</div>
	<div id="centrado">
		<p>
			<a id="btnProcesar" class="btn btn-light btn-app radius-4" href="#">
				<i class="icon-cog bigger-230"></i>
				Procesar <br>Arbitrios
			</a>
			
		</p>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9"></div>
	</div>
</form>	
<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/recibos/recibo_ins.js'></script>