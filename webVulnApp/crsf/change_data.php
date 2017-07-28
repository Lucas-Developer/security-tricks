<?php

$confirmPass = $_POST['confirmPassword'];
$username = $_POST['username'];
$pass = $_POST['password'];



if($pass != $confirmPass){
	header("Location: http://localhost/security-tricks/webVulnApp/crsf/change_cenarius.php");
}else{
	$db = new PDO('mysql:host=localhost;dbname=client', 'novousuario', 'password');
	//$db = new PDO('mysql:host=localhost;dbname=client', 'novousuario', 'password');
	$up = $db->prepare("UPDATE data SET password=? WHERE name=?");
	$up->execute(array($pass,$username));
	$affect = $up->rowCount();
	

	echo "<p>Success</p>";
}
