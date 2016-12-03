<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<div class="formulario">
	
		<h4>Cadastrar Produção de novo produto</h4>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
			<div class="form-group">
				<label for="exampleInputEmail1">Tecido</label>
				<input class="form-control" type="text" name="tecido">
			</div>

			<div class="form-group">
				<label for="exampleInputFile">Imagem do tecido</label>
				<input type="file" class="form-control-file" name="foto" aria-describedby="fileHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Prazo</label>
				<input class="form-control" type="date" name="prazo">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Quantide (em metros)</label>
				<small id="fileHelp" class="form-text text-muted">Em KG ou Metros</small>
				<input type="number" step="0.01" class="form-control" type="text" name="qtd_metros">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Valor do metro</label>
				<small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
				<input type="number" step="0.01" class="form-control" name="valor_metro">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Valor do produto</label>
				<small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
				<input type="number" step="0.01" class="form-control" name="valor_produto">
			</div>

			<div class="form-group col-md-3 col-xs-6">
				<label for="exampleInputPassword1">Quantidade P para produduzir</label>
				<input type="number" class="form-control" name="qtd_p">
			</div>
			<div class="form-group col-md-3 col-xs-6">
				<label for="exampleInputPassword1">Quantidade M para produduzir</label>
				<input type="number" class="form-control" name="qtd_m">
			</div>
			<div class="form-group col-md-3 col-xs-6">
				<label for="exampleInputPassword1">Quantidade G para produduzir</label>
				<input type="number" class="form-control" name="qtd_g">
			</div>
			<div class="form-group col-md-3 col-xs-6">
				<label for="exampleInputPassword1">Quantidade GG para produduzir</label>
				<input type="number" class="form-control" name="qtd_gg">
			</div>

			<div class="form-group">
				<label for="exampleTextarea">Adicionar Notas</label>
				<textarea input="text" name="notas" class="form-control" rows="3"></textarea>
			</div>


			<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
			<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
			<button type="submit" class="btn btn-primary button-roxo" name="cadastrar">Registrar Produção</button>
		</form>



		<?php

		if (isset($_POST['cadastrar'])) {

			$tecido = $_POST['tecido'];
			$prazo = $_POST['prazo'];
			$notas = $_POST['notas'];
			$qtd_metros = $_POST['qtd_metros'];
			$valor_metro = $_POST['valor_metro'];
			$valor_produto = $_POST['valor_produto'];
			$foto = $_FILES['foto'];


			$qtd_p = $_POST['qtd_p'];
			$qtd_m = $_POST['qtd_m'];
			$qtd_g = $_POST['qtd_g'];
			$qtd_gg = $_POST['qtd_gg'];

			if (!empty($foto["name"])) {

				$largura = 22500;
				$altura = 27000;
				$tamanho = 60000000;

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



				$sql = mysql_query("INSERT INTO producao (tecido,prazo,notas,qtd_p,qtd_m,qtd_g,qtd_gg,qtd_metros,valor_metro,img,valor_produto)
					VALUES ('$tecido','$prazo','$notas','$qtd_p','$qtd_m','$qtd_g','$qtd_gg','$qtd_metros','$valor_metro','$nome_imagem','$valor_produto')");
				if ($sql){
					header("Location: prod.php");
				}
			}
		}

			endif;
			?>
			<div style="margin-bottom: 80px"></div>
		</div>

