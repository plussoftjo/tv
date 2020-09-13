 <?php
require_once("inc/bouncer.php");
 function txt($path)
 {
  	//get filename
  	$filename = basename($path);
  	//sent the right headers
	header("Content-Transfer-Encoding: binary");
	header("Content-Type: text/plain");
	header("Content-Disposition: attachment; filename=$filename");
	//start feeding with the file
	readfile($path);
 }
  function csv($path)
 {
  	//get filename
  	$filename = basename($path);
  	//sent the right headers

header ( "Content-Type: application/force-download" );
header ( "Content-Type: application/octet-stream" );
header ( "Content-Type: application/download" );
header ( "Content-Type: text/csv" ); 
	header("Content-Disposition: attachment; filename=$filename");
	//start feeding with the file
	readfile($path);
 }
?>