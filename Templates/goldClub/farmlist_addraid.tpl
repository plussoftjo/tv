<?php
  
  
  $getUnit = $database->getUnit($village->wid);
//echo $session->tribe;
//echo $unit5;
if($session->tribe==1){
	$unit1 = $getUnit['u1'];$unit2 = $getUnit['u2'];$unit3 = $getUnit['u3'];$unit4 = $getUnit['u4'];$unit5 = $getUnit['u5'];
    $unit6 = $getUnit['u6'];$unit7 = $getUnit['u7'];$unit8 = $getUnit['u8'];$unit9 = $getUnit['u9'];$unit10 = $getUnit['u10'];
}elseif($session->tribe==2){
	$unit1 = $getUnit['u11'];$unit2 = $getUnit['u12'];$unit3 = $getUnit['u13'];$unit4 = $getUnit['u14'];$unit5 = $getUnit['u15'];
    $unit6 = $getUnit['u16'];$unit7 = $getUnit['u17'];$unit8 = $getUnit['u18'];$unit9 = $getUnit['u19'];$unit10 = $getUnit['u20'];
}elseif($session->tribe==3){
	$unit1 = $getUnit['u21'];$unit2 = $getUnit['u22'];$unit3 = $getUnit['u23'];$unit4 = $getUnit['u24'];$unit5 = $getUnit['u25'];
    $unit6 = $getUnit['u26'];$unit7 = $getUnit['u27'];$unit8 = $getUnit['u28'];$unit9 = $getUnit['u29'];$unit10 = $getUnit['u30'];
}
  
    
if(isset($_POST['action']) == 'addSlot' && $_POST['lid']) {

$troops = "".$_POST['t1']."+".$_POST['t2']."+".$_POST['t3']."+".$_POST['t4']."+".$_POST['t5']."+".$_POST['t6']."+".$_POST['t7']."+".$_POST['t8']."+".$_POST['t9']."+".$_POST['t10']."";

$cc=explode("+",$troops);
	$checkexist = $database->query_return("SELECT * FROM `".TB_PREFIX."raidlist` WHERE `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'");
    if($_POST['x'] && $_POST['y']){
    	$Wref = $database->getVilWref($_POST['y'], $_POST['x']);
        $type = $database->getVillageType2($Wref);
        $oasistype = $type['oasistype'];
        $vdata = $database->getVillage($Wref);
    }
    if(!empty($checkexist)){
    	$errormsg .= "این مختصات در لیست ثبت شده.";
    }elseif(!$_POST['x'] && !$_POST['y']){
    	$errormsg .= "مختصات را وارد کنید.";
    }elseif(!$_POST['x'] || !$_POST['y']){
    	$errormsg .= "مختصات را صحیح وارد کنید.";
    }elseif($oasistype == 0 && $vdata == 0){
    	$errormsg .= "در این مختصات دهکده ای وجود ندارد.";
    }elseif($cc[0] == 0 && $cc[1] == 0 && $cc[2] == 0 && $cc[3] == 0 && $cc[4] == 0 && $cc[5] == 0 && $cc[6] == 0 && $cc[7] == 0 && $cc[8] == 0 && $cc[9] == 0  ){
     	$errormsg .= "هیچ نیرویی انتخاب نشده.";
    }else{
    
		$Wref = $database->getVilWref($_POST['y'], $_POST['x']);
		$coor = $database->getCoor($village->wid);
			
			function getDistance($coorx1, $coory1, $coorx2, $coory2) {
   				$max = 2 * WORLD_MAX + 1;
   				$x1 = intval($coorx1);
   				$y1 = intval($coory1);
   				$x2 = intval($coorx2);
   				$y2 = intval($coory2);
   				$distanceX = min(abs($x2 - $x1), abs($max - abs($x2 - $x1)));
   				$distanceY = min(abs($y2 - $y1), abs($max - abs($y2 - $y1)));
   				$dist = sqrt(pow($distanceX, 2) + pow($distanceY, 2));
   				return round($dist, 1);
   			}
			
        $distance = getDistance($coor['x'], $coor['y'], $_POST['y'], $_POST['x']);
		         
                
     /*   if($_POST['t1']>$unit1 || $_POST['t2']>$unit2 || $_POST['t3']>$unit3 || $_POST['t4']>$unit4 || $_POST['t5']>$unit5 || $_POST['t6']>$unit6 || $_POST['t7']>$unit7 || $_POST['t8']>$unit8 || $_POST['t9']>$unit9)
        	$errormsg .= "تعداد وارد شده بیشتر از نیرو های موجود است";
        else{*/
		$database->addSlotFarm($_POST['lid'], $Wref, $_POST['x'], $_POST['y'], $distance, $_POST['t1'], $_POST['t2'], $_POST['t3'], $_POST['t4'], $_POST['t5'], $_POST['t6'], $_POST['t7'], $_POST['t8'], $_POST['t9'], $_POST['t10']);
        if($session->tribe==1){
        	$qc="`u1`=`u1`- {$_POST['t1']},`u2`=`u2`- {$_POST['t2']},`u3`=`u3`- {$_POST['t3']},`u5`=`u5`- {$_POST['t5']},`u6`=`u6`- {$_POST['t6']},`u7`=`u7`- {$_POST['t7']},`u8`=`u8`- {$_POST['t8']},`u9`=`u9`- {$_POST['t9']},`u10`=`u10`- {$_POST['t10']}";
        }elseif($session->tribe==2)
        {
        	$qc="`u11`=`u11`- {$_POST['t1']},`u12`=`u12`- {$_POST['t2']},`u13`=`u13`- {$_POST['t3']},`u15`=`u15`- {$_POST['t5']},`u16`=`u16`- {$_POST['t6']},`u17`=`u17`- {$_POST['t7']},`u18`=`u18`- {$_POST['t8']},`u19`=`u19`- {$_POST['t9']},`u20`=`u20`- {$_POST['t10']}";
        }elseif($session->tribe==3)
        {
        	$qc="`u21`=`u21`- {$_POST['t1']},`u22`=`u22`- {$_POST['t2']},`u23`=`u23`- {$_POST['t3']},`u25`=`u25`- {$_POST['t5']},`u26`=`u26`- {$_POST['t6']},`u27`=`u27`- {$_POST['t7']},`u28`=`u28`- {$_POST['t8']},`u29`=`u29`- {$_POST['t9']},`u30`=`u30`- {$_POST['t10']}";
        }
      //  $database->delUnits($qc,$village->wid);
        header("Location: build.php?id=39&t=99");
        
}
}
?>

