<?php
setcookie("userid","N0T4DM1N");
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="formdata.php" method="post">
			<input type="text" name="message">
			<input type="submit">
		</form>
		<?php
			if(!empty($_POST['message'])){
				shell_exec("php /lvg934/admin.php {$message}");
			}
		?>
	</body>
</html>
