<!DOCTYPE html>
<html>
<head>
	<title>My Albums</title>
	<meta name="author" content="Ste Brennan - Code Computerlove - http://www.codecomputerlove.com/" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<link href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" rel="stylesheet" />
	<link href="jquery-mobile.css" type="text/css" rel="stylesheet" />
	<link href="../photoswipe.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="../lib/klass.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
	<script type="text/javascript" src="../code.photoswipe.jquery-3.0.5.min.js"></script>
	
	
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
	
</head>
<body>

<div data-role="page" id="Home">

	<div data-role="header">
		<h1>My Albums</h1>
		<a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/index.php" data-role="button" class="ui-btn-left" rel="external">back</a>
	</div>
	
	
	<div data-role="content" >	
			
		<ul data-role="listview" data-inset="true">
			<li><a href="#Gallery1">Danny's Rager</a></li> 
			<li><a href="#Gallery2">Church with Jamin</a></li> 
		</ul> 
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
		
	</div>


</div>


<div data-role="page" data-add-back-btn="true" id="Gallery1" class="gallery-page">

	<div data-role="header">
		<h1>Danny's Rager</h1>
	</div>

	<div data-role="content">	
		
		<ul class="gallery">
				
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 01"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 02"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" alt="Image 03"/></a></li>
		
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" alt="Image 04"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" alt="Image 05"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" alt="Image 06"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/romney.png" alt="Image 07"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test4.jpeg" alt="Image 08"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 09"/></a></li>
		</ul>
		
	</div>
	
</div>

<div data-role="page" data-add-back-btn="true" id="Gallery2" class="gallery-page">

	<div data-role="header">
		<h1>Church With Jamin</h1>
	</div>

	<div data-role="content">	
		
		<ul class="gallery">
		
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" alt="Image 01"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" alt="Image 02"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 03"/></a></li>
		
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" alt="Image 04"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 05"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" alt="Image 06"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/obama.jpeg" alt="Image 07"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test2.jpeg" alt="Image 08"/></a></li>
			<li><a href="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" rel="external"><img width="91" height="131" src="http://stanford.edu/~connorb/cgi-bin/PhotoApp/images/test1.jpeg" alt="Image 09"/></a></li>
			

		
		</ul>
		
	</div>

</div>

</body>
</html>