<script type="text/javascript">
	var targets = {};

	function fillTargets()
	{
		var targetId = $('target_id');

		targetId.empty();

		var option = new Element('option',
		{
			'html': 'دهکده‌ای انتخاب کنید'
		});
		targetId.insert(option);

		$each(targets[lid], function(data)
		{
			var option = new Element('option',
			{
				'value': data.did,
				'html': data.name
			});
			targetId.insert(option);
		});
	}

	function getTargetsByLid()
	{
		var lidSelect = $('lid');
		lid = lidSelect.getSelected()[0].value;

		if (targets[lid])
		{
			fillTargets();
		}
		else
		{
			Travian.ajax(
			{
				data:
				{
					cmd: 'raidListTargets',
					'lid': lid
				},
				onSuccess: function(data)
				{
					targets[data.lid] = data.targets;
					fillTargets();
				}
			});

		}
	}

	function selectCoordinates()
	{
		var targetId = $('target_id');
		var did = targetId.getSelected()[0].value;

		if (did == '')
		{
			$('xCoordInput').value = '';
			$('yCoordInput').value = '';
		}
		else
		{
			var array;
			$each(targets[lid], function(data)
			{
				if (data.did == did)
				{
					array = data;
					return;
				}
			});


			$('xCoordInput').value = array.x;
			$('yCoordInput').value = array.y;
		}
	}

	var lid = <?php echo $_GET['lid']; ?>;targets[lid] = {};

</script>

<div id="raidListSlot">
	<h4>افزودن غارت</h4>
<font color="#FF0000"><b>    
<?php echo $errormsg; ?>
</b></font>
	
	<form action="build.php?id=39&t=99&action=showSlot&lid=<?php echo $_GET['lid']; ?>" method="post">
		<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents cf">
        
		<input type="hidden" name="action" value="addSlot">
		<input type="hidden" name="lid" value="<?php echo $_GET['lid']; ?>">
        
			
			<table cellpadding="1" cellspacing="1" class="transparent">
				<tbody><tr>
					<th>لیست فارم‌ها:</th>
					<td>
						<select onchange="getTargetsByLid();" id="lid" name="lid">
<?php

$sql = mysql_query("SELECT * FROM ".TB_PREFIX."farmlist WHERE owner = $session->uid ORDER BY name ASC");
while($row = mysql_fetch_array($sql)){ 
$lid = $row["id"];
$lname = $row["name"];
$lowner = $row["owner"];
$lwref = $row["wref"];
$lvname = $database->getVillageField($row["wref"], 'name');
	if($_GET['lid']==$lid){
    	$selected = 'selected=""';
        }else{ $selected = ''; }
	echo '<option value="'.$lid.'" '.$selected.'>'.$lvname.' - '.$lname.'</option>';
}
?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>هدفی انتخاب کنید:</th>
					<td class="target">
						
			<div class="coordinatesInput">
				<div class="xCoord">
					<label for="xCoordInput">X:</label>
					<input value="<?php echo $_POST['x']; ?>" name="x" id="xCoordInput" class="text coordinates x ">
				</div>
				<div class="yCoord">
					<label for="yCoordInput">Y:</label>
					<input value="<?php echo $_POST['y']; ?>" name="y" id="yCoordInput" class="text coordinates y ">
				</div>
				<div class="clear"></div>
			</div>
								<div class="targetSelect">
							<label class="lastTargets" for="last_targets">آخرین هدف‌ها:</label>
							<select id="target_id" name="target_id" onchange="selectCoordinates()">
								<option value="">دهکده‌ای انتخاب کنید</option>
							</select>
						</div>
						<div class="clear"></div>
					</td>
				</tr>
			</tbody></table>
			</div>
				</div>
		<?php include "Templates/goldClub/trooplist2.tpl"; ?>

		
<button type="submit" value="ذخیره" name="save" id="save"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">ذخیره</div></div></button>
        
</form>
</div>