<?php
$direccion = $comprobar_coordenadas->direccion;
?>
<div class="card shadow-cards tarjeta">
	<div class="card-header">
		<p class="card-title m-0"><i class="fas fa-map-marker-alt title-color"></i> Ubicación de tu pedido</p>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="card-body p-0" style="display: block;">
		<div id="mapa" style="height: 200px; width: 100%;border-radius: 0rem 0rem 1rem 1rem;"></div>
		<input type="hidden" value="<?= $direccion; ?>" id="inpt_direccion">
	</div>
</div>