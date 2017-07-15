<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="reflected.php">
			<input type="text" name="message">
			<input type="submit">
<?php
    echo "<br><br>";
    $q = $_GET['message'];
    echo $q;
?>
	</form>
	</body>
</html>
