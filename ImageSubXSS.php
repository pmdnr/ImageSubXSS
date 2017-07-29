<?php
/* 
--by PMD Nagarjun and Dr. Shaik Shakeel Ahamad-------------------------
Solution to prevent Cross Site Scripting Attacks in Web Applications
-----------------------------------------------------------------------
How to Use : 
Download ImageSubXSS.php and XSSImages folder (which contain required images) from 
https://github.com/pmdnr/ImageSubXSS/.
Include this ImageSubXSS.php in the beginning of your .php file which handles input data.
Example code : include("ImageSubXSS.php");
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
$xssfilter_good1 = ['<img src="images/quot.png">','<img src="images/apos.png">','<img src="images/lrb.png">'
,'<img src="images/bs.png">','<img src="images/lt.png">','<img src="images/amphash.png">'];
$xssfilter_good2 = ['<img src="images/quotw.png">','<img src="images/aposw.png">','<img src="images/lrbw.png">'
,'<img src="images/bsw.png">','<img src="images/ltw.png">','<img src="images/amphashw.png">'];

//processing POST data to remove attacks
foreach ($_POST as $inputname => $inputdata) {
	/* infuture //if input has array of values
		foreach ($inputname as $inputname => $inputdata) {

	}*/
	$_POST['$inputname'] = str_replace($xssfilter, $xssfilter_good.$bg, $inputdata);
}
//processing GET data to remove attacks
foreach ($_GET as $inputname => $inputdata) {
	$_GET['$inputname'] = str_replace($xssfilter, $xssfilter_good.$bg, $inputdata);
}

?>