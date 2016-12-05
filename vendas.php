<?php include("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<div id ="admin-page" class="container">

	<div class="widget__title"><h1>Produtos Vendidos</h1></div>

    <div class="product-style">
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
    <thead>
        <tr>
        	<th>Imagem</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Tamanho</th>
            <th>Cliente</th>
            <th>Data</th>
            <th>Notas</th>
            <th>Descontos</th>
            <th>Valor</th>
            <th>Lucro</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>

				<?php
				// $mysqli = new mysqli("mysql427.umbler.com", "paesvitor", "freelove12", "sysmad");

				$query = "SELECT * FROM vendas ORDER BY id DESC";
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
                <td><?php echo $obj->tamanho ?></td>
                <td><?php echo $obj->cliente ?></td>
                <td><?php echo $obj->data ?></td>
                <td><?php echo $obj->notas ?></td>
                <td><?php echo $obj->desconto ?></td>
                <td>R$<?php echo $obj->valor_inteiro ?></td>
                <td>R$<?php echo $obj->lucro ?></td>
                <td class="text-center">

               <form method="POST" action="alterar-venda.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
                            <input type="submit" value="Alterar Venda" name="alterar">
                        </form>

                        <form method="POST" action="process.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="venda_id">
                            <input type="hidden" value="<?php echo $obj->tamanho ?>" name="tamanho">
                            <input type="hidden" value="vendas" name="database">
                            <input type="submit" class="button-red" value="Deletar Custo" name="deletar_venda">
                        </form>
               
            </tr>


				<?php endwhile; ?>
			<?php endif; ?>
  </table>
  </div>
    </div>
</div>

<?php endif; ?>