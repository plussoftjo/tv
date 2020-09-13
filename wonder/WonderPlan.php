<?php

/** --------------------------------------------------- **\
| ********* DO NOT REMOVE THIS COPYRIGHT NOTICE ********* |
+---------------------------------------------------------+
| Credits:     All the developers including the leaders:  |
|              Advocaite & Dzoki & Donnchadh              |
|                                                         |
| Copyright:   TravianX Project All rights reserved       |
\** --------------------------------------------------- **/

set_time_limit(0); 
        include_once ("../GameEngine/Session.php");
        include_once ("../GameEngine/config.php");

        mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
        mysql_select_db(SQL_DB);

/**
 * If user is not administrator, access is denied!
 */
        if($session->access < ADMIN)
        	die("Access Denied: You are not Admin!");

/**
 * Functions
 */
        function generateBase($kid, $uid, $username) {
        	global $database, $message;
        	if($kid == 0) {
        		$kid = rand(1, 4);
        	} else {
        		$kid = $_POST['kid'];
        	}

        	$wid = $database->generateBase($kid);
        	$database->setFieldTaken($wid);
        	$database->addVillage($wid, $uid, $username, 1);
        	$database->addResourceFields($wid, $database->getVillageType($wid));
        	$database->addUnits($wid);
        	$database->addTech($wid);
        	$database->addABTech($wid);
        	$database->updateUserField($uid, "access", USER, 1);
        	$message->sendWelcome($uid, $username);
        }

/**
 * Creating account & capital village
 */
        $username = "Natars";
        $password = md5('013ab00e4' . rand(999999999999, 9999999999999999999999999) . 'f248588ed');
        $email = "natars@travianx.com";
        $tribe = 5;
        $desc = "[#natars]";

        $q = "INSERT INTO " . TB_PREFIX . "users (id,username,password,access,email,timestamp,tribe,location,act,protect) VALUES (3, '$username', '$password', " . USER . ", '$email', ".time().", $tribe, '', '', 0)";
        mysql_query($q);
        unset($q);
        $uid = $database->getUserField($username, 'id', 1);
        generateBase(0, $uid, $username);
        $wid = mysql_fetch_assoc(mysql_query("SELECT * FROM " . TB_PREFIX . "vdata WHERE owner = $uid"));
        $q = "UPDATE " . TB_PREFIX . "vdata SET pop = " . rand(700, 950) . " WHERE owner = $uid";
        mysql_query($q) or die(mysql_error());
        $q2 = "UPDATE " . TB_PREFIX . "users SET access = 0 WHERE id = $uid";
        mysql_query($q2) or die(mysql_error());
        if(SPEED > 3) {
        	$speed = 5;
        } else {
        	$speed = SPEED;
        }
        $q3 = "UPDATE " . TB_PREFIX . "units SET u41 = " . (64700 * $speed) . ", u42 = " . (295231 * $speed) . ", u43 = " . (180747 * $speed) . ", u44 = " . (7 * $speed) . ", u45 = " . (364401 * $speed) . ", u46 = " . (217602 * $speed) . ", u47 = " . (2034 * $speed) . ", u48 = " . (1040 * $speed) . " , u49 = " . (1 * $speed) . ", u50 = " . (9 * $speed) . " WHERE vref = " . $wid['wref'] . "";
        mysql_query($q3) or die(mysql_error());
        $q4 = "UPDATE " . TB_PREFIX . "users SET desc2 = '$desc' WHERE id = $uid";
        mysql_query($q4) or die(mysql_error());


