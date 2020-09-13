<?php
if($_GET){
	include_once ("GameEngine/Database/connection.php");
	include_once ("GameEngine/config.php");
	mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
	mysql_select_db(SQL_DB);
	

	
	switch($_GET['f']) {
		case 'qst':
			if (isset($_GET['qact'])){
				$qact=$_GET['qact'];
			}else {
				$qact=null;
			}
			if (isset($_GET['qact2'])){
				$qact2=$_GET['qact2'];
			}else {
				$qact2=null;
			}
			include("Templates/Ajax/quest_core.tpl");		
		break;
	}
	switch($_GET['cmd']) {
		

		
		case 'changeVillageName':
		
			function str_namevilage($TextVar){
	$bug[0] = '<';$bug[1] = '>';$bug[2] = '\'';
	return @str_replace($bug[0] , '&lt;' , $TextVar);
	return @str_replace($bug[1] , '&gt;' , $TextVar);
	return @str_replace($bug[3] , '&nbsp;' , $TextVar);
	}

			$q = "UPDATE " . TB_PREFIX . "vdata SET `name` = '" . str_namevilage($_POST['name']) . "' where `wref` = '" . $_POST['did'] . "'";
    		mysql_query($q);
		break;
		
		case 'mapLowRes':
			$x = $_POST['x'];
			$y = $_POST['y'];
			$xx = $_POST['width'];
			$yy = $_POST['height'];
			
			include("Templates/Ajax/mapscroll.tpl");
		break;
	}

}
?>
