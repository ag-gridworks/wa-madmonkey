<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" 
      type="image/png" 
      href="images/favicon.png">
	<title>Mad Monkey Store</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="stylesheet" href="css/vendors/plugins.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<script src="js/vendors/jquery/jquery-3.1.0.min.js"></script>
	<script src="js/vendors/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/sortable.js"></script>
</head>

<?php error_reporting(E_ALL ^ E_DEPRECATED); ?>

<?php require_once("functions.php");?>

<?php require_once("config.php");?>
<?php session_start(); ?>
<?php connect();

$mysqli = new mysqli("mysql427.umbler.com:41890", "paesvitor", "freelove12", "sysmad");


if (isset($_SESSION['uid'])) {

	include("safe.php");
}
include("navbar.php");

if (isset($_SESSION['uid'])) {

	include("options.php");
}

$sql = mysql_query("SELECT SUM(valor) as total FROM custos_fixos");
$row = mysql_fetch_array($sql);
   $custos_fixos = $row['total'];

$sql3 = mysql_query("SELECT SUM(valor) as total FROM gastos");
$row3 = mysql_fetch_array($sql3);
   $total_gastos = $row3['total'];

$contar = mysql_query("SELECT * FROM vendas");
$total_vendas = mysql_num_rows($contar);


$sql2 = mysql_query("SELECT SUM(lucro) as total FROM vendas");
$row2 = mysql_fetch_array($sql2);
   $lucro1 = $row2['total'];

$sql4 = mysql_query("SELECT SUM(valor_real) as total FROM vendas");
$row4 = mysql_fetch_array($sql4);
   $total_vendido = $row4['total'];

$sql5 = mysql_query("SELECT SUM(valor) as total FROM compras");
$row5 = mysql_fetch_array($sql5);
   $total_compras = $row5['total'];


$sql6 = mysql_query("SELECT SUM(valor) as total FROM investimentos");
$row6 = mysql_fetch_array($sql6);
   $investimentos = $row6['total'];


   $lucrototal = $lucro1 - $total_gastos;

   $caixa = $total_vendido - $total_gastos - $total_compras + $investimentos;


?>
