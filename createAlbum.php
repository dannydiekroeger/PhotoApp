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

	
</head> 
<body>

<div id="fb-root"></div>

<!-- put a php check to see if album is new or not -->



<div data-role="page" id="addPhoto" data-add-back-btn="true">

	<!-- Header in PHP -->
	<div data-role='header'>
		<?php
			echo "<h1>".$_POST["album"]."</h1>";
		?>
	</div>
	<div data-role="content">
	
	<?php
		include("config.php");
		$albumName = $_POST["album"];
		$checkq = "select * from Albums where AlbumName ='$albumName'";
		$checkresult = mysql_query($checkq);
		$bro = mysql_fetch_assoc($checkresult);
		echo "<p>".$bro['AlbumName']."</p>";
		if($bro == "") {
			$query = "INSERT INTO Albums VALUES ('$albumName', 'NULL','NULL', 'NULL')";
			$result = mysql_query($query);
			echo "<p> made a new album! </p>";
		} else {
			echo "<p> already exists! </p>";
		}

	?>			
				
	<!--Camera access -->	
		<div class="container">
            
            
                <form id="upload_f" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                    	<input class="picButton" type="button" value="Take or Upload a Pic!" onclick="uploadButton()"/>
                    	<input type="text" name="albumname" id="albumname" style="display:none"/>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();"   style="display:none"/></div>
                    </div>

                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize"></div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
                      <div>
                        <input type="button" value="Upload" onclick="startUploading()"/>
                    </div>
                </form>
                <img id="preview" />
             <!-- close upload_form_cont -->
        </div>
		<!-- end camera access-->	
	</div><!-- /content -->

	
</div><!-- end Album page-->
	<style>

input.picButton {
    background-image: url("camerabutton.png");  
    background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;        
     height: 100px; 
    
    vertical-align: middle;
    padding-bottom:10px; 
}
	</style>

<script type="text/javascript">
function uploadButton() {
	$('#image_file').trigger('click');
	
	var form = document.forms['upload_f'];
	
	<?php
		include('config.php');
		$countquery = 'SELECT * FROM Gallery';
		$countresult = mysql_query($countquery);
		$rows = mysql_num_rows($countresult) + 1;
		
	?>
	
	
	
	console.log(form);
}
</script>

</body>
</html>


