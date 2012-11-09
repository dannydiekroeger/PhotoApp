<?php
include('config.php');
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

$countquery = 'SELECT * FROM Gallery';
$countresult = mysql_query($countquery);
$rows = mysql_num_rows($countresult) + 1;

$albumName = $_POST["albumname"];
$addquery = "INSERT into Gallery VALUES('".$rows.".jpg','NULL','$albumName')";
$result = mysql_query($addquery);

if (move_uploaded_file($_FILES['image_file']['tmp_name'], "uploads/".$rows.".jpg")) {
	

}
echo <<<EOF
<p>Your file: {$sFileName} has been successsfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;
?>