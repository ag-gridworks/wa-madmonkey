<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid']) && $user['role'] == 2): ?>


<?php if(isset($_POST['alterar1'])):

$product_id = $_POST['product_id'];

$listar = mysql_query("SELECT * FROM produtos WHERE id = '$product_id'") or die(mysql_error());
$produto = mysql_fetch_assoc($listar);

$product_name = $produto['nome'];
$product_price = $produto['valor'];
$product_descr = $produto['descr'];

endif; ?>

<div class="formulario">

<h4>Você está alterando:</h4>
<p>Produto: <?php echo "$product_name"; ?> </p>
<p>Valor: R$<?php echo "$product_price"; ?>,00 </p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="alterar">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome do produto</label>
    <input class="form-control" type="text" name="nome">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Valor do produto</label>
    <input type="number" step="0.01" class="form-control" name="valor">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Custo do produto</label>
    <input type="number" step="0.01" class="form-control" name="custo">
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
  <div class="form-group">
    <label for="exampleTextarea">Descrição do produto</label>
    <textarea input="text" name="descr" class="form-control" rows="3"></textarea>
  </div>
 <!--  <div class="form-group">
    <label for="exampleInputFile">Imagem do produto</label>
     <input type="file" class="form-control-file" name="foto" aria-describedby="fileHelp">
  </div> -->
  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <button type="submit" class="btn btn-primary button-roxo" name="alterar-produto">Alterar</button>
</form>

</div>

<?php if (isset($_POST['alterar-produto'])):

$product_id = $_POST['product_id'];
$product_name = $_POST['nome'];
$product_value = $_POST['valor'];
$product_descr = $_POST['descr'];
$product_custo = $_POST['custo'];

if (!empty($product_name)) {
    $alterar = mysql_query("UPDATE produtos SET nome = '$product_name' WHERE id = $product_id") or die(mysql_error());
}

if (!empty($product_custo)) {
    $alterar = mysql_query("UPDATE produtos SET custo = '$product_custo' WHERE id = $product_id") or die(mysql_error());
}

if (!empty($product_value)) {
    $alterar = mysql_query("UPDATE produtos SET valor = '$product_value' WHERE id = $product_id") or die(mysql_error());
}

if (!empty($product_descr)) {
    $alterar = mysql_query("UPDATE produtos SET descr = '$product_descr' WHERE id = $product_id") or die(mysql_error());
}


endif; ?>

<?php
else: echo "Você não pode visitar essa página";
endif;
?>

