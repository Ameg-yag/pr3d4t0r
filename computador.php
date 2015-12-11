<?php

//session_start();

//if ($_SESSION['login']==NULL){
//header('location:login.php');
//}

include ('header.php');
include ('menu.php');
require_once ("config/database.php");
$con = Database::connect();
$result = null;
//$sql = "SELECT * FROM mailserver WHERE userId=$_SESSION[idUser];";
$result = $con->query($sql);
?>

<script type="text/javascript" src="fancybox/lib/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
<script>
$('.preview').fancybox({
    type: "ajax",
    ajax: {method: "post"}, // added only because of jsfiddle restrictions
    beforeLoad: function() {
        this.ajax.data = $('#postp').serialize();
    }
});
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Consulta Computador
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Computador</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cadastrados</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nome da Maquina</th>
                        <th>Ultima Atualização</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $row) {?>
			<tr>
	                  <td><?php echo $row['id'] ?></td>
	                  <td><?php echo $row['userId'] ?></td>
	                  <td><?php echo $row['dest'] ?></td>
	                  <td>
			   <?php if ($row['status'] == 0) { // Fila = 0, Enviado = 1, Erro  =2
					echo "<small class='label pull-center bg-yellow'>Na Fila</small>";
				} elseif ($row['status'] == 1) {
					echo "<small class='label pull-center bg-green'>Enviado</small>";
				} elseif ($row['status'] == 2) {
					echo "<small class='label pull-center bg-red'>Erro</small>";
				};
			    ?>
			  </td>
	                  <td><?php echo $row['timestamp'] ?></td>
                       </tr>
		      <?php } ?>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

<?php include ('footer.php'); ?>
