<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="reflected2.php">
			<input type="text" name="message" value="<?php echo htmlspecialchars($_GET['message'],ENT_QUOTES); ?>">
			<input type="submit">
<?php
    echo "<br><br>";
    $p = $_POST['message'];
    $q = $_GET['message'];
    $final_query = end(explode("</", $_GET['message']));
    $blacklist = array("script>", "SCRIPT>");
    if(in_array($final_query, $blacklist)){
    	echo "oops<br>";
	    exit(0);
    }
    echo $q;
    exit(0);
?>
	</form>
	</body>
</html>
