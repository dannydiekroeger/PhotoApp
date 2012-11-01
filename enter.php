<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Submit</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<!-- Album page-->
<div data-role="page" id="Album">

	
	<!-- Header in PHP -->
	<?php echo "<div data-role='header'><h1>".$_POST["album"]."</h1></div>"; ?>
	<div data-role="content">

		<script type="text/javascript">
				// Save the username in local storage. That way you
				// can access it later even if the user closes the app.
				localStorage.setItem('album', '<?=$_POST["album"]?>');
		</script>
		
		<?php
		if ($_POST["album"] == "album") {
		} 
		?>	
				
				
	<!--Camera access -->	
		<div class="container">
            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                        <div><h2 for="image_file">Take or Upload a Photo!</h2>

                        </div>
                        
                        </br>
                        <input type="button" value="Take or Upload a Pic!" onclick="uploadButton()" />
                        <!-- make it upload right away, not "fileSelected()" 
                        onchange="startUploading();"-->
                        <div><input type="file" name="image_file" id="image_file" onchange="enter.php/#Albumgallery" style="display:none"/></div>
                    </div>
                    <!--
                    <div>
                    </br>
                    <input type="button" value="Add Photo to Album" onclick="startUploading()" />
                    </div>
                    -->
                    </br></br>
<a href="#Albumgallery" data-role="button" data-theme="d">Album Gallery</a>	
           	<p><a href="#confirmAlbumLeave" data-role="button" data-theme="d" data-icon="delete" data-pos="right" data-rel="dialog">Stop Contributing to Album</a></p>	
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
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
                </form>
                <img id="preview" />
            </div>
        </div>	
		<!-- end camera access-->	
		
	</div><!-- /content -->
		<script type="text/javascript">
		$("#logout").click(function() {
			localStorage.removeItem('username');
			$("#form").show();
			$("#logout").hide();
		});
	</script>
</div><!-- end Album page-->

<script type="text/javascript">


</script>

</body>
</html>