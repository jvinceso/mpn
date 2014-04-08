<?php 
function CrudGridMultipleJson($sql, $idtable = null, $primary_key,$opciones = array(), $funciones = null ) {

if( count($sql)>0 ){
	$nroopc = count($opciones);	//Nro de Opciones
    $nroCamposSql = count($sql);	//Nro de Campos de la Consula SQL
    $nombre_Columnas = array_keys( $sql[0]);
    $nroCamposSql = count( $nombre_Columnas );	//Cantidad de columnas a mostrar
    $idtable = ($idtable==null) ? 'tabla'.rand():$idtable;
    ?>
    <table id="<?php print $idtable; ?>" class="table table-stripped">
    	<thead>
    		<tr>
    			<?php
    				for ($i = 0; $i < $nroCamposSql; $i++) {
        				?>
        				<th class="style=text-transform:uppercase">
        					<?php print $nombre_Columnas[$i] ?>
        					</th>
        			<?php
    				}
                if ($nroopc != NULL && $nroopc > 0) { ?>
    				<th>
    					<center>Opciones</center>
    				</th>
                <?php } ?>	
    		</tr>
    	</thead>
    	<tbody>
    		<?php
                foreach( $sql as $fila ) {
                    $temp = array();
                    foreach ($fila as $key=>$value) { 
                        $temp[$key]=utf8_encode($value);
                    }
                    // print_p($temp);
                    // exit();
			    	// $json = json_encode($temp,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
			        ?>
			        <tr data-codx="<?php print $fila[$primary_key] ?>" >
			        <?php
			        foreach ($fila as $key => $cell) {
			        	?>
			        	<td>
			        	<?php
			        	if ($cell == null) {
			        	    ?>&nbsp;<?php
			        	} else {
			        	    print $cell;
			        	}?>
			        	</td>
			        	<?php			        	
			        }
			        if ($nroopc != NULL && $nroopc > 0) { 
			        	$html_responsive_open ='
			        	<div class="visible-xs visible-sm hidden-md hidden-lg">
			        		<div class="inline position-relative">
			        			<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
			        				<i class="icon-caret-down icon-only bigger-120"></i>
			        			</button>
			        			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
			        	';
			        	$html_responsive_li = '';
			        ?>
			        	<td>
			        		<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
				        		<?php
				        		foreach ($opciones as $clave_opcion => $opcion) {
				        			?>
				        			<a class="<?php print $opcion['color']; ?>" href="#">
				        				<i id="<?php print rand(5,1000000); ?>" class="icon-<?php print $opcion['icono'] ?> bigger-130"></i>
				        			</a>
				        			<?php
				        			$html_responsive_li .='
				        			<li>
				        				<a class="tooltip-'.$opcion['tooltip'].'" href="#" data-rel="tooltip" title="'.$clave_opcion.'">	
				        					<span class="'.$opcion['color'].'">
				        						<i class="icon-'.$opcion['icono'].' bigger-120"></i>
				        					</span>
				        				</a>
				        			</li>
				        			';
				        		}
				        		$html_responsive_end = '
				        				</ul>
				        			</div>
				        		</div>';
				        		?>
			        		</div>
			        		<?php
			        		print $html_responsive_open.$html_responsive_li.$html_responsive_end;
			        		?>
			        	</td>
			        	<?php 
			     	}
			        ?>
			        </tr>
			        <?php
			        // $NroRegistros = $fila['row_count'];
			        unset($fila);
			    }
    			?>

    	</tbody>
    </table>
		<?php
		$js_tabla_open = '<script type="text/javascript">$(function($) {
		var oTable1 = $("#'.$idtable.'").dataTable( { "aoColumns": [';
		if ($nroopc != NULL && $nroopc > 0) {
			$js_campos = str_repeat('null,',$nroCamposSql).'{ "bSortable": false }';
			// $js_campos .='{ "bSortable": false }';
		}else{
			$js_campos = substr(str_repeat('null,',$nroCamposSql), 0, -1);
		}
		$js_tabla_close = '],
    "fnDrawCallback": function( oSettings ) {
      console.log( \'DataTables has redrawn the table\' );
      '.(count($funciones)>0?implode(';', $funciones).";":'').'
    }
	});$(\'[data-rel="tooltip"]\').tooltip({placement: tooltip_placement});});</script>';
		print $js_tabla_open.$js_campos.$js_tabla_close;
	}else{
		echo "<center>no hay datos</center>";
	}
}
?>