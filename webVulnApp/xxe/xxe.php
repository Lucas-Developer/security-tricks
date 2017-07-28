<?php
$xml = $_POST['xml'];
$student = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOENT);
?>
<html>
	<style>
		body{
			background-color: black;
			color: white;
		}
	</style>
	<head>
		<title>Name Game</title>
	</head>
	<body>
	
		<form action="xxe.php" method="POST">
			<input name="xml" type="text">
			<br>
			<input type="submit">
		</form> 
		<br>
		<br>
		<h3>
			<pre>
				Your name is <?php echo $student->name; ?>
			</pre>
		</h3>
	</body>
</html>
