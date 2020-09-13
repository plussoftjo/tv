<?php require_once("inc/bouncer.php"); ?>
<script language="javascript" type="text/javascript" src="wys/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
		tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<center>

<?php
	$names = file("maillist.php");	
	$lines = count(file("maillist.php"));
  $lines = $lines-1;  
?>
<form method="post" action="sendit.php">
To: <br><input type="text" name="to" size="44" value="<?php 	for($i=1; $i<=$lines; $i=$i+1)
	{
    $names[$i] = str_replace("<br>", "", $names[$i]);
    $names[$i] = str_replace("\n", "", $names[$i]);
		echo $names[$i].';';
	}	
	
	?>"><br>
From: <br><input type="text" name="email" size="44" value="newsletter@localhost.com"><br>
Subject: <br><input type="text" name="subject" size="44" /><br><br>
<textarea id="elm2" name="elm2" rows="10" cols="40">
<?php if(isset($load)){

include("outbox/".$load.".txt");
}
?>
</textarea>

<br><input type="submit" name="save" value="Submit">
	<input type="reset" name="reset" value="Reset">
</form>
</center>
