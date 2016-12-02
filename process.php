<?php 

include("includes/header.php");
connect();

// //////////////////////////////////////////////////////////////////////////////////////////////////////////
// //ENVIAR PRODUTOS PARA O BANCO DE DADOS
// if (isset($_POST['enviar'])):

//     $nome = $_POST['nome'];
// $valor = $_POST['valor'];
// $img = $_POST['img'];
// $descr = $_POST['descr'];

// $enviar = mysql_query("INSERT INTO produtos (nome,valor,img,descr) VALUES ('$nome','$valor','$img','$descr')") or die(mysql_error());


// header('Location: ' . $_SERVER['HTTP_REFERER']);

// endif;

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//DELETAR PRODUTOS DO BANCO DE DADOS
if (isset($_POST['deletar'])):

    $product_id = $_POST['product_id'];
    $database = $_POST['database'];

    $deletar = mysql_query("DELETE FROM $database WHERE id = $product_id") or die(mysql_error());


header('Location: ' . $_SERVER['HTTP_REFERER']);

endif;

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//ALTERAR PRODUTOS NO BANCO DE DADOS
if (isset($_POST['alterar'])):

    $product_id = $_POST['product_id'];
$product_name = $_POST['nome'];
$product_value = $_POST['valor'];
$product_descr = $_POST['descr'];
$foto = $_FILES["foto"];

if (!empty($product_name)) {
    $alterar = mysql_query("UPDATE produtos SET nome = '$product_name' WHERE id = $product_id") or die(mysql_error());
}

if (!empty($product_value)) {
    $alterar = mysql_query("UPDATE produtos SET valor = '$product_value' WHERE id = $product_id") or die(mysql_error());
}

if (!empty($product_descr)) {
    $alterar = mysql_query("UPDATE produtos SET descr = '$product_descr' WHERE id = $product_id") or die(mysql_error());
}


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

if (count($error) == 0) {

    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

    $caminho_imagem = "fotos/" . $nome_imagem;

    move_uploaded_file($foto["tmp_name"], $caminho_imagem);

    $sql = mysql_query("UPDATE produtos SET img = '$nome_image' ");
    if ($sql){
        echo "Imagem alterada.";
    }
}

if (count($error) != 0) {
    foreach ($error as $erro) {
        echo $erro . "<br />";
    }
}
}

endif;

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//QUEUE DE LOGIN
if(isset($_POST['login'])):

    $username = protect($_POST['username']);
$password = protect($_POST['password']);
$login_check = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username' AND `password`='".md5($password)."'") or die(mysql_error());
if(mysql_num_rows($login_check) == 0){
    echo "Usuário ou senha inválidos!";
}else{
    $get_id = mysql_fetch_assoc($login_check);
    $_SESSION['uid'] = $get_id['id'];
    header("Location: index.php");
}
endif;

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//ENVIAR PRODUTOS PARA O BANCO DE DADOS
if (isset($_POST['comprar'])):

    $item_id = $_POST['product_id'];
$qt = $_POST['qt'];

$enviar = mysql_query("INSERT INTO pedidos (user_id,item_id,qt) VALUES ('$user_id','$item_id','$qt')") or die(mysql_error());

header('Location: compras.php');

endif;


//////////////////////////////////atualiza tamanho p

if (isset($_POST['add_p'])) {
    $p_id = $_POST['product_id'];
    $qtd_p = $_POST['qtd_p'];

    $alterar = mysql_query("UPDATE produtos SET qtd_p = qtd_p+1 WHERE id = $p_id") or die(mysql_error());

    if ($alterar) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
   } else {
    echo "erro";
    }
}

if (isset($_POST['add_m'])) {
    $p_id = $_POST['product_id'];
    $qtd_m = $_POST['qtd_m'];

    $alterar = mysql_query("UPDATE produtos SET qtd_m = qtd_m+1 WHERE id = $p_id") or die(mysql_error());

    if ($alterar) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
   } else {
    echo "erro";
    }
}

