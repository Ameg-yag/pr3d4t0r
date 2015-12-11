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
$sql = "SELECT * FROM users;"; //status 1 = Ativo --------- status 2 = inativo
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
            Usuários
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuários</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Usuários do Sistema</h3>
		   <div class="pull-right box-tools">
                    <a href="newuser.php" class="preview fancybox fancybox.ajax">
		     <button class="btn btn-info btn-sm" title="Adicionar Usuario"><i class="fa fa-user-plus"></i></button>
                    </a>
                </div>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Token</th>
                        <th>Email</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $row) {?>
			<tr>
	                  <td><?php echo $row['id'] ?></td>
	                  <td><a href="viewuser.php?iduser=<?php echo $row['id'] ?>" class="preview fancybox fancybox.ajax"><?php echo $row['user'] ?></a></td>
	                  <td> 
			   <?php if ($row['token'] == null) {
				   echo "<a href='geraToken.php?iduser=$row[id]'><button class='btn btn-info'>Gerar Token</button></a>";
			  	 }else {
				   echo $row['token'];
				 }; ?> 
			  </td>
	                  <td><?php echo $row['email'] ?></td>
	                  <td>
			   <?php if ($row['status'] == 0) { // Ativo = 0, Bloqueado = 1
					echo "<small class='label pull-center bg-green'>Ativo</small>";
				} elseif ($row['status'] == 2) {
					echo "<small class='label pull-center bg-red'>Bloqueado</small>";
				};
			    ?>
			  </td>
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
