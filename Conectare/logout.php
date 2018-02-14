<?php
	session_start();
	unset($_SESSION['utilizator']);
	header("Location:../index.php");
?>