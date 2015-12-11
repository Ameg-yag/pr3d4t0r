<?php
/*
 Este arquivo controla o que acontece com os usuarios, as funções são ativadas atráves de parametros via GET com o identificador opt.
 opt=del&iduser= -  Deleta o usuário
 opt=add - Dados via POST
*/

require_once ("config/database.php");
$con = Database::connect();
$result = null;
var_dump($_REQUEST);

// Parametro opt = add
if ($_REQUEST['opt'] == "add"){

 if ($_REQUEST['idParent'] == null) { //Se não tiver ID parent, defina 1 - Filho do Admin
  $idParent = 1;
 } else {
  $idParent = $_REQUEST['idParent'];
 };

 //Validação se já existe algum usuário com o mesmo email
 $sql = "SELECT * FROM users WHERE email='$_REQUEST[email]';"; 
 $result = $con->query($sql);
 $row_cnt = $result->num_rows;

 if ($row_cnt != 0) {
	echo "usuário ja existe";
 } else {

	//Cria MD5 da Senha
	$pass = md5($_REQUEST['pass']);

	// Criação de usuário caso passe na primeira validação
	$sql = "INSERT INTO users (id, idParent, user, pass, token, email, status, created) VALUES
			  (NULL, $idParent, '$_REQUEST[user]', '$pass', NULL, '$_REQUEST[email]', NULL, NULL);";
	$result = $con->query($sql);
 };

 header('location:users.php');

// Parametro opt = del
} elseif ($_REQUEST['opt'] == "del") {

  $sql = "DELETE FROM users WHERE id='$_REQUEST[iduser]';"; 
  $result = $con->query($sql);
  header('location:users.php');
  die();

};


?>
