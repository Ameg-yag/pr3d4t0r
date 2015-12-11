<?php
require_once 'config/database.php';
echo "<pre>";
session_start();
//var_dump($_SESSION);
//var_dump($_POST);

$con = Database::connect();
$result = null;
$sql = "SELECT * FROM users WHERE user=\"".$_REQUEST['user']."\" AND pass=\"".md5($_POST['pass'])."\";";
$result = $con->prepare($sql);
$result = $con->query($sql);
foreach ($result as $row);

if ($row == NULL) {
echo $sql;
	echo "Email ou Senha Inválida";
//	header("location:login.php");
//	$_SESSION['sessao'] = false;
} else {
	echo "Validando...";
	$_SESSION['sessao'] = true;
	$_SESSION['idUser'] = $row['id'];
	$_SESSION['user']   = $row['user'];
	$_SESSION['email']  = $row['email'];
	echo "<script> document.location = 'index.php' </script>";
}

?>
