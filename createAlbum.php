<html>
<head>
<script>
	function redirect() {
		//window.location = "index.php#album";
	}
</script>
</head>

<body onLoad="redirect()">
<h1>Loading...</h1>
<?php
		include("config.php");
		$albumName = $_POST["album"];
		$query = "INSERT INTO Albums VALUES 
		('$albumName', 'NULL','NULL', 'NULL')";
		$result = mysql_query($query);
		if ($_POST["album"] == "album") {
				
		} 
?>
</body>

</html>