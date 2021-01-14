<?php 
	
	include "koneksi.php";

	$id = $_GET["id"];
	$sql = "delete from user where id='".$id."'";
	$res = mysqli_query($con,$sql);
	header("Location: input.php");

 ?>