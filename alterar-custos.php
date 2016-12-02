<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>
<?php if(isset($_POST['alterar'])):

//VAR
  $product_id = $_POST['product_id'];

//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM custos_fixos WHERE id = '$product_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

//VARIAVEIS DO ITEM EM CONSULTA

  $nome = $item['nome'];
  $valor = $item['valor'];

  endif; ?>

 <div class="formulario">

<h4>Cadastrar Custo Fixo:</h4>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome do Custo Fixo</label>
    <input class="form-control" type="text" name="nome" value="<?php echo"$nome" ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Valor do Custo Fixo</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="valor"  value="<?php echo"$valor" ?>">
  </div>
  

  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
  <button type="submit" class="btn btn-primary button-roxo" name="alterar1">Alterar</button>
</form>



<?php

if (isset($_POST['alterar1'])) {

  $nome = $_POST['nome'];
  $valor = $_POST['valor'];
  

       $sql = mysql_query("UPDATE custos_fixos SET nome = '$nome', valor = '$valor'");

  }


endif;
?>
</div>
