<div id="listPermisos">
	<ul>
		<?php 
		$lista = '';
		foreach ($controladores as $key => $fila) {
			print '<li>';
			if (is_array($fila)){
				print $key.'<ul>';
				foreach ($fila as $indice => $registro) {
					$ruta = '../'.$key.'/'.str_replace('.php', '.html',$registro);
					print '<li><a href="#" class="anc_controlador" data-path="'.$ruta.'">'.substr($registro, 0, -4).'</a></li>';
				}
				print '</ul>';
			}else{
				print '<a href="#" class="anc_controlador" data-path="'.$fila.'">'.$fila.'</a>';
			}
			print '</li>';
		}
		?>
	</ul>
</div>