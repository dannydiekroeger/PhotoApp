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

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="images/trailmixicon.jpg" />
	<link rel="apple-touch-startup-image" href="images/background.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body>
<!--
<div id="fb-root"></div>
		<div id="login">
     		<p><button onClick="loginUser();">Login</button></p>
  		</div>
   		<div id="logout">
     	<div id="user-info"></div>
     		<p><button  onClick="FB.logout();">Logout</button></p>
   		</div>
-->
<!-- This style is for Facebook login/logout stuff -->
<style>
    body.connected #login { display: none; }
    body.connected #logout { display: block; }
    body.not_connected #login { display: block; }
    body.not_connected #logout { display: none; }
</style>
 
 

<!-- Start of first page: #one -->
<div data-role="page" id="one">
	<div data-role="header">
		<h1>Trail Mix</h1>
<a href="#Help" data-role="button" class="ui-btn-right" data-rel="dialog">?</a>	
	</div><!-- /header -->

	<div data-role="content">	


		<p><a href="#popup" data-role="button" data-icon="plus" data-iconpos="bottom" button-color="red">Create an Album</a></p>
		<br/><br/><br/><br/>
		<p><a href="#myAlbums" data-role="button">My Albums</a></p>
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

	<div data-role="content">	
		<p>Here will be a list of all your Albums</p>
		<ul data-role="listview"  data-inset="true">
		
		<?php
		include("config.php");
		$query = "select * from Albums";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)) {
			echo "<p>".$row["Album Name"]."with ".$row["Friends"]."</p>";	
		}
		?>
		</ul>
		
		<!--
		<ul data-role="listview"  data-inset="true">
			<li>
			<a href="#Albumgallery"><img src="images/WaterColor.Sunset.JPG" alt="Pic" class="ui-li-thumbnail">Florida Vacation</a>
			</li>
			<li>
			<a href="#Albumgallery"><img src="images/mom.JPG" alt="mom" class="ui-li-thumbnail">Baseball Game</a>
			</li>
			<li>
			<a href="#Albumgallery"><img src="images/obama.jpeg" alt="obamapic" class="ui-li-thumbnail">Dinner with Barack</a>
			</li>
			<li>
			<a href="#Albumgallery"><img src="images/romney.png" alt="romneypic" class="ui-li-thumbnail">Lunch with Mitt</a>
			</li>
		
		</ul>
		-->

	</div><!-- /content -->

</div>
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
<div data-role="page" id="Albumgallery" data-add-back-btn="true">



		
	<div data-role="header" id="galleryHeader">
		<script type="text/javascript">
			document.getElementById("galleryHeader").innerHTML = "<h1>" + localStorage.getItem('album') + "</h1>";
		</script>
	
	
		<!--<a href ="#Album" data-role="button" data-icon="plus" class="ui-btn-right" >Add</a>-->
	</div><!-- /header -->

	<div data-role="content">	
		<div class="ui-grid-b">
			<div class="ui-block-a"> <img width="91" height="131" src="images/obama.jpeg"> </div>
			<div class="ui-block-b"> <img width="91" height="131" src="images/obama.jpeg"> </div>
			<div class="ui-block-c"> <img width="91" height="131" src="images/obama.jpeg"> </div>
			<div class="ui-block-a"> <img width="91" height="131" src="images/romney.png"> </div>
			<div class="ui-block-b"> <img width="91" height="131" src="images/romney.png"> </div>
			<div class="ui-block-c"> <img width="91" height="131" src="images/romney.png"> </div>
			<div class="ui-block-a"> <img width="91" height="131" src="images/obama.jpeg"> </div>
			<div class="ui-block-b"> <img width="91" height="131" src="images/obama.jpeg"> </div>
			<div class="ui-block-c"> <img width="91" height="131" src="images/obama.jpeg"> </div>
		</div>
		
	</div><!-- /content -->

</div><!-- end Album Gallery-->


<!-- confirm event leaving popup-->
<div data-role="page" id="confirmAlbumLeave">

	<div data-role="header">
		<h1>confirmation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Are you sure you want to stop contributing to this album?</h2>
		<a href="#one" data-role="button" data-theme="d" data-pos="right">Yes, stop contributing</a>
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
		<a href="#one" data-role="button" data-theme="d" data-pos="right">Yes, Decline</a>
		<a href="#invitations" data-role="button" data-theme="d" data-pos="right" data-rel="back">Let me reconsider</a>		
	</div><!-- /content -->
</div>
</div><!-- end event decline confirm popup-->



<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Create an Album</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Create an Album</h2>
		<!--Will need to change action to process data!! with method = post-->
		<form id="createalbum_form" enctype="multipart/form-data" method="post" action="enter.php">
			<label for="album">Album Name:</label>
			<input type="text" name="album" id="album">
			<label for="friend">Add Friend:</label>
			<input type="text" name="friend" id="friend">
	        <input type="submit" data-theme="b" value="Create Album">
			</form>	
		<!--<a href="#Album" data-role="button" data-theme="b">Create Album</a>	-->
		<p><a href="#one" data-role="button" data-icon="minus">Cancel</a></p>	
	</div><!-- /content -->

</div>
</div><!-- /page popup -->

<!-- Facebook scripts here -->

<script type="text/javascript">


function uploadButton() {
	$('#image_file').trigger('click');
	startUploading();
}

function loginUser() {    
   FB.login(function(response) { }, {scope:'email'});  	
 }
 
function handleStatusChange(response) {
     document.body.className = response.authResponse ? 'connected' : 'not_connected';
    
     if (response.authResponse) {
       console.log(response);
       updateUserInfo(response);
     }
}

    window.fbAsyncInit = function() {
      FB.init({ appId: '448021921920652', 
      status: true, 
      cookie: true,
      xfbml: true,
      oauth: true});
 
      FB.Event.subscribe('auth.statusChange', handleStatusChange);	
    };

    function updateUserInfo(response) {
      FB.api('/me', function(response) {
        document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;
      });
    }

    (function() {
      var e = document.createElement('script'); e.async = true;
          e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
          document.getElementById('fb-root').appendChild(e);
          }());
// This handles all the swiping between each page. You really
// needn't understand it all.
/*



$(document).on('pageshow', 'div:jqmData(role="page")', function(){

     var page = $(this), nextpage, prevpage;
     // check if the page being shown already has a binding
      if ( page.jqmData('bound') != true ){
            // if not, set blocker
            page.jqmData('bound', true)
            // bind
                .on('swipeleft.paginate', function() {
                    console.log("binding to swipe-left on "+page.attr('id'));
                    nextpage = page.next('div[data-role="page"]');
                    if (nextpage.length > 0) {
                       $.mobile.changePage(nextpage,{transition: "slide"}, false, true);
                        }
                    })
                .on('swiperight.paginate', function(){
                    console.log("binding to swipe-right "+page.attr('id'));
                    prevpage = page.prev('div[data-role="page"]');
                    if (prevpage.length > 0) {
                        $.mobile.changePage(prevpage, {transition: "slide",
	reverse: true}, true, true);
                        };
                     });
            }
        });
*/
</script>

</body>
</html>