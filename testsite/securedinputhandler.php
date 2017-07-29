<?php
//this input data is filtered by XSSImageSub
include "ImageSubXSS.php";

if(isset($_POST['ucomment']))
{
	$comment = $_POST['ucomment'];
	echo $comment;	
}
else{
	echo $_POST['ucomment'];
}
?>