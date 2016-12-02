<div id="navegacao" class="navbar">
  <div class="container">
    <div class="content">
      <div id="navegacao__content">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">Mad Monkey</a>
            </div>



            <ul class="nav navbar-nav navbar-right hidden-xs" style="display: flex">
             <?php if(isset($_SESSION['uid'])): ?>
                
              <?php else: ?><li><a href="signin.php"><i class="icon-login" aria-hidden="true"></i></a></li>
              <?php endif; ?>

              <?php if(isset($_SESSION['uid'])): ?>
               <!--  <li><a href="admin-listar.php"><i class="icon-basket-loaded" aria-hidden="true"></i></a></li> -->
                <li><a href="favoritos.php"><i class="icon-heart" aria-hidden="true"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-user" aria-hidden="true"></i><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li class="username-box"><?php echo $user['username']; ?></li>
                 
                   <!-- <li><a href="compras.php">Suas compras</a></li>
                   <li><a href="cadastrar-produto.php">Vender Meme</a></li>
                   <?php if($user['role'] == 2): ?>
                    <li><a href="admin.php">Cadstrar Produto</a></li>
                    <li><a href="admin-listar.php">Listar Produtos</a></li>
                  <?php endif; ?>
                  <li role="separator" class="divider"></li> -->
                  <li><a href="signout.php">Sair</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</div>
</div>
</div>


<!-- <form method="GET" action="buscar.php">
  <div class="buscar container">
    <div class="buscar__inner content">
      <div class="input-group">
        <input type="text" class="form-control" name="keywords" placeholder="Faça uma busca...">
        <span class="input-group-btn">
          <input type="submit" name="buscar" value="buscar">
        </span>
      </div>
    </div>
</div>
</form> -->