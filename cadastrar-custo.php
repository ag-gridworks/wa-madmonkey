<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

<div class="formulario">

<h4>Cadastrar Custo Fixo:</h4>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome do produto</label>
    <input class="form-control" type="text" name="nome">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Valor do produto</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="valor">
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
    <label for="exampleInputFile">Imagem do produto</label>
    <input type="file" class="form-control-file" name="foto" aria-describedby="fileHelp">
  </div>
  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
  <button type="submit" class="btn btn-primary button-roxo" name="cadastrar">Cadastrar</button>
</form>



<?php

if (isset($_POST['cadastrar'])) {

	$nome = $_POST['nome'];
	$valor = $_POST['valor'];
	$foto = $_FILES["foto"];
	
	if (!empty($foto["name"])) {
		
		$largura = 2250;
		$altura = 2700;
		$tamanho = 6000000;
 		
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		$dimensoes = getimagesize($foto["tmp_name"]);

		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}

		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);

			$sql = mysql_query("INSERT INTO custos_fixos VALUES ('', '".$nome."', '".$valor."', '".$nome_imagem."')");
			if ($sql){
				echo "Custo Cadastrado.";
			}

	}
}

endif;
?>
</div>