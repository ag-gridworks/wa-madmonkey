<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>

	<div id ="admin-page" class="container">

	<center>

    <div class="widget__title"><h1>Lista de Produtos</h1></div>
    
    <button type="submit" class="btn btn-primary button-roxo" name="cadastrar" onclick="window.location.href = 'admin.php'">Cadastrar Novo Produto</button>

    </center>

	<div style="margin-bottom: 20px"></div>

    <div class="product-style">
     <div class="table-responsive"> 
    <table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
    <thead>
        <tr>
        	<th>Imagem</th>
            <th>ID</th>
            <th>Nome</th>
            <th>P</th>
            <th>M</th>
            <th>G</th>
            <th>GG</th>
            <th>Preço</th>
            <th>Custo</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>

				<?php
				$mysqli = new mysqli("localhost", "vitor", "admin", "madsys");
				$query = "SELECT * FROM produtos";
				if ($result = $mysqli->query($query)): ?>
				<?php while($obj = $result->fetch_object()): ?>
				
					<tr>
				<td><img style="width: 100px" src="fotos/<?php echo $obj->img ?>"></td>
                <td><?php echo $obj->id ?></td>
                <td><?php echo $obj->nome ?></td>
                <td><?php echo $obj->qtd_p ?></td>
                <td><?php echo $obj->qtd_m ?></td>
                <td><?php echo $obj->qtd_g ?></td>
                <td><?php echo $obj->qtd_gg ?></td>
                <td>R$<?php echo $obj->valor ?>,00</td>
                <td>R$<?php echo $obj->custo ?></td>
                <td class="text-center">

                <form method="GET" action="p.php">
				<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
				<input type="submit" class="button-orange" value="Ver Produto" name="ver">
				</form>

				<!-- <form method="POST" action="process.php">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input type="submit" class="button-red" value="Deletar Produto" name="deletar">
						</form> -->

						<form method="POST" action="admin-alterar.php">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input type="submit" value="Alterar Produto" name="alterar1">
						</form>
               
            </tr>

				<?php endwhile; ?>
			<?php endif; ?>

    </table>
    </div>
    </div>
</div>

		<?php
		else: echo "Você não pode visitar essa página";
		endif;
		?>


         