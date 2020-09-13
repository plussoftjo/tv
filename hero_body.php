<?php 
include("GameEngine/Database/connection.php");
include("GameEngine/config.php");
function HeroFace($uid){
	$q = "SELECT * FROM " . TB_PREFIX . "heroface WHERE uid = ".$uid."";
	$result = mysql_query($q);
	return mysql_fetch_array($result);
}
function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){ 
				if(!isset($pct)){ 
					return false; 
				} 
				$pct /= 100; 
				// Get image width and height 
				$w = imagesx( $src_im ); 
				$h = imagesy( $src_im ); 
				// Turn alpha blending off 
				imagealphablending( $src_im, false ); 
				// Find the most opaque pixel in the image (the one with the smallest alpha value) 
				$minalpha = 127; 
				for( $x = 0; $x < $w; $x++ ) 
				for( $y = 0; $y < $h; $y++ ){ 
					$alpha = ( imagecolorat( $src_im, $x, $y ) >> 24 ) & 0xFF; 
					if( $alpha < $minalpha ){ 
						$minalpha = $alpha; 
					} 
				} 
				//loop through image pixels and modify alpha for each 
				for( $x = 0; $x < $w; $x++ ){ 
					for( $y = 0; $y < $h; $y++ ){ 
						//get current alpha value (represents the TANSPARENCY!) 
						$colorxy = imagecolorat( $src_im, $x, $y ); 
						$alpha = ( $colorxy >> 24 ) & 0xFF; 
						//calculate new alpha 
						if( $minalpha !== 127 ){ 
							$alpha = 127 + 127 * $pct * ( $alpha - 127 ) / ( 127 - $minalpha ); 
						} else { 
							$alpha += 127 * $pct; 
						} 
						//get the color index with new alpha 
						$alphacolorxy = imagecolorallocatealpha( $src_im, ( $colorxy >> 16 ) & 0xFF, ( $colorxy >> 8 ) & 0xFF, $colorxy & 0xFF, $alpha ); 
						//set pixel with the new color + opacity 
						if( !imagesetpixel( $src_im, $x, $y, $alphacolorxy ) ){ 
							return false; 
						} 
					} 
				} 
				// The image copy 
				imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h); 
			} 
if(isset($_GET['uid'])){
    $uid =  $_GET['uid'];
} else {
    $uid = "1";
}
if(isset($_GET['size'])){
	if($_GET['size']=='profile'){
    	$size =  '160x205';
		$fsize = '31x40';
		$w = 79;
		$h = 18;
	}elseif($_GET['size']=='inventory'){
    	$size =  '330x422';
		$fsize = '64x82';
		$w = 163;
		$h = 37;
	}
} else {
    $size = "330x422";
	$fsize = '64x82';
	$w = 163;
	$h = 37;
}
$herodetail = HeroFace($uid);
if($herodetail['color']==0){
	$color = "black";
}
if($herodetail['color']==1){
	$color = "brown";
}
if($herodetail['color']==2){
	$color = "darkbrown";
}
if($herodetail['color']==3){
	$color = "yellow";
}
if($herodetail['color']==4){
	$color = "red";
}
$geteye = $herodetail['eye'];
$geteyebrow = $herodetail['eyebrow'];
$getnose = $herodetail['nose'];
$getear = $herodetail['ear'];
$getmouth = $herodetail['mouth'];
$getbeard = $herodetail['beard'];
$gethair = $herodetail['hair'];
$getface = $herodetail['face'];

$getfoot = $herodetail['foot'];
$gethelmet = $herodetail['helmet'];
$gethorse = $herodetail['horse'];
$getleftHand = $herodetail['leftHand'];
$getrightHand = $herodetail['rightHand'];

