<script type="text/javascript" src='<?php echo URL_JS; ?>sistema/agua/servicios/servicios_ins.js'></script>
<!-- // <script src="<?php echo URL_JS; ?>date-time/bootstrap-datepicker.min.js"></script> -->
<!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>datepicker.css" /> -->
<!-- <link rel="stylesheet" href="<?php echo URL_CSS; ?>chosen.css" /> -->

<form id="frm_ins_servicio" name = "frm_ins_servicio" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre del Servicio</label>

		<div class="col-sm-9">
			<input type="text" id="txt_ins_serv_nom" name = "txt_ins_serv_nom" placeholder="Ingrese el nombre" class="col-xs-10 col-sm-5" />
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">
			Tipos de Servicios
		</label>

		<div class="col-sm-9">
			<input type="text" name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." />
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button id = "btn_ins_serv_registrar" class="btn btn-info" data-loading-text="Loading..." type="submit">
				<i class="icon-ok bigger-110"></i>
				Registrar
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				Limpiar
			</button>
		</div>
	</div>
</form>
		<script type="text/javascript">
			jQuery(function($) {
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
				{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
					  }
					);
				}
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
})
<!-- // <script src="<?php echo URL_JS; ?>jquery.maskedinput.min.js"></script> -->
<!-- // <script src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script> -->