if (isset($_POST['add_g'])) {
    $p_id = $_POST['product_id'];
    $qtd_g = $_POST['qtd_g'];

    $alterar = mysql_query("UPDATE produtos SET qtd_g = qtd_g+1 WHERE id = $p_id") or die(mysql_error());

    if ($alterar) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
   } else {
    echo "erro";
    }
}

if (isset($_POST['add_gg'])) {
    $p_id = $_POST['product_id'];
    $qtd_gg = $_POST['qtd_gg'];

    $alterar = mysql_query("UPDATE produtos SET qtd_gg = qtd_gg+1 WHERE id = $p_id") or die(mysql_error());

    if ($alterar) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
   } else {
    echo "erro";
    }
}



if (isset($_POST['registrar'])) {

    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $p_id = $_POST['product_id'];

    $notas = $_POST['notas'];

    $valor = $_POST['product_price'];

    $desconto = $_POST['desconto'];
    $custo = $_POST['product_custo'];
    $lucro_total = $_POST['product_lucro_total'];

    $lucro = $valor - $custo - $custos_fixos - $desconto;
    $lucro_total = $lucro_total + $lucro;

    if ($desconto > 0) {

        $valor_real = $valor - $desconto;
    } else {
        $valor_real = $valor;
    }

    if ($tamanho == 'p') {

        $p_get = mysql_query("SELECT qtd_p FROM produtos WHERE id = '$p_id'") or die(mysql_error());
        $p = mysql_fetch_assoc($p_get);

        $qtd_p = $p['qtd_p'];
        $qtd_p = $qtd_p - 1;

        $alterar = mysql_query("UPDATE produtos SET qtd_p = '$qtd_p' WHERE id = $p_id") or die(mysql_error());
        }

     if ($tamanho == 'm') {

        $m_get = mysql_query("SELECT qtd_m FROM produtos WHERE id = '$p_id'") or die(mysql_error());
        $m = mysql_fetch_assoc($m_get);

        $qtd_m = $m['qtd_m'];
        $qtd_m = $qtd_m - 1;

        $alterar = mysql_query("UPDATE produtos SET qtd_m = '$qtd_m' WHERE id = $p_id") or die(mysql_error());
        }

     if ($tamanho == 'g') {

        $g_get = mysql_query("SELECT qtd_g FROM produtos WHERE id = '$p_id'") or die(mysql_error());
        $g = mysql_fetch_assoc($g_get);

        $qtd_g = $g['qtd_g'];
        $qtd_g = $qtd_g - 1;

        $alterar = mysql_query("UPDATE produtos SET qtd_g = '$qtd_g' WHERE id = $p_id") or die(mysql_error());
        }

     if ($tamanho == 'gg') {

        $gg_get = mysql_query("SELECT qtd_gg FROM produtos WHERE id = '$p_id'") or die(mysql_error());
        $gg = mysql_fetch_assoc($gg_get);

        $qtd_gg = $gg['qtd_gg'];
        $qtd_gg = $qtd_gg - 1;

        $alterar = mysql_query("UPDATE produtos SET qtd_gg = '$qtd_gg' WHERE id = $p_id") or die(mysql_error());
        }

        $alterar = mysql_query("UPDATE produtos SET vendidos = vendidos+1 WHERE id = $p_id") or die(mysql_error());
        $alterar = mysql_query("UPDATE produtos SET lucro_total = '$lucro_total' WHERE id = $p_id") or die(mysql_error());

        $sql = mysql_query("INSERT INTO vendas VALUES ('', '".$nome."', '".$p_id."', now(), '".$lucro."', '".$notas."', '".$desconto."', '".$valor."', '".$valor_real."', '".$tamanho."')");
            if ($sql){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "erro";
            }
}

// Deletar Custo

if (isset($_POST['deletar_custo'])):

$custo_id = $_POST['custo_id'];

$deletar = mysql_query("DELETE FROM custos_fixos WHERE id = $custo_id") or die(mysql_error());


if ($deletar) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "erro";
}

endif;


// Deletar Gasto

if (isset($_POST['deletar_gasto'])):

$gasto_id = $_POST['gasto_id'];

$deletar = mysql_query("DELETE FROM gastos WHERE id = $gasto_id") or die(mysql_error());


if ($deletar) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "erro";
}

endif;
