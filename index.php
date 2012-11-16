

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
	
	<script>
		function load() {
			console.log("name is " + localStorage.getItem('username'));
			//console.log(localStorage.getItem('friends'));
			//console.log("friendlist: " + localStorage.getItem('friends'));
			$(".friendList").html(localStorage.getItem('friends'));
			$(".numFriends").html(localStorage.getItem('numFriends'));
		}
	</script>
</head> 
<body onload="load()";>




<div id="fb-root"></div>



<div data-role="page" id="Home" data-add-back-btn="true">

	<div data-role="header">
		<h1>My Albums</h1>
		
		<a href ="#popup" data-role="button" data-icon="plus" class="ui-btn-right" >New Album</a>
		<!-- <a href="" data-role="button" class="ui-btn-left" rel="external">back</a> -->
	</div>
	
	<div data-role="content" >	

		<ul data-role="listview"  data-inset="true">
		
		<?php
		include("config.php");
		$user = $_POST["username"];
		$query = "select distinct * from Album where UserName like '%$user%'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)) {
			$current = '';
			if($row["AlbumName"] != null) {
				$current = $row["AlbumName"];
			}
			echo "<li><a onClick='openGallery(\"$current\")'>".$row["AlbumName"]."</a></li>";	
		}
		?>
		<!-- href albumgallery -->
		
		</ul>
		
	</div>


</div>







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
		<!-- took out action -->
		<form id="createalbum_form" enctype="multipart/form-data" method="post">
			<label for="album">Album Name:</label>
			<input type="text" name="album" id="album"/>
			<p><a href="#friendListTest" data-role="button" data-icon="plus">Add Friends</a></p>
			
			<div id="numFriendsChosen"></div>
			<div id="friendsChosen"></div>
			<input type="button" data-theme="b" value="Create Album" onclick="createalbum()"/>

			</form>	
				
		<!--<a href="#Album" data-role="button" data-theme="b">Create Album</a>	-->
	</div><!-- /content -->
</div><!-- /page popup -->

<script>
function createalbum() {
	//$('#galleryHeader').html(name);
	console.log("I am testing like a champ");
	var myform = document.forms['createalbum_form'];
	myform.action = "albumgallery.php";
	myinput = document.createElement("input");
	myinput.setAttribute("name", "myName");
	myinput.setAttribute("value", localStorage.getItem("username"));
	myform.appendChild(myinput);
	console.log(myform);
	myform.submit();
	
	

}
</script>

<!--
<script>
	function createAlbum() {
		var str = document.forms['createalbum_form']['album'].value;
		
		$("#albumHeader").html(str);
		document.forms['upload_form'].elements['albumname'].value = str;
		//window.location = "#addPhoto";
	}

</script>
-->

<!--Friends List Test start -->
<div data-role="page" id="friendListTest" data-add-back-btn="true">

	<div data-role="header"">
		<h1>Select Friends</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">
		<p class="numFriends"></p>
		<div data-role="fieldcontain" class='friendList'> </div>
		<input type="button" data-theme="b" value="Done" onClick="chooseFriends()">

	</div><!-- /content -->


</div><!-- Friends List Test ends here -->





<script>
    (function() {
      var e = document.createElement('script'); e.async = true;
          e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
          document.getElementById('fb-root').appendChild(e);
          }());
</script>



<!-- Facebook scripts here -->

<script type="text/javascript">




function chooseFriends() {
	var numtext = $(".numFriends").text();
	var num = parseInt(numtext);
	var numChosen=0;
	var str = '';
	for(var i = 0; i < num; i++) {
		var boxid = 'checkbox-' + i.toString();
		if($('#'+boxid).attr('checked')) {
			var name = $("label[for="+boxid+"]").text();
			console.log(name);
			str = str + '<input type="text" name="friend'+numChosen.toString()+'" value="'+name+'" />';
			numChosen = numChosen + 1;
		}
	}
	$("#friendsChosen").html(str);
	$("#numFriendsChosen").html('<input type="text" name="numFriends" value="'+numChosen.toString()+'" />');
	// should add these friends to the form
	//document.getElementById("friendsChosen").innerHtml = friends.elements[0];
	window.location ="#popup";
}
   
</script>

<!-- HERE is a page for the current album -->







<!-- EVERYTHING BELOW HERE IS FOR THE MYalbum and Galleries -->


<script>
function openGallery(name) {
	//$('#galleryHeader').html(name);
	var myform = document.createElement("form");
	myform.method = "post";
	myform.action = "albumgallery.php";
	myinput = document.createElement("input");
	myinput.setAttribute("name", "album");
	myinput.setAttribute("value", name);
	myform.appendChild(myinput);
	console.log("name is " + name);
	document.body.appendChild(myform);
	myform.submit();
	
	console.log("I am testing like a champ");

}
function gohome() {
		window.location = "index.php#Home";
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