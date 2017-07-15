<?php
if(isset($_FILES['image'])){
	$filename = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	if(!getimagesize($_FILES['image']['tmp_name'])){
		echo "Imagem invalida<br>";
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
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="image">
			<input type="submit">
		</form>
	</body>
</html>
