<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>

    <div id ="admin-page" class="container">

    <center>

    <div class="widget__title"><h1>Produção da Loja</h1></div>

    <button type="submit" class="btn btn-primary button-roxo" name="cadastrar" onclick="window.location.href = 'cadastrar-prod.php'">Cadastrar Nova Produção</button></center>

    <div style="margin-bottom: 20px"></div>


    <div class="product-style">
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Tecido</th>
            <th>Nome</th>
            <th>Prazo</th>
            <th>QTD Metros</th>
            <th>Valor Metro</th>
            <th>Valor Produto</th>
            <th>Vendas Estimadas</th>
            <th>Notas</th>
            <th>M</th>
            <th>G</th>
            <th>GG</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>

                <?php
                $mysqli = new mysqli("mysql427.umbler.com", "paesvitor", "freelove12", "sysmad");
                $query = "SELECT * FROM producao";
                if ($result = $mysqli->query($query)): ?>
                <?php while($obj = $result->fetch_object()): ?>

                    <?php   
                    $p = $obj->qtd_p;
                    $m = $obj->qtd_m;
                    $g = $obj->qtd_g;
                    $gg = $obj->qtd_gg;

                    $valor_produto = $obj->valor_produto;

                    $total_produtos = $p + $m + $g + $gg;
                    $vendas_estimadas = $total_produtos * $valor_produto;

                    ?>
                
                    <tr>
                <td><img style="width: 100px" src="fotos/<?php echo $obj->img ?>"></td>
                <td><?php echo $obj->tecido ?></td>
                <td><?php echo $obj->prazo ?></td>
                <td><?php echo $obj->qtd_metros ?></td>
                <td>R$<?php echo $obj->valor_metro ?></td>
                <td>R$<?php echo $obj->valor_produto ?></td>
                <td>R$<?php echo $vendas_estimadas ?></td>
                <td><?php echo $obj->notas ?></td>
                <td><?php echo $obj->qtd_m ?></td>
                <td><?php echo $obj->qtd_g ?></td>
                <td><?php echo $obj->qtd_gg ?></td>
              
                <td class="text-center">

                <!-- <form method="POST" action="process.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
                            <input type="submit" class="button-red" value="Deletar Produto" name="deletar">
                        </form> -->

                        <form method="POST" action="alterar-prod.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
                            <input type="submit" value="Alterar Produção" name="alterar">
                        </form>
                        
                        <form method="POST" action="process.php">
                            <input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
                            <input type="hidden" value="producao" name="database">
                            <input type="submit" class="button-red" value="Deletar Produção" name="deletar">
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


         