/**
 * SMALL ARTEFACTS
 */
        function Artefact($uid, $type, $size, $art_name, $village_name, $desc, $effect, $img) {
        	global $database;
        	$kid = rand(1, 4);
        	$wid = $database->generateBase($kid);
        	$database->addArtefact($wid, $uid, $type, $size, $art_name, $desc, $effect, $img);
        	$database->setFieldTaken($wid);
        	$database->addVillage($wid, $uid, $village_name, '0');
        	$database->addResourceFields($wid, $database->getVillageType($wid));
        	$database->addUnits($wid);
        	$database->addTech($wid);
        	$database->addABTech($wid);
        	mysql_query("UPDATE " . TB_PREFIX . "vdata SET pop = " . rand(10, 200) . " WHERE wref = $wid");
        	mysql_query("UPDATE " . TB_PREFIX . "vdata SET name = '$village_name' WHERE wref = $wid");
        	if(SPEED > 3) {
        		$speed = 5;
        	} else {
        		$speed = SPEED;
        	}
        	if($size == 1) {
        		mysql_query("UPDATE " . TB_PREFIX . "units SET u41 = " . (rand(1000, 2000) * $speed) . ", u42 = " . (rand(1500, 2000) * $speed) . ", u43 = " . (rand(2300, 2800) * $speed) . ", u44 = " . (rand(25, 75) * $speed) . ", u45 = " . (rand(1200, 1900) * $speed) . ", u46 = " . (rand(1500, 2000) * $speed) . ", u47 = " . (rand(500, 900) * $speed) . ", u48 = " . (rand(100, 300) * $speed) . " , u49 = " . (rand(1, 5) * $speed) . ", u50 = " . (rand(1, 5) * $speed) . " WHERE vref = " . $wid . "");
        		mysql_query("UPDATE " . TB_PREFIX . "fdata SET f22t = 27, f22 = 10, f28t = 25, f28 = 10, f19t = 23, f19 = 10, f32t = 23, f32 = 10 WHERE vref = $wid");
        	} elseif($size == 2) {
        		mysql_query("UPDATE " . TB_PREFIX . "units SET u41 = " . (rand(2000, 4000) * $speed) . ", u42 = " . (rand(3000, 4000) * $speed) . ", u43 = " . (rand(4600, 5600) * $speed) . ", u44 = " . (rand(50, 150) * $speed) . ", u45 = " . (rand(2400, 3800) * $speed) . ", u46 = " . (rand(3000, 4000) * $speed) . ", u47 = " . (rand(1000, 1800) * $speed) . ", u48 = " . (rand(200, 600) * $speed) . " , u49 = " . (rand(2, 10) * $speed) . ", u50 = " . (rand(2, 10) * $speed) . " WHERE vref = " . $wid . "");
        		mysql_query("UPDATE " . TB_PREFIX . "fdata SET f22t = 27, f22 = 10, f28t = 25, f28 = 20, f19t = 23, f19 = 10, f32t = 23, f32 = 10 WHERE vref = $wid");
        	} elseif($size == 3) {
        		mysql_query("UPDATE " . TB_PREFIX . "units SET u41 = " . (rand(4000, 8000) * $speed) . ", u42 = " . (rand(6000, 8000) * $speed) . ", u43 = " . (rand(9200, 11200) * $speed) . ", u44 = " . (rand(100, 300) * $speed) . ", u45 = " . (rand(4800, 7600) * $speed) . ", u46 = " . (rand(6000, 8000) * $speed) . ", u47 = " . (rand(2000, 3600) * $speed) . ", u48 = " . (rand(400, 1200) * $speed) . " , u49 = " . (rand(4, 20) * $speed) . ", u50 = " . (rand(4, 20) * $speed) . " WHERE vref = " . $wid . "");
        		mysql_query("UPDATE " . TB_PREFIX . "fdata SET f22t = 27, f22 = 10, f28t = 25, f28 = 20, f19t = 23, f19 = 10, f32t = 23, f32 = 10 WHERE vref = $wid");
        	}
        }

/**
 * THE ARCHITECTS
 */

        $desc = 'نقشه ساخت به شما آموزش مي دهد كه چگونه در يك دهكده ناتار شگفتي جهان ايجاد كنيد . براي ارتقا تا سطح 50 يك نقشه كافي مي باشد . براي ارتقا از سطح 50 به بعد داشتن نقشه اضافه در اتحاد شما ضروري مي باشد .';
        
        
        $vname = 'نقشه ساخت شگفتی جهان';
        $effect = '';
        for($i > 1; $i < 10; $i++) {
        	Artefact($uid, 1, 1, 'نقشه ساخت ساختمان شگفتی های جهان', '' . $vname . '', '' . $desc . '', '' . $effect . '', 'type1.gif');
        }

header("Location: dorf1.php");