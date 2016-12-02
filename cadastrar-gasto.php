<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

<div class="formulario">

<h4>Cadastrar Gasto</h4>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo do Gasto</label>
    <input class="form-control" type="text" name="nome">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Motivo do Gasto</label>
    <input class="form-control" type="text" name="motivo">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor do Gasto</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="valor">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Data do Gasto</label>
    <input type="date" class="form-control" name="data">
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
  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
  <button type="submit" class="btn btn-primary button-roxo" name="cadastrar">Registrar Gasto</button>
</form>



<?php

if (isset($_POST['cadastrar'])) {

	$nome = $_POST['nome'];
	$motivo = $_POST['motivo'];
	$valor = $_POST["valor"];
  $data = $_POST["data"];
	

			$sql = mysql_query("INSERT INTO gastos VALUES ('', '".$nome."', '".$motivo."', '".$valor."', '".$data."')");
			if ($sql){

			}

	}

endif;
?>
</div>