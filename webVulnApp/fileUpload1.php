<?php
if(isset($_FILES['image'])){
	$filename = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	$ext = end(explode('.', $_FILES['image']['name']));
	$blacklist = array("php","php3","php4","phtml");
	if(in_array($ext, $blacklist)){
		echo "<b style='color:red;'>Extensao nao permitida</b><br>";
		exit(0);
	}
	move_uploaded_file($tmp, "images/".$filename);
	echo "<b style='color:green;'>Upload bem sucedido</b><br>";
	exit(0);
}

?>

<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type='file' name='image'/>
			<input type='submit'/>
		</form>
	</body>
</html>
