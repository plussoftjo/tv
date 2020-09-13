<?php include("inc/bouncer.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Mailist V3 مديريت</title>
</head>
<br>
<center>
<img src="css/logo.gif" alt="Maillist">
<?php
  $file = "maillist.php";
  $lines = count(file($file));
  $lines = $lines-1;
  echo "<br><br>- مجموعا $lines عضو در خبرنامه عضو هستند";
?>
<br>
<a href="<?php echo $_SERVER['php_self'] ?>?logout">خروج</a>
<div id="container">
<fieldset>
<legend>مديريت ليست ايميل</legend>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?view">نمايش ليست ايميل ها</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?view"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['view'])){
	$names = file("maillist.php");	
	$lines = count(file("maillist.php"));
  $lines = $lines-1;
  $counter = 0;
	for($i=1; $i<=$lines; $i=$i+1)
	{
    $names[$i] = str_replace("<br>", "", $names[$i]);
    $names[$i] = str_replace("\n", "", $names[$i]);
		echo $names[$i].'<a href="delete.php?del='.$names[$i].'"><img src="images/delete.png" align="bottom" border="0"></a>';
		echo "<br>\n";
		$counter++;
	}	
	if($counter == 0 ) {
	echo 'هيچ ايميلي در خبر نامه وجود ندارد';
	echo "<br>\n";
	} 
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
?>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?backup">پشتيبان گيري از ايميل ها</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?backup"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['backup'])){
	echo "<br>";
	$file = 'maillist.php';
	$newfile = 'backups/'.date("jnY").'.txt';
	copy($file, $newfile);
	echo 'نسخه پشتيبان با موفقيت ذخيره شد (backups/'.$newfile.')<br>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
?>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?down">دانلود ليست ايميل ها</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?down"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['down'])){
  echo '<br>پسوند: <a href="down.php?format=txt">.txt</a>&nbsp;&nbsp;&nbsp;<a href="down.php?format=csv">.csv</a>&nbsp;&nbsp;&nbsp;';
  echo '<br><a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
?>

</fieldset>
<fieldset>
<legend>پيام</legend>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?outbox">صندوق خروجي</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?outbox"><img src="images/2downarrow.png" border="0"></a><br>


<?php 
if (isset($_GET['outbox'])){
$counter = 0;
echo "<br>";
if ($handle = opendir('./outbox')) { 
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != "..") { 
            
            
   
            $file = str_replace(".txt", "", $file);
            $load = $file;
            $pieces = explode("989898989898989898989898", $file);
            
            echo '<a title="edit/resend" href="'.$_SERVER['PHP_SELF'].'?load='.$file.'"><b>موضوع:</b> '.$pieces[0].'&nbsp;&nbsp;&nbsp;<b> تاريخ ارسال: </b>'.$pieces[1].'</a><img src="images/edit.png">';
            echo '<a href="delete.php?delm='.$file.'"><img src="images/delete.png" align="bottom" border="0"></a> <br>'; 
            
            $counter++;
        } 
    } 
    closedir($handle); 

}
if($counter == 0){
  echo "<br> هيچ پيام ارسال شده اي در صندوق خروجي وجود ندارد<br>";
}
	echo '<br><a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>'; 
}
?>




<A href="<?php echo $_SERVER['PHP_SELF'] ?>?header">ويرايش سربرگ</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?header"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['header'])){
$header = file_get_contents("assets/header.txt");
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">
	<textarea name="header">'.$header.'</textarea><br>
	<input name="Submit" value="ارسال" type="submit" />
	</form>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
if (isset($_POST['header'])){
	$data = $_POST['header'];  
	$file = "assets/header.txt";   
	if (!$file_handle = fopen($file,"w")) {
		echo "قابل باز شدن نيست!"; 
	}  
	if (!fwrite($file_handle, $data)) {
		echo "قابل نوشتن نيست!"; 
	}  
	echo "سربرگ با موفقيت بروز شد"; 
	echo '<br><a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';  
	fclose($file_handle); 
}
?>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?send">ارسال ايميل</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?send"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['send'])){
	echo "<br>";
	include("send.php");
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
if (isset($_GET['load'])){
  $load = htmlspecialchars($_GET['load']);
	echo "<br>";
	include("send.php");
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
?>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?footer">ويرايش ته برگ</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?footer"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['footer'])){
	$footer = file_get_contents("assets/footer.txt");
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">
	<textarea name="footer">'.$footer.'</textarea><br>
	<input name="Submit" value="ارسال" type="submit" />
	</form>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}
if (isset($_POST['footer'])){
	$data = $_POST['footer'];  
	$file = "assets/footer.txt";   
	if (!$file_handle = fopen($file,"w")) {
		echo "فايل ته برگ باز نميشود"; 
		}  
	if (!fwrite($file_handle, $data)) {
		echo "فايل ته برگ قابل نوشتن نيست";
		}  
	echo "ته برگ با موفقيت بروز شد"; 
	echo '<br><a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';  
	fclose($file_handle); 
}
?>
</fieldset>
<fieldset>
<legend>مديريت</legend>
<A href="<?php echo $_SERVER['PHP_SELF'] ?>?pass">تغيير رمز عبور</a>&nbsp;&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>?pass"><img src="images/2downarrow.png" border="0"></a><br>
<?php 
if (isset($_GET['pass'])){
include("inc/config.php");
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">
	<input name="password" value="'.$password.'" type="password" />
	<input type="submit" value="ذخيره">
	</form>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'">مخفي</a><br>';
}

if (isset($_POST['password'])){
	$data = '<?php
	 $password = "'.$_POST['password'].'";
	 ?>';
	$file = "inc/config.php";   
	if (!$file_handle = fopen($file,"w")) {
		echo "فايل تنظيمات قابل خواندن نيست"; 
		}  
	if (!fwrite($file_handle, $data)) {
		echo "فايل تنظيمات قابل نوشتن نيست"; 
		}  
	echo "رمز عبور با موفقيت تغيير کرد!"; 
	echo '<br><a href="'.$_SERVER['PHP_SELF'].'">Hide</a><br>';  
	fclose($file_handle); 
}
?>
</fieldset>
</div>

  <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-html401"
        alt="Valid HTML 4.01 Transitional" height="31" width="88" border="0"></a>
  </p>
  
  
</center>
