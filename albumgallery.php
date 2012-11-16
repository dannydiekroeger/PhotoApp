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

<script>
	function road() {
		console.log("road username is: " + localStorage.getItem('username'));
		console.log('<?php echo $_POST["friend0"];?>');
		console.log('<?php echo $_POST["friend1"];?>');
		console.log('<?php echo $_POST["friend2"];?>');
	}
</script>

<body onload="road()">

<div id="fb-root"></div>


<!-- Start of Album Gallery page-->
<div data-role="page" id="Albumgallery" data-add-back-btn="true" class="gallery-page" rel="external">
	<div data-role="header" >
		<?php
			$albumName = $_POST["album"];
			echo "<h1>".$albumName."</h1>";
		?>
		<a data-role="button" data-icon="arrow-l" class="ui-btn-left" onclick="gohome()">Home</a> 
		
		<a data-role="button" data-icon="plus" class="ui-btn-right" onclick="uploadButton()">Photo</a>
	</div><!-- /header -->
	<div data-role="content" id="galleryContent">
		<?php
		include("config.php");
		$albumName = $_POST["album"];
		$checkq = "select distinct * from Album where AlbumName ='$albumName'";
		$checkresult = mysql_query($checkq);
		$bro = mysql_fetch_assoc($checkresult);
		echo "<p>".$bro['AlbumName']."</p>";
		if($bro == "" and $albumName != "") {
			$query = "INSERT INTO Albums VALUES ('$albumName', 'NULL','NULL', 'NULL')";
			$result = mysql_query($query);
			
			$myname = $_POST["myName"];
			$myq = "insert into Album values('$albumName', '$myname')";
			$myr = mysql_query($myq);
			
			$numFriends = $_POST["numFriends"];
			echo "numFriends is ".$numFriends;
			for($i=0; $i<$numFriends; $i++) {
				$istring = "$i";
				$idname = "friend".$istring;
				$name = $_POST[$idname];
				echo "<p>".$name."</p>";
				$friendq = "insert into Album values('$albumName', '$name')";
				$friendr = mysql_query($friendq);
			}
		} else {
		}

		?>			
				
		
		<ul class="gallery">

      <?php
			include('config.php');
			$albumName = $_POST["album"];
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

<script>
//return to updated version of album gallery while conserving post data
	function backdata() {
	var myform = document.createElement("form");
	myform.method = "post";
	myform.action = "albumgallery.php";
	myinput = document.createElement("input");
	myinput.setAttribute("name", "album");
	myinput.setAttribute("value", "<?php echo $_POST['album']; ?>");
	myform.appendChild(myinput);
	console.log("name is " + name);
	document.body.appendChild(myform);
	myform.submit();
	}
</script>


<div data-role="page" id="popupload">

	<div data-role="header" data-theme="a" data-add-back-btn="true">
			<div onclick="backdata()"data-role="button" data-icon="arrow-l" class="ui-btn-left" >Back</div>

		<h1>Upload a Photo</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">
	<!--Camera access -->	
		<div class="container">
            <form id="upload_f" enctype="multipart/form-data" method="post" action="upload.php">
             <div>
             <input type="text" name="albumname" id="albumname" style="display:none" value=<?php echo $albumName; ?>>
             <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" style="display:none"/></div>
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
                    <img id="preview" />
                      <div>
                    </div>
                </form>
                
             <!-- close upload_form_cont -->
        </div>
		<!-- end camera access-->
		<input type="button" value="Upload" onclick="startUploading()"/>
	</div><!-- /content -->
</div><!-- /page popup -->



<script type="text/javascript">
	function gohome() {
		var myform = document.createElement("form");
		myform.id = "backhome";
		myform.method = "post";
		myform.action = "index.php";
		myinput = document.createElement("input");
		myinput.setAttribute("name", "username");
		myinput.setAttribute("value", localStorage.getItem('username'));
		
		myform.appendChild(myinput);
		document.body.appendChild(myform);
		myform.submit();
		console.log("username is: " + localStorage.getItem('username'));
		
	}
	function uploadButton() {
		$('#image_file').trigger('click');
		console.log("i clicked the button");
		var form = document.forms['upload_f'];
		console.log(form);
		openPopup();
	};
	function openPopup() {
		window.location = "#popupload";
	}
</script>
	<script type="text/javascript">
		
		/*
		 * IMPORTANT!!!
		 * REMEMBER TO ADD  rel="external"  to your anchor tags. 
		 * If you don't this will mess with how jQuery Mobile works
		 */
		/*
		(function(window, $, PhotoSwipe){
			
			$(document).ready(function(){
				
				$('div.gallery-page')
					.live('pageshow', function(e){
						
						var 
							currentPage = $(e.target),
							options = {},
							photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options,  currentPage.attr('id'));
							
						return true;
						
					})
					
					.live('pagehide', function(e){
						
						var 
							currentPage = $(e.target),
							photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));

						if (typeof photoSwipeInstance != "undefined" && photoSwipeInstance != null) {
							PhotoSwipe.detatch(photoSwipeInstance);
						}
						
						return true;
						
					});
				
			});
		
		}(window, window.jQuery, window.Code.PhotoSwipe));
		*/
	</script>
</body>
</html>


