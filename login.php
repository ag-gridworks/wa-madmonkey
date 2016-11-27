<?php
include("header.php");

    if(isset($_SESSION['uid'])){
        echo "Você já está logado!";
    }else{
        
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
    }
?>