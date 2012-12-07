<html>
<?php
include('config.php');
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$dummy = $_POST["dummy"];

$sFileName = 'blank';
$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

$countquery = 'SELECT * FROM Gallery';
$countresult = mysql_query($countquery);
$rows = mysql_num_rows($countresult) + 1;

$albumName = $_POST["albumname"];
$addquery = 'INSERT into Gallery VALUES("'.$rows.'.jpg","NULL","'.$albumName.'")';
#$addquery = 'Insert into Gallery values("testpath", "NULL", "testalbum")'; 
$result = mysql_query($addquery);

if (move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/'.$rows.'.jpg')) {

	echo <<<EOF
<p>Danny's iphone was here again. Be afraid </p>
<p>Your file: {$sFileName} has been successsfully received.</p>
<p>Added to album: {$albumName}</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;

}

?>
</html>