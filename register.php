    <?php

    include ("header.php");

    ?>

<?php if($role == 2): ?>

<div class="formulario container">
    <div class="row vertical-offset-100">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Fazer Cadastro</h3>
        </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" action="register.php" method="post">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Usuário" name="username" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Senha" name="password" type="password" value="">
              </div>

               <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" value="">
              </div>

              <input class="btn btn-lg btn-success btn-block" type="submit" value="Cadastrar" name="register">
            </fieldset>
              </form>


        <?php

        if(isset($_POST['register'])){
            $username = protect($_POST['username']);
            $password = protect($_POST['password']);
            $email = protect($_POST['email']);

            if($username == "" || $password == "" || $email == ""){
                echo "<br>Preencha todos os campos!";
            }elseif(strlen($username) > 14){
                echo "<br>Usuário deve conter menos de 14 caracteres!";
            }elseif(strlen($email) > 100){
                echo "<br>E-Mail muito longo!";
            }else{
                $register1 = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username'") or die(mysql_error());
                $register2 = mysql_query("SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
                if(mysql_num_rows($register1) > 0){
                    echo "<br>Este usuário já está em uso!";
                }elseif(mysql_num_rows($register2) > 0){
                    echo "<br>Este endereço de e-mail já está em uso!";
                }else{ 

                   $ins1 = mysql_query("INSERT INTO `user` (`username`,`password`,`email`) VALUES ('$username','".md5($password)."','$email')") or die(mysql_error());

                   echo "<br>Você se registou! <br>";

                   if ($ins1 == true) {
                    echo '<br><p><a class="cormedio" href="signin.php">Clique Aqui para fazer login</a></p>';
                }
            }
        }
    }

    ?>

    </div>
   </div>
      </div>
    </div>
  </div>
</div>

<?php else: echo "Você não tem permissão para acessar essa página"; ?>
<?php endif; ?>
