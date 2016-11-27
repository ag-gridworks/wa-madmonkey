<?php

include("config.php");

// $root = $_SERVER['DOCUMENT_ROOT'].'/nac1';

include("header.php");

if (isset($_SESSION['uid'])) {

	include($root."/includes/panel.php");
} else {
	header("Location: signin.php");
}