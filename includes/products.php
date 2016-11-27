<div id="produtos" class="container">
		<div id="produtos__items" class="content">
			<?php
			$mysqli = new mysqli("localhost", "vitor", "admin", "bd01");
			$query = "SELECT * FROM produtos ORDER BY RAND();";
			if ($result = $mysqli->query($query)): ?>
			<?php while($obj = $result->fetch_object()): ?>
				<div class="produtos__item">
				<div class="img-area">
					<img src="fotos/<?php echo $obj->img; ?>">
				</div>
					<h1><?php echo $obj->nome ?></h1>
					<p><?php echo $obj->descr ?></p>
						<div class="product_price">R$<?php echo $obj->valor ?>,00</div>
						<form method="get" action="p.php">
						<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
						<input type="submit" value="Ver Produto" name="ver">
						</form>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>