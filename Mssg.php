<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       sysmsg.php                                                  ##
##  Developed by:  Dixie                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################


include_once("GameEngine/Account.php");

$max_per_pass = 1000;

mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);

mysql_select_db(SQL_DB);

if (mysql_num_rows(mysql_query("SELECT id FROM ".TB_PREFIX."users WHERE access = 9 AND id = ".$session->uid)) != '1') die("Hacking attempt!");



if(isset($_GET['del'])){

			$query="SELECT * FROM ".TB_PREFIX."users ORDER BY id + 0 DESC";

			$result=mysql_query($query) or die (mysql_error());

			for ($i=0; $row=mysql_fetch_row($result); $i++) {

					$updateattquery = mysql_query("UPDATE ".TB_PREFIX."users SET ok = '0' WHERE id = '".$row[0]."'")

					or die(mysql_error());	

			}

}


if (@$_POST['submit'] == "Send")

{

	unset ($_SESSION['m_message']);

	$_SESSION['m_message'] = $_POST['message'];

	$NextStep = true;

}





if (@isset($_POST['confirm']))

{

	if ($_POST['confirm'] == 'No' ) $Interupt = true;

	if ($_POST['confirm'] == 'Yes'){



		if(file_exists("Templates/text.tpl")) {



		$myFile = "Templates/text.tpl";

		$fh = fopen($myFile, 'w') or die("<br/><br/><br/>Can't open file: templates/text.tpl");

		$text = file_get_contents("Templates/text_format.tpl");

		$text = preg_replace("'%TEKST%'",$_SESSION['m_message'] ,$text);																	

		fwrite($fh, $text);



			$query="SELECT * FROM ".TB_PREFIX."users ORDER BY id + 0 DESC";

			$result=mysql_query($query) or die (mysql_error());

			for ($i=0; $row=mysql_fetch_row($result); $i++) {

					$updateattquery = mysql_query("UPDATE ".TB_PREFIX."users SET ok = '1' WHERE id = '".$row[0]."'")

					or die(mysql_error());	

			}

		$done = true;

		} else { die("<br/><br/><br/>wrong"); }

}}



?>	


<?php    include "Templates/html.tpl";  ?>

<body class="v35 webkit chrome statistics">
	<div id="wrapper"> 
		<img id="staticElements" src="img/x.gif" alt="" /> 
		<div id="logoutContainer"> 
			<a id="logout" href="logout.php" title="<?php echo LOGOUT; ?>">&nbsp;</a> 
		</div> 
		<div class="bodyWrapper"> 
			<img style="filter:chroma();" src="img/x.gif" id="msfilter" alt="" /> 
			<div id="header"> 
				<div id="mtop">
					<a id="logo" href="<?php include("adress.txt")?>" target="_blank" title="<?php echo SERVER_NAME ?>"></a>
					<ul id="navigation">
						<li id="n1" class="resources">
							<a class="" href="dorf1.php" accesskey="1" title="<?php echo HEADER_DORF1; ?>"></a>
						</li>
						<li id="n2" class="village">
							<a class="" href="dorf2.php" accesskey="2" title="<?php echo HEADER_DORF2; ?>"></a>
						</li>
						<li id="n3" class="map">
							<a class="" href="karte.php" accesskey="3" title="<?php echo HEADER_MAP; ?>"></a>
						</li>
						<li id="n4" class="stats">
							<a class=" active" href="statistiken.php" accesskey="4" title="<?php echo HEADER_STATS; ?>"></a>
						</li>
<?php
    	if(count($database->getMessage($session->uid,7)) >= 1000) {
			$unmsg = "+1000";
		} else { $unmsg = count($database->getMessage($session->uid,7)); }
		
    	if(count($database->getMessage($session->uid,8)) >= 1000) {
			$unnotice = "+1000";
		} else { $unnotice = count($database->getMessage($session->uid,8)); }
?>
<li id="n5" class="reports"> 
<a href="berichte.php" accesskey="5" title="<?php echo HEADER_NOTICES; ?><?php if($message->nunread){ echo' ('.count($database->getMessage($session->uid,8)).')'; } ?>"></a>
<?php
if($message->nunread){
	echo "<div class=\"ltr bubble\" title=\"".$unnotice." ".HEADER_NOTICES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unnotice."</div></div>";
}
?>
</li>
<li id="n6" class="messages"> 
<a href="nachrichten.php" accesskey="6" title="<?php echo HEADER_MESSAGES; ?><?php if($message->unread){ echo' ('.count($database->getMessage($session->uid,7)).')'; } ?>"></a> 
<?php
if($message->unread) {
	echo "<div class=\"ltr bubble\" title=\"".$unmsg." ".HEADER_MESSAGES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unmsg."</div></div>";
}
?>
</li>

</ul>
<div class="clear"></div> 
</div> 
</div>
					<div id="mid">

												<div class="clear"></div> 