// HERO FACE:
$face0 = imagecreatefrompng('img/hero/head/'.$fsize.'/face0.png');
$face = imagecreatefrompng('img/hero/head/'.$fsize.'/face/face'.$getface.'.png');
$ear = imagecreatefrompng('img/hero/head/'.$fsize.'/ear/ear'.$getear.'.png');
$eye = imagecreatefrompng('img/hero/head/'.$fsize.'/eye/eye'.$geteye.'.png');
$eyebrow = imagecreatefrompng('img/hero/head/'.$fsize.'/eyebrow/eyebrow'.$geteyebrow.'-'.$color.'.png');
if($gethair!=5){
$hair = imagecreatefrompng('img/hero/head/'.$fsize.'/hair/hair'.$gethair.'-'.$color.'.png');
}
$mouth = imagecreatefrompng('img/hero/head/'.$fsize.'/mouth/mouth'.$getmouth.'.png');
$nose = imagecreatefrompng('img/hero/head/'.$fsize.'/nose/nose'.$getnose.'.png');
if($getbeard!=5){
$beard = imagecreatefrompng('img/hero/head/'.$fsize.'/beard/beard'.$getbeard.'-'.$color.'.png');
}


		if($gethelmet>=1 && $gethelmet<=3){
			$helmet = 1;
		}elseif($gethelmet>=4 && $gethelmet<=6){
			$helmet = 2;
		}elseif($gethelmet>=7 && $gethelmet<=9){
			$helmet = 3;
		}elseif($gethelmet>=10 && $gethelmet<=12){
			$helmet = 4;
		}elseif($gethelmet>=13 && $gethelmet<=15){
			$helmet = 5;
		}
		
		if($getfoot>=94 && $getfoot<=96){
			$shoes = 1;
		}elseif($getfoot>=97 && $getfoot<=99){
			$shoes = 2;
		}elseif($getfoot>=100 && $getfoot<=102){
			$shoes = 3;
		}
		
		if($getleftHand==0){
			$leftHand = 'leftHand';
		}elseif($getleftHand>=61 && $getleftHand<=63){
			$leftHand = 'map0';
		}elseif($getleftHand>=64 && $getleftHand<=66){
			$leftHand = 'flag0';
		}elseif($getleftHand>=67 && $getleftHand<=69){
			$leftHand = 'flag1';
		}elseif($getleftHand>=73 && $getleftHand<=75){
			$leftHand = 'sack0';
		}elseif($getleftHand>=76 && $getleftHand<=78){
			$leftHand = 'shield0';
		}elseif($getleftHand>=79 && $getleftHand<=81){
			$leftHand = 'horn0';
		}
		
		if($getrightHand==0){
			$rightHand = 'rightHand';
		}elseif($getrightHand>=16 && $getrightHand<=18){
			$rightHand = 'sword0';
		}elseif($getrightHand>=19 && $getrightHand<=21){
			$rightHand = 'sword1';
		}elseif($getrightHand>=22 && $getrightHand<=24){
			$rightHand = 'sword2';
		}elseif($getrightHand>=25 && $getrightHand<=27){
			$rightHand = 'sword3';
		}elseif($getrightHand>=28 && $getrightHand<=30){
			$rightHand = 'lance0';
		}elseif($getrightHand>=31 && $getrightHand<=33){
			$rightHand = 'spear0';
		}elseif($getrightHand>=34 && $getrightHand<=36){
			$rightHand = 'sword4';
		}elseif($getrightHand>=37 && $getrightHand<=39){
			$rightHand = 'bow0';
		}elseif($getrightHand>=40 && $getrightHand<=42){
			$rightHand = 'staff0';
		}elseif($getrightHand>=43 && $getrightHand<=45){
			$rightHand = 'spear1';
		}elseif($getrightHand>=46 && $getrightHand<=48){
			$rightHand = 'club0';
		}elseif($getrightHand>=49 && $getrightHand<=51){
			$rightHand = 'spear2';
		}elseif($getrightHand>=52 && $getrightHand<=54){
			$rightHand = 'axe0';
		}elseif($getrightHand>=55 && $getrightHand<=57){
			$rightHand = 'hammer0';
		}elseif($getrightHand>=58 && $getrightHand<=60){
			$rightHand = 'sword5';
		}
		
		$getbody0 = mysql_fetch_array(mysql_query("SELECT * FROM ".TB_PREFIX."heroinventory WHERE uid = ".$uid));
		$getbody0 = $getbody0['body'];
		$getarmor = mysql_fetch_array(mysql_query("SELECT * FROM ".TB_PREFIX."heroitems WHERE id = ".$getbody0));
		$getarmor = $getarmor['type'];
		
		if($getarmor>=82 && $getarmor<=84){
			$armor = 'armor0';
		}elseif($getarmor>=85 && $getarmor<=87){
			$armor = 'armor3';
		}elseif($getarmor>=88 && $getarmor<=90){
			$armor = 'armor1';
		}elseif($getarmor>=91 && $getarmor<=93){
			$armor = 'armor2';
		}
		
		
