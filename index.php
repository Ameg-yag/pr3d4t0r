<?php

session_start();

include ('header.php');
include ('menu.php');
require_once ("config/database.php");
$con = Database::connect();
$result = null;

//Caulcula total de Usuários
$sql = "SELECT * FROM users;";
$result = $con->query($sql);
$totalUser  = $result->num_rows;

//Caulcula total de Emails registrados
$sql = "SELECT * FROM mailserver WHERE userId=$_SESSION[idUser];";
$result = $con->query($sql);
$totalMail  = $result->num_rows;

//Caulcula total de SMS registrados
$sql = "SELECT * FROM smsserver WHERE userId=$_SESSION[idUser];";
$result = $con->query($sql);
$totalSMS  = $result->num_rows;

//Caulcula total de Emails na Fila
//0 - Fila / 1 = Enviado / 2 = Erro
$sql = "SELECT * FROM mailserver WHERE status=0 AND userId=$_SESSION[idUser];";
$result = $con->query($sql);
$totalMailfila  = $result->num_rows;

//Caulcula total de SMS na Fila
//0 - Fila / 1 = Enviado / 2 = Erro
$sql = "SELECT * FROM smsserver WHERE status=0 AND userId=$_SESSION[idUser];";
$result = $con->query($sql);
$totalSMSfila  = $result->num_rows;
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $totalMail; ?></h3>
                  <p>Maquinas Cadastradas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>
                <a href="computador.php" class="small-box-footer">Relatório <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
         <div class="row">
         </div><!-- /.col -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
<?php include ('footer.php'); ?>
