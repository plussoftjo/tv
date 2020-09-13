
<?php
include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['newdid'])) {
    $_SESSION['wid'] = $_GET['newdid'];
    header("Location: ".$_SERVER['PHP_SELF']);
}
else { $building->procBuild($_GET);} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo SERVER_NAME ?></title>


		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="content-language" content="ir" />
		<link href="gpack/travian_Travian_4.0_41/lang/ir/compact.css?asd423" rel="stylesheet" type="text/css" />
        <link href="gpack/travian_Travian_4.0_41/lang/ir/lang.css?asd423" rel="stylesheet" type="text/css" />										
        <link href="img/travian_basics.css" rel="stylesheet" type="text/css" />
        <script src="unx.js" type="text/javascript"></script>
        <script src="crypt.js?1356950793" type="text/javascript"></script>


<div id="header"> 
				<div id="mtop">
					<a id="logo" href="http://www." target="_blank" title="bigtravian"></a>
					<ul id="navigation">
						<li id="n1" class="resources">
							<a class="" href="dorf1.php" accesskey="1" title="�����"></a>
						</li>
						<li id="n2" class="village">
							<a class="" href="dorf2.php" accesskey="2" title="������� ��"></a>
						</li>
						<li id="n3" class="map">
							<a class="" href="karte.php" accesskey="3" title="����"></a>
						</li>
						<li id="n4" class="stats">
							<a class="" href="statistiken.php" accesskey="4" title="����"></a>
						</li>

</ul>
</div> 

<?php
if($session->gpack == null || GP_ENABLE == false) {
echo "
<link href='".GP_LOCATE."travian.css?e21d2' rel='stylesheet' type='text/css' />
<link href='".GP_LOCATE."lang/en/lang.css?e21d2' rel='stylesheet' type='text/css' />";
} else {
echo "
<link href='".$session->gpack."travian.css?e21d2' rel='stylesheet' type='text/css' />
<link href='".$session->gpack."lang/en/lang.css?e21d2' rel='stylesheet' type='text/css' />";
}
?>
<script type="text/javascript">
window.addEvent('domready', start);
</script>
</head>
<body class="v35 ie ie8">
<div class="wrapper">
<img style="filter: chroma();" src="img/x.gif" id="msfilter" alt="">
<?php include("Templates/header.tpl"); ?>

<br /><br /><br /><br />
<br />
<br />
<div align="center">
<div align="center" style="background:#F4FFDF;width:500px;border:4px solid #A4F488;border-radius:20px;">
<br />
<br />
<br />
<div align="center" style="font:Tahoma;font-size:16px;font-weight:bold;">( Warehouse & Garnary - ( Level : 20 ) & ( +30 Pop</div>
<br />
<br />
<div dir="ltr" align="center" style="font-weight:bold;">
Add Warehouse and Garnary : +8000000 &nbsp;
Add Population : +30 &nbsp;
</div>
<br />
<br />
<br />

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
<input type="submit" name="submit" value="Accept"> 
</form>
<br />
<br />
<br />
 
</div>
</div>
<?php
error_reporting (E_ALL ^ E_NOTICE);
include ("extra_mysql.php");
if (isset($_POST['submit'])) { // if form has been submitted
// checks it against the database
$check = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysql_error());
//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {die('Username id or Village id is wrong. <a href=dorf1.php>Click Here to go back to your village</a>');}
//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {die('Username uid or Village id is wrong. <a href=dorf1.php>Click Here to go back to your village</a>');}                    
$sql = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysql_error());
while($row = mysql_fetch_array($sql)){};
$sql = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysql_error());
while($row = mysql_fetch_array($sql)){
$gold = $row["gold"];};
if ($gold < 10 ) {die('<script>alert("Accept");</script>');}
else {

mysql_query("UPDATE ".TB_PREFIX."users SET `gold` = `gold`-10 WHERE id ='".$session->uid."'")or die(mysql_error()); 
mysql_query("UPDATE ".TB_PREFIX."vdata SET `maxstore` = `maxstore`+8000000  WHERE wref ='".$village->wid."'")or die(mysql_error());
mysql_query("UPDATE ".TB_PREFIX."vdata SET `maxcrop` = `maxstore`+8000000  WHERE wref ='".$village->wid."'")or die(mysql_error());
mysql_query("UPDATE ".TB_PREFIX."vdata SET `pop` = `pop`+30  WHERE wref ='".$village->wid."'")or die(mysql_error());
echo "<script>alert(' Add 8000000 Stores and -10 Golds(+30 POP )');location.href='dorf2.php';</script>";}}
?>

</html>