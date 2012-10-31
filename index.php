<!DOCTYPE html> 
<html>
<!-- cboskii baby!! Jamin-->

<head>
	<title>Trail Mix</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="images/trailmixicon.jpg" />
	<link rel="apple-touch-startup-image" href="images/background.png"/>
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 

	
<body> 

<!-- Start of first page: #one -->
<div data-role="page" id="one">

	<div data-role="header">
		<h1>Trail Mix</h1>
	</div><!-- /header -->

	<div data-role="content">	

		<p><a href="#popup" data-role="button" data-icon="plus" data-iconpos="bottom" button-color="red">Create an Album</a></p>
		<br/><br/><br/><br/>
		<p><a href="#myAlbums" data-role="button">My Albums</a></p>
		<p><a href="#settings" data-role="button">Settings</a></p>
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

	</div><!-- /content -->

</div>
</div><!-- /page two -->

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
		<a href="#Album" data-role="button" data-theme="b" data-icon="check" data-pos="right">Join Album</a>
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

<!-- confirm event leaving popup-->
<div data-role="page" id="confirmAlbumbLeave">

	<div data-role="header">
		<h1>confirmation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Are you sure you want to stop contributing to this album?</h2>
		<a href="#one" data-role="button" data-theme="d" data-pos="right">Yes, stop contributing</a>
		<a href="#invitations" data-role="button" data-theme="d" data-pos="right" data-rel="back">Let me reconsider</a>		
	</div><!-- /content -->
</div>
</div><!-- end event leaving confirm popup-->

<!-- Album page-->
<div data-role="page" id="Album">

	<div data-role="header">
		<h1>Album Name</h1>
	</div><!-- /header -->

	<div data-role="content">			
	<!--Camera access -->	
		<div class="container">
            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                        <div><h2 for="image_file">Take or Upload a Photo!</h2>
                        <h5> Press "Choose File" to take/upload a photo
                         and then press "Add Photo to Album"</h5>
                        </div>
                        
                        </br>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                    </div>
                    <div>
                    </br>
                        <input type="button" value="Add Photo to Album" onclick="startUploading()" />
                    </div>
                    </br></br>
<a href="#Albumgallery" data-role="button" data-theme="d">Album Gallery</a>	
           	<p><a href="#confirmAlbumbLeave" data-role="button" data-theme="d" data-icon="delete" data-pos="right" data-rel="dialog">Stop Contributing to Album</a></p>	
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
</div>
</div><!-- end Album page-->


<!-- Start of Album Gallery page-->
<div data-role="page" id="Albumgallery" data-add-back-btn="true">

	<div data-role="header">
		<h1>Album Gallery</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Album Gallery</h2>
		<div class="ui-grid-b">
			<div class="ui-block-a"> <img src="images/obama.jpeg"> </div>
			<div class="ui-block-b"> <img src="images/obama.jpeg"> </div>
			<div class="ui-block-c"> <img src="images/obama.jpeg"> </div>
			<div class="ui-block-a"> <img src="images/romney.png"> </div>
			<div class="ui-block-b"> <img src="images/romney.png"> </div>
			<div class="ui-block-c"> <img src="images/romney.png"> </div>
			<div class="ui-block-a"> <img src="images/obama.jpeg"> </div>
			<div class="ui-block-b"> <img src="images/obama.jpeg"> </div>
			<div class="ui-block-c"> <img src="images/obama.jpeg"> </div>
		</div>
		
	</div><!-- /content -->

</div>
</div><!-- end Album Gallery-->


<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Create an Album</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Create an Album</h2>
		<!--Will need to change action to process data!! with method = post-->
		<form action="#Album">
			<label for="foo">Album Name:</label>
			<input type="text" name="username" id="foo">
			<label for="bar">Add Friend:</label>
			<input type="text" name="friend" id="bar">
	        <!--<input type="submit" data-theme="b" value="Create Album"> -->
			</form>	
		<a href="#Album" data-role="button" data-theme="b">Create Album</a>	
		<p><a href="#one" data-role="button" data-icon="minus">Cancel</a></p>	
	</div><!-- /content -->

</div>
</div><!-- /page popup -->

<script type="text/javascript">
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