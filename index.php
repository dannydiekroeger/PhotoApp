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












<!--
		<div id="login">
     		<p><button onClick="loginUser();">Login</button></p>
  		</div>
   		<div id="logout">
     	
     		<p><button  onClick="FB.logout();">Logout</button></p>
   		</div>
-->
<!-- This style is for Facebook login/logout stuff 
<style>
    body.connected #login { display: none; }
    body.connected #logout { display: block; }
    body.not_connected #login { display: block; }
    body.not_connected #logout { display: none; }
    
</style>
 -->
 

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
		<p><a href="#myAlbums" data-role="button" rel="external">My Albums</a></p>
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
<div data-role="page" id="Albumgallery" data-add-back-btn="true">



		
	<div data-role="header" id="galleryHeader">
		<script type="text/javascript">
			//document.getElementById("galleryHeader").innerHTML = "<h1>" + localStorage.getItem('album') + "</h1>";
			
		</script>
	<h1>Album Gallery</h1>
	
		<!--<a href ="#Album" data-role="button" data-icon="plus" class="ui-btn-right" >Add</a>-->
	</div><!-- /header -->
	<p> Gallery will go here </p>
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
			<p><a href="#friendListTest" data-role="button" data-icon="plus">Add Friends</a></p>
			
			<div id="friendsChosen"></div>
			
			<!--
			<label for="friend">Add Friend:</label>
			<input type="text" name="friend" id="friend">
			-->
	        <input type="submit" data-theme="b" value="Create Album">
			</form>	
				
		<!--<a href="#Album" data-role="button" data-theme="b">Create Album</a>	-->
		<p><a href="#one" data-role="button" data-icon="minus">Cancel</a></p>	
	</div><!-- /content -->
</div><!-- /page popup -->


<!--Friends List Test start -->
<div data-role="page" id="friendListTest" data-add-back-btn="true">

	<div data-role="header"">
		<h1>Select Friends</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">
	<p class="friend"></p>
	
	<div id="fb-root"></div>






	
	


			
<div data-role="fieldcontain" class='friendList'>
<!-- The code here is replaced in the loginUser() function
 	<fieldset data-role="controlgroup">
		<input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
		<label for="checkbox-1">Danny</label>
    </fieldset>
     	<fieldset data-role="controlgroup">
		<input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
		<label for="checkbox-1">Jamin</label>
    </fieldset>
     	<fieldset data-role="controlgroup">
		<input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
		<label for="checkbox-1">Connor</label>
    </fieldset>
     	<fieldset data-role="controlgroup">
		<input type="checkbox" name="checkbox-1" id="checkbox-1" class="custom" />
		<label for="checkbox-1">Arvind</label>
    </fieldset>
    -->
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
	startUploading();
}


function loginUser() {
   FB.login(function(response) {
   	if (response.authResponse) {
   		window.location ="#one";}
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
		localStorage.setItem('friendArray', response);
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

</body>
</html>