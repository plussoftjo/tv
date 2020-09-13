<?php
		include("GameEngine/Database/connection.php");
		include("GameEngine/config.php");
        include ("GameEngine/Data/unitdata.php");
		include ("GameEngine/Database.php");
		include ("GameEngine/Generator.php");
		
	function procDistanceTime2($coor,$thiscoor,$ref,$mode) {
		$xdistance = ABS($thiscoor['x'] - $coor['x']);
		if($xdistance > WORLD_MAX) {
			$xdistance = (2 * WORLD_MAX + 1) - $xdistance;
		}
		$ydistance = ABS($thiscoor['y'] - $coor['y']);
		if($ydistance > WORLD_MAX) {
			$ydistance = (2 * WORLD_MAX + 1) - $ydistance;
		}
		$distance = SQRT(POW($xdistance,2)+POW($ydistance,2));
		if(!$mode) {
			if($ref == 1) {
				$speed = 16;
			}
			else if($ref == 2) {
				$speed = 12;
			}
			else if($ref == 3) {
				$speed = 24; 
			}
			else if($ref == 300) {
				$speed = 5;
			}
			else {
				$speed = 1;
			}
		}
		else {
			$speed = $ref;
		}
		return round(($distance/$speed) * 3600 / INCREASE_SPEED);
	}	

	$slots = $_POST['slot'];
	$lid = $_POST['lid'];
	$tribe = $_POST['tribe'];
	$getFLData = $database->getFLData($lid);
	$sql = mysql_query("SELECT * FROM ".TB_PREFIX."raidlist WHERE lid = ".$lid."");
	while($row = mysql_fetch_array($sql)){
		$sid = $row['id'];
		$wref = $row['towref'];
		$units = array();
		if($slots[$sid]=='on'){
			$return = true;
			if($tribe == 1){ $u = ""; } elseif($tribe == 2){ $u = "1"; } elseif($tribe == 3){ $u = "2"; }elseif($tribe == 4){ $u = "3"; }else {$u = "4"; }
			$units = $database->getUnit($getFLData['wref']);
			
			if($row['t1'] > $units['u'.$u."1"] && $row['t1'] > 0) $return = false;
			elseif($row['t2'] > $units['u'.$u."2"] && $row['t2'] > 0) $return = false;
			elseif($row['t3'] > $units['u'.$u."3"] && $row['t3'] > 0) $return = false;
			elseif($row['t4'] > $units['u'.$u."4"] && $row['t4'] > 0) $return = false;
			elseif($row['t5'] > $units['u'.$u."5"] && $row['t5'] > 0) $return = false;
			elseif($row['t6'] > $units['u'.$u."6"] && $row['t6'] > 0) $return = false;
			elseif($row['t7'] > $units['u'.$u."7"] && $row['t7'] > 0) $return = false;
			elseif($row['t8'] > $units['u'.$u."8"] && $row['t8'] > 0) $return = false;
			elseif($row['t9'] > $units['u'.$u."9"] && $row['t9'] > 0) $return = false;
			elseif($row['t10'] > $units['u'.$u."10"] && $row['t10'] > 0) $return = false;
			if($return){
				$database->modifyUnit($getFLData['wref'],$u."1",$row['t1'],0);
				$database->modifyUnit($getFLData['wref'],$u."2",$row['t2'],0);
				$database->modifyUnit($getFLData['wref'],$u."3",$row['t3'],0);
				$database->modifyUnit($getFLData['wref'],$u."4",$row['t4'],0);
				$database->modifyUnit($getFLData['wref'],$u."5",$row['t5'],0);
				$database->modifyUnit($getFLData['wref'],$u."6",$row['t6'],0);
				$database->modifyUnit($getFLData['wref'],$u."7",$row['t7'],0);
				$database->modifyUnit($getFLData['wref'],$u."8",$row['t8'],0);
				$database->modifyUnit($getFLData['wref'],$u."9",$row['t9'],0);
				$database->modifyUnit($getFLData['wref'],$u.$tribe."0",$row['t10'],0);
				
				if($database->checkVilExist($row['towref'])){
					$query1 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'vdata` WHERE `wref` = ' . $row['towref']);
				}else{
					$query1 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'odata` WHERE `wref` = ' . $row['towref']);
				}
				
				$data1 = mysql_fetch_assoc($query1);
				$query2 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'users` WHERE `id` = '.$data1['owner']);
				$data2 = mysql_fetch_assoc($query2);
				$query11 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'vdata` WHERE `wref` = '.$getFLData['wref']);
				$data11 = mysql_fetch_assoc($query11);
				$query21 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'users` WHERE `id` = '.$data11['owner']);
				$data21 = mysql_fetch_assoc($query21);
				
				$eigen = $database->getCoor($getFLData['wref']);
				$from = array('x'=>$eigen['x'], 'y'=>$eigen['y']);
				$ander = $database->getCoor($row['towref']);
				$to = array('x'=>$ander['x'], 'y'=>$ander['y']);
				$start = ($data21['tribe']-1)*10+1;
				$end = ($data21['tribe']*10);
				
				$speeds = array();
				$scout = 1;
				
				//find slowest unit.			
				for($i=1;$i<=10;$i++){
					if ($row['t'.$i]){
						if($row['t'.$i] != '' && $row['t'.$i] > 0){
							if($unitarray) { reset($unitarray); }
							$unitarray = $GLOBALS["u".(($tribe-1)*10+$i)];
							$speeds[] = $unitarray['speed'];
						}
					}
				}
				
				$ckey = $generator->generateRandStr(6);
				$id = $database->addA2b($ckey,time(),$wref,$row['t1'],$row['t2'],$row['t3'],$row['t4'],$row['t5'],$row['t6'],$row['t7'],$row['t8'],$row['t9'],$row['t10'],0,4);
				$data = $database->getA2b($ckey, time());
				
				$time = procDistanceTime2($from,$to,min($speeds),1);
				
				$ctar1 = 0;
				$ctar2 = 0; 
				$abdata = $database->getABTech($getFLData['wref']);
				
				$reference = $database->addAttack(($getFLData['wref']),$row['t1'],$row['t2'],$row['t3'],$row['t4'],$row['t5'],$row['t6'],$row['t7'],$row['t8'],$row['t9'],$row['t10'],0,$data['type'],$ctar1,$ctar2,0);
				
				$database->addMovement(3,$getFLData['wref'],$data['to_vid'],$reference,0,($time+time()));
			}
		}	
	}
header("Location: build.php?id=39&t=99");
?>