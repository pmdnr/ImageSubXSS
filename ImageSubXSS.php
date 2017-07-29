<?php
/* 
--by PMD Nagarjun and Dr. Shaik Shakeel Ahamad-------------------------
Solution to prevent Cross Site Scripting Attacks in Web Applications
-----------------------------------------------------------------------
How to Use : 
Download ImageSubXSS.php and XSSImages folder (which contain required images) from 
https://github.com/pmdnr/ImageSubXSS/.
Include this ImageSubXSS.php in the beginning of your .php file which handles input data.
Example code : include "ImageSubXSS.php";
Note: Images need to be in XSSImages folder. And ImageSubXSS.php and XSSImages folder need to be in same folder
-----------------------------------------------------------------------
ImageSubXSS is licensed under the MIT License
-----------------------------------------------------------------------
Check pmdnr.com for additional information
-----------------------------------------------------------------------
*/

//Setup according to your Web Application By Modifying parameters
/* if your page background color black then set bg value to 2
by default bg value is 1*/
$bg = 1;

/* if you want to exclude some characters from filter then simple remove
from array default filter array contains ",',(,\,<,&# and in code looks like 
$xssfilter = ['"','\'','(','\\','<','&#'];
*/
$xssfilter = ['"','\'','(','\\','<','&#'];
$xssfilter_good1 = ['<img src="XSSImages/quot.png">','<img src="XSSImages/apos.png">',
'<img src="XSSImages/lrb.png">','<img src="XSSImages/bs.png">','<img src="XSSImages/lt.png">',
'<img src="XSSImages/amphash.png">'];
$xssfilter_good2  = ['<img src="XSSImages/quotw.png">','<img src="XSSImages/aposw.png">',
'<img src="XSSImages/lrbw.png">','<img src="XSSImages/bsw.png">','<img src="XSSImages/ltw.png">',
'<img src="XSSImages/amphashw.png">'];

$xssfilter_good = array();

if($bg==1){
	$xssfilter_good = $xssfilter_good1;
}
else if($bg==2){
	$xssfilter_good = $xssfilter_good2;
}

//processing POST data to remove attacks
foreach ($_POST as $inputname => $inputdata) {
	/* infuture //if input has array of values
		foreach ($inputname as $inputname => $inputdata) {

	}*/
	$_POST['$inputname'] = str_replace($xssfilter, $xssfilter_good, $inputdata);
}
//processing GET data to remove attacks
foreach ($_GET as $inputname => $inputdata) {
	$_GET['$inputname'] = str_replace($xssfilter, $xssfilter_good, $inputdata);
}

?>