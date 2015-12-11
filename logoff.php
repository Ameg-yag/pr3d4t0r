<?php
session_start();
$_SESSION['sessao'] = false;
session_destroy();
header("location:login.php");
