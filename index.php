

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

<div data-role="page" id="login">

	<div data-role="header">
		<h1>Facebook Login</h1>
	</div><!-- /header -->

	<div data-role="content">	
	<p><img src="images/mix.png" width="285" height="255"></p>
	<div class="container">
		<div class="loginform_cont">
			<form id="login_form" enctype="multipart/form-data" method="post"><!-- action="#one"> -->
				<input type="button" value="log in or continue (if logged in)" onclick="loginUser()" />
			</form>
		</div>
	</div>	
	
	</div> <!-- end content -->


</div>
<!-- end of login page -->






<script>

  // Load the SDK's source Asynchronously
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>


<!-- Start of first page: #one -->
<div data-role="page" id="one">
	<div data-role="header">
		<h1>Trail Mix</h1>
<a href="#Help" data-role="button" class="ui-btn-right" data-rel="dialog">?</a>	
	</div><!-- /header -->

	<div data-role="content">	

		<div id="user-info"></div>
		<p><a href="#popup" data-role="button" data-icon="plus" data-iconpos="bottom" button-color="red">Create an Album</a></p>
		<br/><br/><br/><br/>
		<p><a href="#Home" data-role="button">My Albums</a></p>
		<!--<p><a href="#settings" data-role="button">Settings</a></p>-->
		<p><a href="#invitations" data-role="button">Album Invitations</a></p>			
<!--		<p><a href="#popup" data-role="button" data-rel="dialog" data-transition="pop">Show page "popup" (as a dialog)</a></p>
	</div><!-- /content --> 
	
</div>
	
</div><!-- /page one -->

<!-- Start of second page: #two -->
<div data-role="page" id="myAlbums" data-add-back-btn="true">

	<div data-role="header">
		<h1>My Albums</h1>
	</div><!-- /header -->

</div><!-- /page two -->


<!-- Start of Help page-->
<div data-role="page" id="Help" data-rel="dialog" >

	<div data-role="header">
		<h1>Help</h1>
		<!--<a href ="#Album" data-role="button" data-icon="plus" class="ui-btn-right" >Add</a>-->
	</div><!-- /header -->

	<div data-role="content">	
		<h4>Welcome to Trail Mix.  Trail Mix allows you to instantly and automatically share photos with groups of friends.  Simply create an album, invite you friends to join the album, and take or upload a photo to the album.  Login with Facebook to get started! </h4>
	</div><!-- /content -->
	

</div><!-- end Help-->


<!-- Start of Album Gallery page-->
<div data-role="page" id="Albumgallery" data-add-back-btn="true" class="gallery-page">
	<div data-role="header" >
		<h1 id="galleryHeader">Album Gallery</h1> 
		<a href ="#addPhoto" data-role="button" data-icon="plus" class="ui-btn-right" >New Photo</a>
	</div><!-- /header -->
	<div data-role="content" id="galleryContent">
		
		<ul class="gallery">

      <?php
			include('config.php');
			$picquery = "SELECT * from Gallery";
			$picresult = mysql_query($picquery);
			while($bro = mysql_fetch_assoc($picresult)) {
				$path = "uploads/".$bro['PhotoPath'];
				echo "<li><a href='$path' rel='external'><img width='91' height='131' src='$path'/></a></li>";	
			}
		
		?>	

				
			
		</ul>
		
	
	
	</div><!-- /content -->

</div><!-- end Album Gallery-->


<!-- Start of Album Gallery page-->
<div data-role="page" id="Albumgallery2" class="gallery-page">
	<div data-role="header" >
		<h1 id="galleryHeader">Album Gallery</h1> 
		<a href ="#addPhoto" data-role="button" data-icon="arrow-l" class="ui-btn-left" >Back</a>
	</div><!-- /header -->
	<div data-role="content" id="galleryContent">
		
		<ul class="gallery">

      <?php
			include('config.php');
			$picquery = "SELECT * from Gallery";
			$picresult = mysql_query($picquery);
			while($bro = mysql_fetch_assoc($picresult)) {
				$path = "uploads/".$bro['PhotoPath'];
				echo "<li><a href='$path' rel='external'><img width='91' height='131' src='$path'/></a></li>";	
			}
		
		?>	

				
			
		</ul>
		
	
	
	</div><!-- /content -->

</div><!-- end Album Gallery-->


