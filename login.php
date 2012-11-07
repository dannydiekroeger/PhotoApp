<!DOCTYPE html> 
<html>

<head>
	<title>Trail Mix Login</title> 
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
			<form id="login_form" enctype="multipart/form-data" method="post" action="#one">
				<input type="button" value="log in or continue (if logged in)" onclick="loginUser()" />
			</form>
		</div>
	</div>	

<!--		<p><a href="#popup" data-role="button" data-rel="dialog" data-transition="pop">Show page "popup" (as a dialog)</a></p>
	</div><!-- /content --> 
	
	</div>


</div>  


<!--
<div data-role="page">

	<div data-role="header">
	<h1>Log in</h1>
	<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->
<!--
	<div data-role="content">
	
	<p>The form should go here</p>
		<div data-role="fieldcontain">
			<form action="enter.php" method="post">
			<label for="foo">Event Name:</label>
			<input type="text" name="username" id="foo">
			<label for="bar">Add Friend:</label> #this will become a list menu of facebook friends
			<input type="password" name="password" id="bar">
	        <input type="submit" value="Login">
			</form>	
		</div>	
	
		
	<div id="info">
		<p>Thank you for logging. You should be able to see all sorts of user information here.</p>
	</div>	
	</div><!-- /content -->

	<script type="text/javascript">
	$("#logout").hide();
	$("#info").hide();
	var retrievedObject = localStorage.getItem('username');
	if (retrievedObject == "test") {
		$("#form").hide();	
		$("#logout").show();
		$("#info").show();
	}
	$("#logout").click(function() {
		localStorage.removeItem('username');
		$("#form").show();
		$("#logout").hide();
		$("#info").hide();
	});

function uploadButton() {
	$('#image_file').trigger('click');
	startUploading();
}

function loginUser() {
   FB.login(function(response) {
   	if (response.authResponse) {
   		window.location ="index.php";}
   		else {
   			alert ("Your login attempt failed. Please double check your username and password and try again.")
   		}
   			
   	 }, {scope:'email'});  	
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
</div><!-- /page -->


</body>
</html>