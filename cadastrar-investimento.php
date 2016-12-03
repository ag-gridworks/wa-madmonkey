<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

<div class="formulario">

<h4>Cadastrar Investimento</h4>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">

  <div class="form-group">
    <label for="exampleInputPassword1">Valor do Investimento</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="valor">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Data do Investimento</label>
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
  <button type="submit" class="btn btn-primary button-roxo" name="cadastrar">Registrar Investimento</button>
</form>



<?php

if (isset($_POST['cadastrar'])) {

	$valor = $_POST["valor"];
  $data = $_POST["data"];
	

			 $sql = mysql_query("INSERT INTO investimentos VALUES ('', '".$valor."', '".$data."')");

	}

endif;
?>
</div>