<!-- confirm event leaving popup-->
<div data-role="page" id="confirmAlbumLeave">

	<div data-role="header">
		<h1>confirmation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Are you sure you want to stop contributing to this album?</h2>
		<a href="#Home" data-role="button" data-theme="d" data-pos="right">Yes, stop contributing</a>
		<a href="#invitations" data-role="button" data-theme="d" data-pos="right" data-rel="back">Let me reconsider</a>		
	</div><!-- /content -->

</div><!-- end event leaving confirm popup-->


<!-- Settings page-->
<div data-role="page" id="settings" data-add-back-btn="true">

	

	<div data-role="header">
		<h1>Settings</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Settings</h2>
		<p>Edit your settings here</p>	

		
	</div><!-- /content -->

</div>
</div><!-- end Settings page-->

<!-- Invite page-->
<div data-role="page" id="invitations" data-add-back-btn="true">

	<div data-role="header">
		<h1>Album Invation</h1>
	</div><!-- /header -->



	<div data-role="content">	
		<p>Jamin has invited you to</p>	
		<h2>Danny's Birthday Dinner</h2>
		<a href="enter.php/#Album" data-role="button" data-theme="b" data-icon="check" data-pos="right">Join Album</a>
		<a href="#confirmEventDecline" data-role="button" data-theme="d" data-icon="delete" data-pos="right" data-rel="dialog">Decline Invite</a>		
	</div><!-- /content -->
</div>
</div><!-- end Invite page-->

<!-- confirm event decline popup-->
<div data-role="page" id="confirmEventDecline">

	<div data-role="header">
		<h1>confirmation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Are you sure you want to decline the invite?</h2>
		<a href="#Home" data-role="button" data-theme="d" data-pos="right">Yes, Decline</a>
		<a href="#invitations" data-role="button" data-theme="d" data-pos="right" data-rel="back">Let me reconsider</a>		
	</div><!-- /content -->
</div>
</div><!-- end event decline confirm popup-->



<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="a" data-add-back-btn="true">
			<a href ="#Home" data-role="button" data-icon="arrow-l" class="ui-btn-left" >Back</a>

		<h1>Create an Album</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Create an Album</h2>
		<!--Will need to change action to process data!! with method = post-->
		<form id="createalbum_form" enctype="multipart/form-data" method="post" action="createAlbum.php">
			<label for="album">Album Name:</label>
			<input type="text" name="album" id="album">
			<p><a href="#friendListTest" data-role="button" data-icon="plus">Add Friends</a></p>
			
			<div id="friendsChosen"></div>
			
			<!--
			<label for="friend">Add Friend:</label>
			<input type="text" name="friend" id="friend">
			took out type="submit"
			-->
			
	        <input type="submit" data-theme="b" value="Create Album" onClick="createAlbum()">
			</form>	
				
		<!--<a href="#Album" data-role="button" data-theme="b">Create Album</a>	-->
	</div><!-- /content -->
</div><!-- /page popup -->

<script>
	function createAlbum() {
		var str = document.forms['createalbum_form']['album'].value;
		
		
		
		//var str = <?php echo $albumName; ?>;
		//var str = '<h1><?php echo $albumName ?></h1>';
		
		$("#albumHeader").html(str);
		document.forms['upload_form'].elements['albumname'].value = str;
		window.location = "#addPhoto";
	}

</script>


<!--Friends List Test start -->
<div data-role="page" id="friendListTest" data-add-back-btn="true">

	<div data-role="header"">
		<h1>Select Friends</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">
	<p class="friend"></p>
	
	<div id="fb-root"></div>
		
<div data-role="fieldcontain" class='friendList'>

</div>
 <input type="submit" data-theme="b" value="Done" onClick="chooseFriends(this.form)">


	</div><!-- /content -->


</div><!-- Friends List Test ends here -->





<script>
    (function() {
      var e = document.createElement('script'); e.async = true;
          e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
          document.getElementById('fb-root').appendChild(e);
          }());
  </script>
	<script>
window.fbAsyncInit = function() {
      FB.init({ appId: '448021921920652', 
      status: true, 
      cookie: true,
      xfbml: true,
      oauth: true});

    FB.Event.subscribe('auth.statusChange', handleStatusChange);	
};
	</script>
	<script>
	function handleStatusChange(response) {
     document.body.className = response.authResponse ? 'connected' : 'not_connected';
    
     if (response.authResponse) {
       console.log(response);
       updateUserInfo(response);
     }
}
</script>


<!-- Facebook scripts here -->

<script type="text/javascript">
function uploadButton() {
	$('#image_file').trigger('click');
	
	var form = document.forms['upload_form'];
	
	<?php
		include('config.php');
		$countquery = 'SELECT * FROM Gallery';
		$countresult = mysql_query($countquery);
		$rows = mysql_num_rows($countresult) + 1;
		
	?>
	
	
	
	console.log(form);
}


