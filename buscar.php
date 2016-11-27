<?php

include ("header.php");

if(isset($_GET['buscar'])):

$query = $_GET['keywords'];
$query = htmlspecialchars($query); 
$query = mysql_real_escape_string($query);
$raw_results = mysql_query("SELECT * FROM produtos WHERE (`nome` LIKE '%".$query."%') OR (`descr` LIKE '%".$query."%')")
or die(mysql_error());

if(mysql_num_rows($raw_results) > 0): ?>

<div id="produtos" class="container">
		<div id="produtos__items" class="content">
             
<?php while($results = mysql_fetch_array($raw_results)):?>


					<div class="produtos__item">
				<div class="img-area">
					<img src="fotos/<?php echo $results['img']; ?>">
				</div>
					<h1><?php echo $results['nome'] ?></h1>
					<p><?php echo $results['descr'] ?></p>
						<div class="product_price">R$<?php echo $results['valor'] ?>,00</div>
						<form method="get" action="p.php">
						<input type="hidden" value="<?php echo $results['id']?>" name="product_id">
						<input type="submit" value="Ver Produto" name="ver">
						</form>
					</div>
     
<?php endwhile; ?>


		</div>
	</div>

<?php else: echo "Sem Resultados";

endif;
endif;