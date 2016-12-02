<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>
<?php if(isset($_POST['alterar'])):

//VAR
  $product_id = $_POST['product_id'];

//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM producao WHERE id = '$product_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

//VARIAVEIS DO ITEM EM CONSULTA

  $tecido = $item['tecido'];
  $prazo = $item['prazo'];
  $notas = $item['notas'];

  $qtd_p = $item['qtd_p'];
  $qtd_m = $item['qtd_m'];
  $qtd_g = $item['qtd_g'];
  $qtd_gg = $item['qtd_gg'];

  $qtd = $item['qtd'];
  $valor = $item['valor'];

  endif; ?>

  <div class="formulario">

    <h4>Você está alterando:</h4>
    <p>Produto: <?php echo "$tecido"; ?> </p>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
      <div class="form-group">
        <label for="exampleInputEmail1">Tecido</label>
        <input class="form-control" type="text" name="tecido" value="<?php echo "$tecido"?>">
      </div>

      <!-- <div class="form-group">
        <label for="exampleInputFile">Imagem do tecido</label>
        <input type="file" class="form-control-file" name="foto" aria-describedby="fileHelp">
      </div> -->

      <div class="form-group">
        <label for="exampleInputEmail1">Prazo</label>
        <input class="form-control" type="date" name="prazo" value="<?php echo "$prazo" ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Quantide Comprada</label>
        <small id="fileHelp" class="form-text text-muted">Em KG ou Metros</small>
        <input class="form-control" type="text" name="qtd" value="<?php echo "$qtd" ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Valor do total do tecido</label>
        <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
        <input type="number" step="0.01" class="form-control" name="valor" value="<?php echo "$valor" ?>">
      </div>

      <div class="form-group col-md-3 col-xs-6">
        <label for="exampleInputPassword1">Quantidade P para produduzir</label>
        <input type="number" class="form-control" name="qtd_p" value="<?php echo "$qtd_p" ?>">
      </div>
      <div class="form-group col-md-3 col-xs-6">
        <label for="exampleInputPassword1">Quantidade M para produduzir</label>
        <input type="number" class="form-control" name="qtd_m" value="<?php echo "$qtd_g"?>">
      </div>
      <div class="form-group col-md-3 col-xs-6">
        <label for="exampleInputPassword1">Quantidade G para produduzir</label>
        <input type="number" class="form-control" name="qtd_g" value="<?php echo "$qtd_g" ?>">
      </div>
      <div class="form-group col-md-3 col-xs-6">
        <label for="exampleInputPassword1">Quantidade GG para produduzir</label>
        <input type="number" class="form-control" name="qtd_gg" value="<?php echo "$qtd_gg" ?>">
      </div>

      <div class="form-group">
        <label for="exampleTextarea">Adicionar Notas</label>
        <textarea input="text" name="notas" class="form-control" rows="3"><?php echo "$notas" ?></textarea>
      </div>


      <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
      <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
      <button type="submit" class="btn btn-primary button-roxo" name="cadastrar">Alterar Produção</button>
    </form>



    <?php

    if (isset($_POST['cadastrar'])) {

      $tecido = $_POST['tecido'];
      $prazo = $_POST['prazo'];
      $notas = $_POST['notas'];
      $qtd = $_POST['qtd'];
      $valor = $_POST['valor'];

      $qtd_p = $_POST['qtd_p'];
      $qtd_m = $_POST['qtd_m'];
      $qtd_g = $_POST['qtd_g'];
      $qtd_gg = $_POST['qtd_gg'];

      $sql = mysql_query("UPDATE producao SET tecido = '$tecido', prazo = '$prazo', notas = '$notas', qtd = '$qtd', valor = '$valor', qtd_p = '$qtd_p', qtd_m = '$qtd_m', qtd_g = '$qtd_g', qtd_gg = '$qtd_gg' ");
      
      exit(header("Location: prod.php"));

    }
    endif;
    ?>

