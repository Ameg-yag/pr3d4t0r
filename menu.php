  <body class="skin-blue">

    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>:: Pr3d4d0r ::</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown messages-menu">
  <!--              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-plus"></i>
                </a>
   -->             <ul class="dropdown-menu">
                  <li class="header">Acesso Rápido</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="send.php?opt=sms">
                          <i class="fa fa-comments text-aqua"></i> Enviar um SMS
                        </a>
                      </li>
                      <li>
                        <a href="send.php?opt=email">
                          <i class="fa fa-envelope text-aqua"></i> Enviar um E-mail
                        </a>
                      </li>
                      <li>
                        <a href="users.php">
                          <i class="fa fa-user-plus text-aqua"></i> Adicionar Usuários
                        </a>
                      </li>
                    </ul>
		  </li>
		</ul>
	      </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>-->
                  <span class="hidden-xs"><?php echo $_SESSION['user'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image" /> 
                    <p>
                      <?php echo $_SESSION['nome'] ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
 <!--                 <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
<!--                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="logoff.php" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
<!--              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nome'] ?></p>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Procurar..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Principal</li>


            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a>
                <i class="fa fa-desktop"></i> <span>Computadores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: hide;">
                <li><a href="computador.php"><i class="fa fa-user"></i> Consulta</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="sms.php">
                <i class="fa fa-phone"></i> <span>Celulares</span>
              </a>
            </li>

	    <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Configurações</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>
