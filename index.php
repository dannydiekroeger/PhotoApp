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
	<link rel="apple-touch-startup-image" href="images/backsmall.png">
	
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

		<p><a href="#popup" data-role="button" data-icon="plus" data-iconpos="bottom" button-color="red">Create an Event</a></p>
		<br/><br/><br/><br/>
		<p><a href="#myevents" data-role="button">My Events</a></p>
		<p><a href="#settings" data-role="button">Settings</a></p>
		<p><a href="#invitations" data-role="button">Event Invitations</a></p>			
<!--		<p><a href="#popup" data-role="button" data-rel="dialog" data-transition="pop">Show page "popup" (as a dialog)</a></p>
	</div><!-- /content --> 
	
</div>
	
</div><!-- /page one -->

<!-- Start of second page: #two -->
<div data-role="page" id="myevents" data-add-back-btn="true">

	<div data-role="header">
		<h1>My Events</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<p>Here will be a list of all your events</p>
		<ul data-role="listview"  data-inset="true">
		<img src="icons/buy.png" alt="Buy" class="ui-li-icon">
			<li>
			<a href="#eventgallery"><img src="images/WaterColor.Sunset.JPG" alt="Pic" class="ui-li-thumbnail">Florida Vacation</a>
			</li>
			<li>
			<a href="#eventgallery"><img src="images/mom.JPG" alt="mom" class="ui-li-thumbnail">Baseball Game</a>
			</li>
			<li>
			<a href="#eventgallery"><img src="images/obama.jpeg" alt="obamapic" class="ui-li-thumbnail">Dinner with Barack</a>
			</li>
			<li>
			<a href="#eventgallery"><img src="images/romney.png" alt="romneypic" class="ui-li-thumbnail">Lunch with Mitt</a>
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
		<h1>Event Invation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<p>Jamin has invited you to</p>	
		<h2>Danny's Birthday Dinner</h2>
		<a href="#event" data-role="button" data-theme="b" data-icon="check" data-pos="right">Join Event</a>
		<a href="#confirm" data-role="button" data-theme="d" data-icon="delete" data-pos="right" data-rel="dialog">Decline Invite</a>		
	</div><!-- /content -->
</div>
</div><!-- end Invite page-->

<!-- confirm popup-->
<div data-role="page" id="confirm">

	<div data-role="header">
		<h1>confirmation</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Are you sure you want to decline the invite?</h2>
		<a href="#one" data-role="button" data-theme="d" data-pos="right">Yes, Decline</a>
		<a href="#invitations" data-role="button" data-theme="d" data-pos="right">Let me reconsider</a>		
	</div><!-- /content -->
</div>
</div><!-- end confirm popup-->

<!-- Event page-->
<div data-role="page" id="event">

	<div data-role="header">
		<h1>EventName</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Sample Event</h2>
		<p>This is a sample event</p>	
		<img src="images/takephotobutton.png"></img>
		<a data-role="button" data-theme="b" data-icon="star" data-pos="right">Take Picture</a>	
		
		<a href="#eventgallery" data-role="button" data-theme="b">Event Gallery</a>	
		
		<p><a href="#one" data-direction="reverse" data-role="button">Leave Event</a></p>	
		
	</div><!-- /content -->

</div>
</div><!-- end Event page-->


<!-- Start of Event Gallery page-->
<div data-role="page" id="eventgallery" data-add-back-btn="true">

	<div data-role="header">
		<h1>Event Gallery</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<h2>Event Gallery</h2>
		<p>Here are all the pictures you have taken for this event!</p>	
		
	</div><!-- /content -->

</div>
</div><!-- end Even Gallery-->


<!-- Start of third page: #popup -->
<div data-role="page" id="popup">

	<div data-role="header" data-theme="e">
		<h1>Create an Event</h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="d">	
		<h2>Create an Event</h2>
		<!--Will need to change action to process data!! with method = post-->
		<form action="#event">
			<label for="foo">Event Name:</label>
			<input type="text" name="username" id="foo">
			<label for="bar">Add Friend:</label>
			<input type="text" name="friend" id="bar">
	        <!--<input type="submit" data-theme="b" value="Create Event"> -->
			</form>	
		<a href="#event" data-role="button" data-theme="b">Create Event</a>	
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