<div data-role="page" id="Albumgallery" data-add-back-btn="true" class="gallery-page">
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
		if($bro == "" and $albumName != "") {
			$query = "INSERT INTO Albums VALUES ('$albumName', 'NULL','NULL', 'NULL')";
			$result = mysql_query($query);
			
			$myname = $_POST["myName"];
			$myq = "insert into Album values('$albumName', '$myname')";
			$myr = mysql_query($myq);
			
			$numFriends = $_POST["numFriends"];
			for($i=0; $i<$numFriends; $i++) {
				$istring = "$i";
				$idname = "friend".$istring;
				$name = $_POST[$idname];
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
			$bro = mysql_fetch_assoc($picresult);
			if($bro == NULL) {
				echo "<img src='nophotosreminderup.png'></img>";
			}
			while($bro) {
				$path = "uploads/".$bro['PhotoPath'];
				echo '<li><a href="'.$path.'" rel="external"><img width="91" height="131" src="'.$path.'" alt="'.$path.'"/></a></li>';
				 $bro = mysql_fetch_assoc($picresult);	
			}
		
		?>	
			
		</ul>
		
	
	
	</div><!-- /content -->

</div><!-- end Album Gallery-->

<style>

img.centerbutton {
	display:block;
	margin-left:auto;
	margin-right:auto;
}

</style>

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
             <input type="text" name="albumname" id="albumname" style="display:none" value=<?php echo '"'.$albumName.'"'; ?>>
             <div><input type="file" name="image_file" id="image_file" onchange="openPopup()" style="display:none"/></div>
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
		//openPopup();
	};
	function openPopup() {
		fileSelected();
		
		window.location = "#popupload";
	}
</script>
		

<script>
// common variables
var iBytesUploaded = 0;
var iBytesTotal = 0;
var iPreviousBytesLoaded = 0;
var iMaxFilesize = 10485760; // 10MBish
var oTimer = 0;
var sResultFileSize = '';

function secondsToTime(secs) { // we will use this function to convert seconds in normal time format
    var hr = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

    if (hr < 10) {hr = "0" + hr; }
    if (min < 10) {min = "0" + min;}
    if (sec < 10) {sec = "0" + sec;}
    if (hr) {hr = "00";}
    return hr + ':' + min + ':' + sec;
};

function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

function fileSelected() {

    // hide different warnings
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';

    // get selected file element
    var oFile = document.getElementById('image_file').files[0];

    // filter for image files
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    if (! rFilter.test(oFile.type)) {
        document.getElementById('error').style.display = 'block';
        return;
    }

    // little test for filesize
    if (oFile.size > iMaxFilesize) {
        document.getElementById('warnsize').style.display = 'block';
        return;
    }

    // get preview element
    var oImage = document.getElementById('preview');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
        oReader.onload = function(e){

        // e.target.result contains the DataURL which we will use as a source of the image
        oImage.src = e.target.result;

        oImage.onload = function () { // binding onload event

            // we are going to display some custom image information here
            sResultFileSize = bytesToSize(oFile.size);
            document.getElementById('fileinfo').style.display = 'block';
            document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
            document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
            document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
            document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
    
}

function startUploading() {
    // cleanup all temp states
    iPreviousBytesLoaded = 0;
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';
    document.getElementById('progress_percent').innerHTML = '';
    var oProgress = document.getElementById('progress');
    oProgress.style.display = 'block';
    oProgress.style.width = '0px';

    // get form data for POSTing
    //var vFD = document.getElementById('upload_f').getFormData(); // for FF3
    var vFD = new FormData(document.getElementById('upload_f')); 

    // create XMLHttpRequest object, adding few event listeners, and POSTing our data
    var oXHR = new XMLHttpRequest();        
    oXHR.upload.addEventListener('progress', uploadProgress, false);
    oXHR.addEventListener('load', uploadFinish, false);
    oXHR.addEventListener('error', uploadError, false);
    oXHR.addEventListener('abort', uploadAbort, false);
    
    var url = 'upload.php';
    
    oXHR.open('POST', url += ((/\?/).test(url) ? "&" : "?") + (new Date()).getTime(), false);
    oXHR.send(vFD);

    // set inner timer
    oTimer = setInterval(doInnerUpdates, 300);
}

function doInnerUpdates() { // we will use this function to display upload speed
    var iCB = iBytesUploaded;
    var iDiff = iCB - iPreviousBytesLoaded;

    // if nothing new loaded - exit
    if (iDiff == 0)
        return;

    iPreviousBytesLoaded = iCB;
    iDiff = iDiff * 2;
    var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    var secondsRemaining = iBytesRem / iDiff;

    // update speed info
    var iSpeed = iDiff.toString() + 'B/s';
    if (iDiff > 1024 * 1024) {
        iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
    } else if (iDiff > 1024) {
        iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
    }

    document.getElementById('speed').innerHTML = iSpeed;
    document.getElementById('remaining').innerHTML = '| ' + secondsToTime(secondsRemaining);        
}

function uploadProgress(e) { // upload process in progress
    if (e.lengthComputable) {
        iBytesUploaded = e.loaded;
        iBytesTotal = e.total;
        var iPercentComplete = Math.round(e.loaded * 100 / e.total);
        var iBytesTransfered = bytesToSize(iBytesUploaded);

        document.getElementById('progress_percent').innerHTML = iPercentComplete.toString() + '%';
        document.getElementById('progress').style.width = (iPercentComplete * 4).toString() + 'px';
        document.getElementById('b_transfered').innerHTML = iBytesTransfered;
        if (iPercentComplete == 100) {
            var oUploadResponse = document.getElementById('upload_response');
            oUploadResponse.innerHTML = '<h1>Please wait...processing</h1>';
            oUploadResponse.style.display = 'block';
        }
    } else {
        document.getElementById('progress').innerHTML = 'unable to compute';
    }
}

function uploadFinish(e) { // upload successfully finished
    var oUploadResponse = document.getElementById('upload_response');
    oUploadResponse.innerHTML = e.target.responseText;
    oUploadResponse.style.display = 'block';

    document.getElementById('progress_percent').innerHTML = '100%';
    document.getElementById('progress').style.width = '400px';
    document.getElementById('filesize').innerHTML = sResultFileSize;
    document.getElementById('remaining').innerHTML = '| 00:00:00';

    clearInterval(oTimer);
}

function uploadError(e) { // upload error
    document.getElementById('error2').style.display = 'block';
    clearInterval(oTimer);
}  

function uploadAbort(e) { // upload abort
    document.getElementById('abort').style.display = 'block';
    clearInterval(oTimer);
}
</script>


