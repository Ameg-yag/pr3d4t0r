<?php

include('config/database.php');
$con = Database::connect();
$result = null;
$token = md5($_REQUEST[iduser]); //Gera Token Md5 do id do usuario

$sql = "UPDATE users SET token='$token' WHERE id=$_REQUEST[iduser]";
$result = $con->query($sql);

header('location:users.php');
?>

