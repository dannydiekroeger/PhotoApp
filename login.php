

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
			<form id="login_form" enctype="multipart/form-data" method="post">
				<div id="usernameid"></div>
				<input type="button" value="log in or continue (if logged in)" onclick="login()" />
			</form>
		</div>
	</div>	
	
	</div> <!-- end content -->


</div>
<!-- end of login page -->

<script>
function login() {
	//$('#galleryHeader').html(name);
	
	loginUser();


}

function continueLogin() {
	var myform = document.createElement("form");
	myform.method = "post";
	myform.action = "index.php";
	myinput = document.createElement("input");
	myinput.setAttribute("name", "username");
	myinput.setAttribute("value", localStorage.getItem('username'));
	myform.appendChild(myinput);
	document.body.appendChild(myform);
	myform.submit();
	
	console.log("I am testing like a champ");
}
</script>




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
	       console.log("response is: " + response);
	       //loginUser();
	       updateUserInfo(response);
	       //window.location ="index.php";
	     }
	}
</script>


<!-- Facebook scripts here -->

<script type="text/javascript">

	
function loginUser() {
	   FB.login(function(response) {
	   	if (response.authResponse) {
	   		getFriendInfo();
	   		//window.location ="index.php";
	   }
	   	else {
	   			alert ("Your login attempt failed. Please double check your username and password and try again.")
	   	}
	   			
	 }, {scope:'email'}); 	
}

function getFriendInfo() {
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
	    	localStorage.setItem('friends', friendString);
			localStorage.setItem('numFriends', response.length);
			continueLogin(); 
	});
}
 



    function updateUserInfo(response) {
      FB.api('/me', function(response) {
        //document.getElementById('user-info').innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;
        console.log(response);
        //var str = '<input type="text" style="display:none" name="myName" value="'+response.name+'" />';
        //$("#myName").html(str);
        localStorage.setItem('username', response.name);
        $("#usernameid").html('<input type="text" style="display:none" name="username" value="'+response.name+'" />');
        
      });
      
    }
   
</script>
	
</body>
</html>