function loginUser() {
   FB.login(function(response) {
   	if (response.authResponse) {
   		window.location ="#Home";}
   		else {
   			alert ("Your login attempt failed. Please double check your username and password and try again.")
   		}
   			
   	 }, {scope:'email'});
   	       var apiQuery = {
   method: 'fql.query',
   query: 'SELECT uid, name FROM user WHERE uid IN (SELECT uid1 FROM friend WHERE uid2 = me() ) AND is_app_user'
};  
	console.log("here");
	FB.api(apiQuery, function(response) { 
		console.log(response)
		var friendString = '';
		for(var i = 0; i<response.length; i++) {
			friendString += '<fieldset data-role="controlgroup"> <input type="checkbox" name=checkbox-'+i.toString()+'" id="checkbox-' + i.toString() + '" class="custom" /> <label for="checkbox-' + i.toString() + '">' + response[i].name + '</label> </fieldset>';
		}
		$(".friendList").html(friendString);
    		
	 });  	
 }
 



    function updateUserInfo(response) {
      FB.api('/me', function(response) {
        document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;
        console.log(response);
      });
      
    }

function chooseFriends(friends) {
	//document.getElementById("friendsChosen").innerHtml = friends.elements[0];
	window.location ="#popup";
}
   
</script>

<!-- HERE is a page for the current album -->







<!-- EVERYTHING BELOW HERE IS FOR THE MYalbum and Galleries -->

<div data-role="page" id="Home" data-add-back-btn="true">

	<div data-role="header">
		<h1>My Albums</h1>
		
		<a href ="#popup" data-role="button" data-icon="plus" class="ui-btn-right" >New Album</a>
		<!-- <a href="" data-role="button" class="ui-btn-left" rel="external">back</a> -->
	</div>
	
	<div data-role="content" >	


		<!--	
		<ul data-role="listview" data-inset="true">
			<li><a href="#Albumgallery" onClick="populateGallery()">
					<?php
		include("config.php");
		$query = "select distinct AlbumName from Albums where Friends = 'Jamin'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)) {
			echo "<p>".$row["AlbumName"]."</p>";	
		}
		?>
			</a></li> 
			<li><a href="#Albumgallery">
			
		<?php
		include("config.php");
		$query = "select AlbumName from Albums where Friends = 'Danny'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)) {
			echo "<p>".$row["AlbumName"]."</p>";	
		}
		?>

			</a></li> 
		</ul> 
		-->
		<ul data-role="listview"  data-inset="true">
		
		<?php
		include("config.php");
		$query = "select * from Albums";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)) {
			$current = 'no name';
			if($row["AlbumName"] != null) {
				$current = $row["AlbumName"];
			}
			echo "<li><a href='#Albumgallery' onClick='populateGallery(\"$current\")'>".$row["AlbumName"]."</a></li>";	
		}
		?>
		
		
		</ul>
		
	</div>


</div>

<script>
function populateGallery(name) {
	$('#galleryHeader').html(name);
	console.log("I am testing like a champ");

}
</script>





	<script type="text/javascript">
		
		/*
		 * IMPORTANT!!!
		 * REMEMBER TO ADD  rel="external"  to your anchor tags. 
		 * If you don't this will mess with how jQuery Mobile works
		 */
		
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
		
	</script>
	
	<div data-role="page" id="addPhoto" data-add-back-btn="true">

	<!-- Header in PHP -->
	<div data-role='header'>
		<h1 id='albumHeader'></h1>
	</div>
	<div data-role="content">
				
				
	<!--Camera access -->	
		<div class="container">
            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                    	<input class="picButton" type="button" value="Take or Upload a Pic!" onclick="uploadButton()" />
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
                        <br>
                        <br>
                         <br>
                        <br>
                         <br>
                        <br>
                        <div id="upload_response"></div>
                    </div>
                      <div>
                        <input type="button" value="Upload" onclick="startUploading()"/>
                    </div>
                </form>
                <img id="preview" />
            </div> <!-- close upload_form_cont -->
        </div>	
		<!-- end camera access-->	
	</div><!-- /content -->
	<style>
	input.picButton {
    background-image: url(camerabutton.png);  
    background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;        
     height: 100px; 
    
    vertical-align: middle;
    padding-bottom:10px; 
}		
	</style>
	
</div><!-- end Album page-->
</body>
</html>