// HERO BODY: 
$body = imagecreatefrompng('img/hero/body/'.$size.'/hero_body0.png'); 
$leftHand = imagecreatefrompng('img/hero/body/'.$size.'/'.$leftHand.'.png'); 
$rightHand = imagecreatefrompng('img/hero/body/'.$size.'/'.$rightHand.'.png');
if($getbody0){
	$armor = imagecreatefrompng('img/hero/body/'.$size.'/'.$armor.'.png'); 
}
if($gethelmet!=0){
	$helmet = imagecreatefrompng('img/hero/body/'.$size.'/helmet'.$helmet.'.png'); 
}
if($getfoot!=0){
	$shoes = imagecreatefrompng('img/hero/body/'.$size.'/shoes'.$shoes.'.png'); 
}
if($gethorse!=0){
	$horse = imagecreatefrompng('img/hero/body/'.$size.'/horse0.png'); 
}



imagecopymerge_alpha($body, $face0, $w, $h, 0, 0, imagesx($face0), imagesy($face0),100); 
imagecopymerge_alpha($body, $face, $w, $h, 0, 0, imagesx($face), imagesy($face),100); 
imagecopymerge_alpha($body, $ear, $w, $h, 0, 0, imagesx($ear), imagesy($ear),100);
imagecopymerge_alpha($body, $eye, $w, $h, 0, 0, imagesx($eye), imagesy($eye),100);
imagecopymerge_alpha($body, $eyebrow, $w, $h, 0, 0, imagesx($eyebrow), imagesy($eyebrow),100);
if($gethair!=5){
	imagecopymerge_alpha($body, $hair, $w, $h, 0, 0, imagesx($hair), imagesy($hair),100);
}
imagecopymerge_alpha($body, $mouth, $w, $h, 0, 0, imagesx($mouth), imagesy($mouth),100);
imagecopymerge_alpha($body, $nose, $w, $h, 0, 0, imagesx($nose), imagesy($nose),100);
if($getbeard!=5){
	imagecopymerge_alpha($body, $beard, $w, $h, 0, 0, imagesx($beard), imagesy($beard),100);
}





if($gethorse!=0){
	imagecopymerge_alpha($body, $horse, 0, 0, 0, 0, imagesx($horse), imagesy($horse),100); 
}
if($getfoot!=0){
	imagecopymerge_alpha($body, $shoes, 0, 0, 0, 0, imagesx($shoes), imagesy($shoes),100); 
}
if($getbody0){
	imagecopymerge_alpha($body, $armor, 0, 0, 0, 0, imagesx($armor), imagesy($armor),100); 
}
imagecopymerge_alpha($body, $rightHand, 0, 0, 0, 0, imagesx($rightHand), imagesy($rightHand),100); 
imagecopymerge_alpha($body, $leftHand, 0, 0, 0, 0, imagesx($leftHand), imagesy($leftHand),100); 

if($gethelmet!=0){
	imagecopymerge_alpha($body, $helmet, 0, 0, 0, 0, imagesx($helmet), imagesy($helmet),100); 
}


// OUTPUT IMAGE: 
header("Content-Type: image/png"); 
imagesavealpha($body, true); 
imagepng($body, NULL); 
?>