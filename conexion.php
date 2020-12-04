<?php
session_start(); 
require "var.php";
require "user.php";

$server = mysqli_connect($serv, $usern, $passw, $dbname);

$sql="SELECT * FROM empleados WHERE id='$id' AND compa='$company'";

$result=mysqli_query($server,$sql);
$final=mysqli_num_rows($result);

if ($final>0) {
	$_SESSION['id']=$id;
	header("location:Empleados");
}
else{
	echo "No se pudo autenticar";
}
mysqli_free_result($result);
mysqli_close($server);
?>