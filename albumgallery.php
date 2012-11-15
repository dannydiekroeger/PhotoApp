<!DOCTYPE html> 
<html>
<!-- cboskii baby!! Jamin-->

<head>
	<title>Trail Mix</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link href="3.0.5/photoswipe.css" type="text/css" rel="stylesheet" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="images/trailmixicon.jpg" />
	<link rel="apple-touch-startup-image" href="images/background.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script type="text/javascript" src="3.0.5/lib/klass.min.js"></script>
	<script type="text/javascript" src="3.0.5/code.photoswipe.jquery-3.0.5.min.js"></script>
	<link href="3.0.5/examples/jquery-mobile.css" type="text/css" rel="stylesheet" />
	
	<link href="css/main.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js"></script>
	<script src="uploadscript.js"></script>
	
</head> 
<body>

<div id="fb-root"></div>


<!-- Start of Album Gallery page-->
<div data-role="page" id="Albumgallery" data-add-back-btn="true" class="gallery-page">
	<div data-role="header" >
		<?php
			$albumName = $_POST["album"];
			echo "<h1>".$albumName."</h1>";
		?>
		<a data-role="button" data-icon="arrow-l" class="ui-btn-left" onclick="gohome()">Back</a> 
		<!-- this needs to be a dynamic form -->
		<a href ="createAlbum.php" data-role="button" data-icon="plus" class="ui-btn-right" >New Photo</a>
	</div><!-- /header -->
	<div data-role="content" id="galleryContent">
		
		<ul class="gallery">

      <?php
			include('config.php');
			$picquery = "SELECT * from Gallery where AlbumName = '$albumName'";
			$picresult = mysql_query($picquery);
			while($bro = mysql_fetch_assoc($picresult)) {
				$path = "uploads/".$bro['PhotoPath'];
				echo "<li><a href='$path' rel='external'><img width='91' height='131' src='$path'/></a></li>";	
			}
		
		?>	

				
			
		</ul>
		
	
	
	</div><!-- /content -->

</div><!-- end Album Gallery-->


<script type="text/javascript">
	function gohome() {
		window.location = "index.php#Home";
	}
</script>

</body>
</html>


