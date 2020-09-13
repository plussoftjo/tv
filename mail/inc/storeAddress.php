<?php
function storeAddress() {
  $message = "&nbsp;";
  // Check for an email address in the query string
  if( !isset($_GET['address']) ){
    // No email address provided
  }
  else {
    // Get email address from the query string
    $address = $_GET['address'];
    // Validate Address
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $address)) {
      $message = "<strong></strong>&#1575;&#1740;&#1605;&#1740;&#1604; &#1608;&#1575;&#1585;&#1583; &#1588;&#1583;&#1607; &#1605;&#1593;&#1578;&#1576;&#1585; &#1606;&#1605;&#1740;&#1576;&#1575;&#1588;&#1583;";
    }
    else {
$key = $address;
//load file into $fc array
$fc=file("maillist.php");
//open same file and use "w" to clear file
$f=fopen("maillist.php","w");
//loop through array using foreach
foreach($fc as $line)
{
     if (!strstr($line,$key)) //look for $key in each line
           fputs($f,$line); //place $line back in file
}
fclose($f);
$myFile = "maillist.php";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, $address);
$stringData = "<br>\n";
fwrite($fh, $stringData);
fclose($fh);

      if(mysql_error()){
        $message = "<strong>Error</strong>&#1575;&#1740;&#1605;&#1740;&#1604; &#1608;&#1575;&#1585;&#1583; &#1588;&#1583;&#1607; &#1605;&#1593;&#1578;&#1576;&#1585; &#1606;&#1605;&#1740;&#1576;&#1575;&#1588;&#1583;";
      }
      else {
        $message = "&#1575;&#1586; &#1588;&#1605;&#1575; &#1576;&#1582;&#1575;&#1591;&#1585; &#1593;&#1590;&#1608;&#1740;&#1578; &#1583;&#1585; &#1582;&#1576;&#1585;&#1606;&#1575;&#1605;&#1607; &#1605;&#1578;&#1588;&#1705;&#1585;&#1740;&#1605;";
      }
    }
  }
  return $message;
}
?>