<div id="contentOuterContainer"> 
<div class="contentTitle">&nbsp;</div> 
    <div class="contentContainer"> 
								



<div id="content" class="statistics">
                                		<script type="text/javascript"> 
					window.addEvent('domready', function()
					{
						$$('.subNavi').each(function(element)
						{
							new Travian.Game.Menu(element);
						});
					});
				</script>

<h1 class="titleInHeader">&#1606;&#1575;&#1605;&#1607; &#1607;&#1605;&#1711;&#1575;&#1606;&#1740;<?php if($session->access == ADMIN) { echo " <a href=\"\"></a>"; } ?></h1>
<div class="contentNavi subNavi">
				



<div title="" <?php if(!isset($_GET['tid']) || (isset($_GET['tid']) && ($_GET['tid'] == 1 || $_GET['tid'] == 31 || $_GET['tid'] == 32 || $_GET['tid'] == 7))) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="Mssg.php"><span class="tabItem">&#1606;&#1575;&#1605;&#1607; &#1607;&#1605;&#1711;&#1575;&#1606;&#1610;</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && ($_GET['tid'] == 4 || $_GET['tid'] == 41 || $_GET['tid'] == 42 || $_GET['tid'] == 43)) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="Mass.php"><span class="tabItem">&#1606;&#1575;&#1605;&#1607;</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 2) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="admin"><span class="tabItem">&#1605;&#1583;&#1740;&#1585;&#1740;&#1578;</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 8) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="meDa.php"><span class="tabItem">&#1605;&#1583;&#1575;&#1604; &#1607;&#1575;</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 0) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="katibe.php"><span class="tabItem">&#1705;&#1578;&#1740;&#1576;&#1607; &#1607;&#1575;</span></a></div> 
				</div> 
				
				<div class="clear"></div>



















</div>



<h4 class="round">&#1575;&#1585;&#1587;&#1575;&#1604; &#1606;&#1575;&#1605;&#1607; &#1607;&#1605;&#1711;&#1575;&#1606;&#1740;</h4>


<?php if (@!$NextStep && @!$NextStep2 && @!$done){?>

<form method="POST" action="Mssg.php" name="myform" id="myform">

			<table cellspacing="1" cellpadding="1" class="tbg" style="background-color:#C0C0C0; border: 0px solid #C0C0C0; font-size: 10pt;">    

			  <tbody>

			    <tr>	

			      <td class="rbg" style="font-size: 10pt; text-align:center;">System Message</td>    

			    </tr>

			    <tr>	

			      <td style="font-size: 10pt; text-align:center;">Text BBCode:<br><b>[b] txt [/b]</b> - <i>[i] txt [/i]</i> - <u>[u] txt [/u]</u> <br />

			<textarea class="fm" name="message" cols="60" rows="23"></textarea></td>    

			    </tr>

			    <tr>	

			      <td style="text-align:center;">All fields required</td>    

			    </tr>

			    <tr>	

			      <td style="text-align:center;">

			        <input type="submit" value="Send" name="submit" />    </td>

			    </tr>

			  </tbody>

			</table> 

			</form>

<a href="Mssg.php?del">Delete old System Message</a>

<?php }elseif (@$NextStep){?>

<form method="POST" action="Mssg.php">

			<table cellspacing="1" cellpadding="2" class="tbg">    

			  <tbody>

			    <tr>	

			      <td class="rbg" colspan="2">Confirmation</td>    

			    </tr>

			    <tr>	

			      <td style="text-align: left; width: 200px;">Do you really want to send System Message?</td>

			      <td style="text-align: left;">

			        <input type="submit" style="width: 240px;" class="fm" name="confirm" value="Yes">

			        <input type="submit" style="width: 240px;" class="fm" name="confirm" value="No"></td>    

			    </tr>

			  </tbody>

			</table> 

</form>

Example: (BBCode doesn't work over here!)

<?php

$txt=$_SESSION['m_message'];

$txt = preg_replace("/\[b\]/is",'<b>', $txt);

$txt = preg_replace("/\[\/b\]/is",'</b>', $txt);

$txt = preg_replace("/\[i\]/is",'<i>', $txt);

$txt = preg_replace("/\[\/i\]/is",'</i>', $txt);

$txt = preg_replace("/\[u\]/is",'<u>', $txt);

$txt = preg_replace("/\[\/u\]/is",'</u>', $txt);

echo ($txt);



}elseif (@$Interupt){?>

<b><?php echo MASS_ABORT; ?></b>



<?php }elseif (@$done){?>

System Message was sent

<?php }else{die("Something is wrong");}?>






















</div>
</div>













                        <div class="contentFooter">&nbsp;</div>
</div>
                    
<?php
include("Templates/sideinfo.tpl");
include("Templates/footer.tpl");
include("Templates/header.tpl");
include("Templates/res.tpl");
include("Templates/vname.tpl");
include("Templates/quest.tpl");
?>

</div>
<div id="ce"></div>
</div>
</body>
</html>


