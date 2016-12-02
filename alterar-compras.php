<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>
<?php if(isset($_POST['alterar'])):

//VAR
  $product_id = $_POST['product_id'];

//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM compras WHERE id = '$product_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

//VARIAVEIS DO ITEM EM CONSULTA

  $nome = $item['nome'];
  $notas = $item['notas'];
  $valor = $item['valor'];
  $data = $item['data'];

  endif; ?>

 <div class="formulario">

    <h4>Cadastrar Compra</h4>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
      <div class="form-group">
        <label for="exampleInputEmail1">Titulo da Compra</label>
        <input class="form-control" type="text" name="nome" value="<?php echo "$nome" ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Valor da Compra</label>
        <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
        <input type="number" step="0.01" class="form-control" name="valor" value="<?php echo "$valor" ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Data da Compra</label>
        <input type="date" class="form-control" name="data" value="<?php echo "$data" ?>">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Descrição da Compra</label>
        <input type="text" class="form-control" name="notas" value="<?php echo "$notas" ?>">
      </div>

<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
<button type="submit" class="btn btn-primary button-roxo" name="alterar1">Alterar Compra</button>
</form>



<?php

if (isset($_POST['alterar1'])) {

  $nome = $_POST['nome'];
  $valor = $_POST["valor"];
  $data = $_POST["data"];
  $notas = $_POST["notas"];

  $sql = mysql_query("UPDATE compras SET nome = '$nome', valor = '$valor', data = '$data', notas = '$notas' ");
 }

endif;
?>
</div>
