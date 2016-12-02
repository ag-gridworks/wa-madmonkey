<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>

	<div id ="admin-page" class="container">

	<center>

    <div class="widget__title"><h1>Compras da Loja</h1></div>

    <button type="submit" class="btn btn-primary button-roxo" name="cadastrar" onclick="window.location.href = 'cadastrar-compra.php'">Cadastrar Nova Compra</button></center>

	<div style="margin-bottom: 20px"></div>


    <div class="product-style">
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>ID</th>
            <th>Nome</th>
            <th>data</th>
            <th>Valor Gasto</th>
            <th>Notas</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>

				<?php
				$mysqli = new mysqli("mysql427.umbler.com", "paesvitor", "freelove12", "sysmad");
				$query = "SELECT * FROM compras";
				if ($result = $mysqli->query($query)): ?>
				<?php while($obj = $result->fetch_object()): ?>
				
					<tr>
				<td><img style="width: 100px" src="fotos/<?php echo $obj->img ?>"></td>
                <td><?php echo $obj->id ?></td>
                <td><?php echo $obj->nome ?></td>
                <td><?php echo $obj->data ?></td>
                <td>R$<?php echo $obj->valor ?></td>
                <td><?php echo $obj->notas ?></td>
           
              
                <td class="text-center">

				<!-- <form method="POST" action="process.php">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input type="submit" class="button-red" value="Deletar Produto" name="deletar">
						</form> -->

						<form method="POST" action="alterar-compras.php">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input type="submit" value="Alterar Compra" name="alterar">
						</form>
                        
                        <form method="POST" action="process.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
                            <input type="hidden" value="compras" name="database">
                            <input type="submit" class="button-red" value="Deletar Compra" name="deletar">
                        </form>
               
            </tr>

				<?php endwhile; ?>
			<?php endif; ?>

    </table>
    </div>
</div>

		<?php
		else: echo "Você não pode visitar essa página";
		endif;
		?>


         