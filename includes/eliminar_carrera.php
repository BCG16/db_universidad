<?php


	$id = $_GET['id'];
	require_once ("db.php");
	$query = mysqli_query($conexion,"DELETE FROM carreras WHERE id = '$id'");
	
	header ('Location: ../views/carreras.php?m=1');
