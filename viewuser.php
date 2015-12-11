<?php

require_once ("config/database.php");
$con = Database::connect();
$result = null;
$sql = "SELECT * FROM users WHERE id=$_REQUEST[iduser];";
$result = $con->query($sql);

?>
<div class="modal-dialog">
 <div class="modal-content">
  <div class="modal-header">
   <h4 class="modal-title">Dados do Usuário</h4>
  </div>

  <div class="modal-body">
  <?php foreach ($result as $row) { ?>
   <form action="usercontrol.php?opt=del&iduser=<?php echo $row['id']; ?>" method="post" role="form">
      <div class="box-body">
	<div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"> </i></span>
          <input class="form-control" type="text" name="user" value="<?php echo $row['user']; ?>" disabled>
	</div>
	<br>
	<div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input class="form-control" type="text" name="email" value="<?php echo $row['email']; ?>" disabled>
	</div>
	<br>
	<br>
   <?php }; if ($row['user'] != "admin") { ?>
        <button type="submit" class="btn btn-danger">Remover Usuário</button>
    <?php }; ?>
      </div><!-- /.box-body -->
  </div>

     </form>
 </div><!-- /.modal-content -->
</div>
