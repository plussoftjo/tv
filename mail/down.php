<?php
require_once("inc/bouncer.php");
include("download.php");

if($_GET['format'] == 'txt'){
	$names = file("maillist.php");	
	$lines = count(file("maillist.php"));
  $lines = $lines-1;
  $file = '';
	for($i=1; $i<=$lines; $i=$i+1)
	{
    $names[$i] = str_replace('<?php die("Not allowed"); ?>', "", $names[$i]);
    $names[$i] = str_replace("<br>", "", $names[$i]);    
    $names[$i] = str_replace(" ", "", $names[$i]); 
    $file = $file . $names[$i];
	}	
  $myFile = "backups/mailist.txt";
  $fh = fopen($myFile, 'w') or die("can't open file");
  fwrite($fh, $file);
  fclose($fh);

  txt("backups/mailist.txt");
  unlink("backups/mailist.txt");
}

if($_GET['format'] == 'csv'){
	$names = file("maillist.php");	
	$lines = count(file("maillist.php"));
  $lines = $lines-1;
  $file = '';
	for($i=1; $i<=$lines; $i=$i+1)
	{
    $names[$i] = str_replace('\n', "", $names[$i]);
    $names[$i] = str_replace('<?php die("Not allowed"); ?>', "", $names[$i]);
    $names[$i] = str_replace("<br>", ",", $names[$i]);  
    $names[$i] = str_replace(" ", "", $names[$i]);   
    $file = $file . $names[$i];
	}	
  $myFile = "backups/mailist.csv";
  $fh = fopen($myFile, 'w') or die("can't open file");
  fwrite($fh, $file);
  fclose($fh);

  csv("backups/mailist.csv");
  unlink("backups/mailist.csv");
}
?>

