<?php
if(isset($_FILES['image'])){
	$filename = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	$ext = strtolower(end(explode('.', $_FILES['image']['name'])));
	$blacklist = array("php", "php3", "phtml", "php4");
	if(in_array($ext, $blacklist)){
		echo "Extensao nao permitida<br>";
		exit(0);
	}
	move_uploaded_file($tmp, "images/".$filename);
	echo "Upload sucedido<br>";
	exit(0);
}
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="file", "image"/>
			<input type="submit"/>
		</form>
	</body>
</html>
