<h1 class="titleInHeader">قصر <span class="level">سطح <?php echo $village->resarray['f'.$id]; ?></span></h1>
<div id="build" class="gid26">
<div class="build_desc">
	<a href="#" onClick="return Travian.Game.iPopup(26,4, 'gid');" class="build_logo"> 
    <img class="building big white g26" src="img/x.gif" alt="قصر" title="قصر" /> </a>
	در قصر شاه و ملکه امپراطوری زندگی می کنند. شما در کل امپراطوری فقط یک قصر می توانید داشته باشید. فقط دهکده ای که قصر شما در آن است را می توانید به پایتخت خود تبدیل کنید (شما نمی توانید در یک دهکده قصر و اقامتگاه را با هم داشته باشید).</div>

<?php 
include("upgrade.tpl");
include("26_menu.tpl"); 
?>
<h4>دهکده های بنا یا تسخیر شده توسط این دهکده</h4>

<table cellpadding="1" cellspacing="1" id="expansion">
<thead>
<tr>
	<td colspan="2">دهکده</td>
	<td>بازیکن</td>
	<td>جمعیت</td>
	<td>مختصات</td>
	<td>تاریخ</td>
</tr></thead>
<tbody>
<?php
$slot1 = $database->getVillageField($village->wid, 'exp1');
$slot2 = $database->getVillageField($village->wid, 'exp2');
$slot3 = $database->getVillageField($village->wid, 'exp3');

if($slot1 != 0 || $slot2 != 0 || $slot3 != 0){
	for($i=1; $i <= 3; $i++){
		if (${'slot'.$i}<>0) {
			$coor = $database->getCoor(${'slot'.$i});
			$vname = $database->getVillageField(${'slot'.$i},'name');
			$owner = $database->getVillageField(${'slot'.$i},'owner');
			$pop = $database->getVillageField(${'slot'.$i},'pop');
			$vcreated = $database->getVillageField(${'slot'.$i},'created');
			$ownername = $database->getUserField($owner,'username',0);
echo '
<tr class="hover">
<td class="ra">'.$i.'.</td>
<td class="vil"><a href="karte.php?d='.${'slot'.$i}.'&c='.$generator->getMapCheck(${'slot'.$i}).'">'.$vname.'</a></td>
<td class="pla"><center><a href="spieler.php?uid='.$owner.'">'.$ownername.'</a></center></td>
<td class="ha"><center>'.$pop.'</center></td>
<td class="aligned_coords"><center><a href="karte.php?d='.${'slot'.$i}.'&c='.$generator->getMapCheck(${'slot'.$i}).'">('.$coor['x'].'|'.$coor['y'].')</center></a></td>
<td class="dat"><center>'.date('d/m/Y',$vcreated).'</center></td>
</tr>';
		}
	}
}
else{
echo '<tr><td colspan="6" class="none">هیچ دهکدۀ دیگری توسط این دهکده تسخیر و یا بنا نشده است.</td></tr>';
}
?>
</tbody></table></div>
