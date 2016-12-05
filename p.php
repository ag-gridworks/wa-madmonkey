<?php

include("config.php");
include($root."/includes/header.php");

if(isset($_GET['ver'])):

	$product_id = $_GET['product_id'];

$listar = mysql_query("SELECT * FROM produtos WHERE id = '$product_id'") or die(mysql_error());
$produto = mysql_fetch_assoc($listar);

$product_name = $produto['nome'];
$product_price = $produto['valor'];
$product_custo = $produto['custo'];
$product_img = $produto['img'];
$product_descr = $produto['descr'];
$product_vendas = $produto['vendidos'];
$product_lucro_total = $produto['lucro_total'];

$qtd_p = $produto['qtd_p'];
$qtd_m = $produto['qtd_m'];
$qtd_g = $produto['qtd_g'];
$qtd_gg = $produto['qtd_gg'];


$lucro_estimado = $product_price - $product_custo - $custos_fixos;

?>

<div id="produto" class="container">
	<div id="produto__items" class="content">
		<div class="produto__item">
			<div class="produto-img">
				<img src="fotos/<?php echo "$product_img"; ?>">
			</div>
			<div class="produto-info">
				<h2><i class="icon-tag" style="margin-right: 7px" aria-hidden="true"></i><?php echo "$product_name"; ?></h2>
				
				<div class="clear"></div>

				<div class="produto-vendas box-roxo">
					<h3>Valor do Produto</h3>
					<p>R$<?php echo "$product_price";?></p>
				</div>

				<div class="produto-vendas box-roxo-claro">
					<h3>Custo do Produto</h3>
					<p>R$<?php echo $produto['custo']; ?></p>
				</div>

				<div class="produto-vendas box-roxo">
					<h3>Custo Fixo Geral</h3>
					<p>R$<?php echo "$custos_fixos"; ?></p>
				</div>

				<div class="produto-vendas box-roxo-claro">
					<h3>Lucro Estimado</h3>
					<p>R$<?php echo "$lucro_estimado"; ?></p>
				</div>

				<div class="produto-vendas box-roxo">
					<h3>Quantidade Vendida</h3>
					<p><?php echo "$product_vendas"; ?></p>
				</div>

				<div class="produto-vendas box-roxo-claro">
					<h3>Lucro Total Gerado</h3>
					<p>R$<?php echo "$product_lucro_total"; ?></p>
				</div>
				
				<div class="clear"></div>
				<div style="margin-bottom: 20px"></div>

				<!--  -->
				<div class="title"><h3><i class="icon-chart" aria-hidden="true"></i>Atualizar Estoque</h3></div>
				<div class="produto-qtd">
					<h3>(P)</h3>
					<p><?php echo "$qtd_p"; ?></p>
					<form action="process.php" method="post" enctype="multipart/form-data" name="qtd_p_update">
						<input type="hidden" value="<?php echo "$product_id"; ?>" name="product_id">
						<input type="hidden" value="<?php echo "$qtd_m"; ?>" name="qtd_p">
						<input class="btn-add" type="submit" value="+" name="add_p">
					</form>
				</div>
				<div class="produto-qtd">
					<h3>(M)</h3>
					<p><?php echo "$qtd_m"; ?></p>
					<form action="process.php" method="post">
						<input type="hidden" value="<?php echo "$product_id"; ?>" name="product_id">
						<input class="btn-add" type="submit" value="+" name="add_m">
					</form>
				</div>
				<div class="produto-qtd">
					<h3>(G)</h3>
					<p><?php echo "$qtd_g"; ?></p>
					<form action="process.php" method="post">
						<input type="hidden" value="<?php echo "$product_id"; ?>" name="product_id">
						<input class="btn-add" type="submit" value="+" name="add_g">
					</form>
				</div>
				<div class="produto-qtd">
					<h3>(GG)</h3>
					<p><?php echo "$qtd_gg"; ?></p>
					<form action="process.php" method="post">
						<input type="hidden" value="<?php echo "$product_id"; ?>" name="product_id">
						<input class="btn-add" type="submit" value="+" name="add_gg">
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="title">
	<h3><i class="icon-note" aria-hidden="true"></i>Anotações</h3>
	</div>
	<p><?php echo "$product_descr"; ?></p>


	<div class="produto-detail" class="content">

	<div class="title">
		<h3><i class="icon-plus" aria-hidden="true"></i>Registrar Venda</h3>
		</div>

<!-- INICIO DO FORM PARA REGISTRO DE VENDA -->

		<form action="process.php" method="post" enctype="multipart/form-data" name="cadastro">
			<div class="form-group">
				<label for="exampleInputEmail1">Nome do Cliente</label>
				<input class="form-control" type="text" name="nome">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Tamanho</label>
				<input class="form-control" type="text" name="tamanho">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Notas</label>
				<input class="form-control" type="text" name="notas">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Descontos</label>
				<small id="fileHelp" class="form-text text-muted">Preencher caso tenha ocorrido algum desconto no produto</small>
				<input class="form-control" type="numnber" step="0.01" name="desconto">
			</div>

  <!-- <div class="form-group">
    <label for="exampleSelect1">Example select</label>
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
</div> -->

<input type="hidden" value="<?php echo $product_lucro_total ?>" name="product_lucro_total">
<input type="hidden" value="<?php echo $product_price ?>" name="product_price">
<input type="hidden" value="<?php echo $product_custo ?>" name="product_custo">
<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
<button type="submit" class="btn btn-primary button-roxo" name="registrar">Registrar</button>
</form>


<?php

endif;
?>

<div class="title">
	<h3><i class="icon-graph" aria-hidden="true"></i>Histórico de vendas deste produto</h3>
	</div>


    <div class="product-style">
	
	<div class="table-responsive"> 
    <table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
    <thead>
        <tr>
        	<th>Imagem</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Data</th>
            <th>Notas</th>
            <th>Descontos</th>
            <th>Valor</th>
            <th class="text-center">Lucro</th>
        </tr>
    </thead>

				<?php
				// $mysqli = new mysqli("mysql427.umbler.com", "paesvitor", "freelove12", "sysmad");

				$query = "SELECT * FROM vendas WHERE p_id = '$product_id' ORDER BY id DESC";
				if ($result = $mysqli->query($query)): ?>
				<?php while($obj = $result->fetch_object()):
                
            
                    $p_id = $obj->p_id;
                
                    $produto_get = mysql_query("SELECT * FROM produtos WHERE id = '$p_id'") or die(mysql_error());
                    $produto = mysql_fetch_assoc($produto_get);

                ?>
				
					<tr>
				<td><img style="width: 100px" src="fotos/<?php echo $produto['img'] ?>"></td>
                <td><?php echo $obj->id ?></td>
                <td><?php echo $produto['nome'] ?></td>
                <td><?php echo $obj->cliente ?></td>
                <td><?php echo $obj->data ?></td>
                <td><?php echo $obj->notas ?></td>
                <td><?php echo $obj->desconto ?></td>
                <td>R$<?php echo $obj->valor_inteiro ?></td>
                <td class="text-center">

               R$<?php echo $obj->lucro ?></td>
               
            </tr>


				<?php endwhile; ?>
			<?php endif; ?>
  </table>
  </div>
    </div>


<div style="margin-bottom: 80px"></div>