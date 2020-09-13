<?php
if(isset($_GET['aid']) && $_GET['aid']==$session->alliance){
	$dataarray = explode(",",$database->getNotice2($_GET['id'], 'data'));
    $topic = $database->getNotice2($_GET['id'], 'topic');
    $time = $database->getNotice2($_GET['id'], 'time');
}else{
	$dataarray = explode(",",$message->readingNotice['data']);
    $topic = $message->readingNotice['topic'];
    $time = $message->readingNotice['time'];
}
?>
				<table cellpadding="1" cellspacing="1" id="report_surround">
				<thead class="theader">
					<tr>
						<th colspan="2">
							<div id="subject">
								<div class="header label"><?php echo REPORT_SUBJECT; ?></div>
								<div class="header text"><?php echo $topic; ?></div>
								<div class="clear"></div>
							</div>

							<div id="time">
                            <?php $date = $generator->procMtime($time); ?>
								<div class="header label"><?php echo REPORT_SENT; ?></div>
								<div class="header text"><?php echo $date[0]."<span> ".REPORT_AT." ".$date[1]; ?></span></div>
                                
                                <div class="toolList">
<?php if($session->plus){ ?>
					<button type="button" value="reportButton delete" class="icon" title="<?php echo REPORT_DEL_BTN; ?>" onclick="return (function(){
				('<?php echo REPORT_DEL_QST; ?>').dialog(
				{
					onOkay: function(dialog, contentElement)
					{
						window.location.href = '?n1=<?php echo $_GET['id']; ?>&amp;del=1'}
				});
				return false;
			})()"><img src="img/x.gif" class="reportButton delete" alt="reportButton delete" /></button>
<?php } ?>
					<div class="clear"></div></div>
                                
                                <div class="clear"></div>
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr><td colspan="2" class="report_content">
			<img src="img/x.gif" class="reportImage reportType1" alt="">
            <table id="attacker" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<td class="role">
            <div class="boxes boxesColor red"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents"><div class="role"><?php echo REPORT_ATTACKER; ?></div></div></div>
            </td>
            <td class="troopHeadline" colspan="11">
            <a href="spieler.php?uid=<?php echo $database->getUserField($dataarray[0],"id",0); ?>"><?php echo $database->getUserField($dataarray[0],"username",0); ?></a> <?php echo REPORT_FROM_VIL; ?> <a href="karte.php?d=<?php echo $dataarray[1]."&amp;c=".$generator->getMapCheck($dataarray[1]); ?>"><?php echo $database->getVillageField($dataarray[1],"name"); ?></a>

<div class="toolList">
<?php if($session->plus){ ?>
<button type="button" value="reportButton warsim" class="icon" title="<?php echo REPORT_WARSIM; ?>" onclick="window.location.href = 'warsim.php?bid=<?php echo $_GET[id]; ?>'; return false;"><img src="img/x.gif" class="reportButton warsim" alt="reportButton warsim" /></button>
<button type="button" value="reportButton repeat" class="icon" title="<?php echo REPORT_ATK_AGAIN; ?>" onclick="window.location.href = 'a2b.php?bid=<?php echo $_GET[id]; ?>'; return false;"><img src="img/x.gif" class="reportButton repeat" alt="reportButton repeat" /></button>
<?php } ?>
<div class="clear"></div></div>

</td></tr></thead>

<tbody class="units last">
<tr><th class="coords"></th>
<?php
$start = $dataarray[2] == 1? 1 : (($dataarray[2] == 2)? 11 : (($dataarray[2] == 3)? 21 : 41));

for($i=$start;$i<=($start+9);$i++) {
	echo "<td class=\"uniticon\"><img src=\"img/x.gif\" class=\"unit u$i\" title=\"".$technology->getUnitName($i)."\" alt=\"".$technology->getUnitName($i)."\" /></td>";
}
echo "<td class=\"uniticon last\"><img src=\"img/x.gif\" class=\"unit uhero\" title=\"".$technology->getUnitName(51)."\" alt=\"".$technology->getUnitName(51)."\" /></td>";
echo "</tr><tr><th>".REPORT_TROOPS."</th>";
for($i=3;$i<=12;$i++) {
	if($dataarray[$i] == 0) {
    	echo "<td class=\"unit none\">0</td>";
    }
    else {
    	echo "<td class=\"unit\">".$dataarray[$i]."</td>";
    }
}
	if($dataarray[13] == 0) {
    	echo "<td class=\"unit none last\">0</td>";
    }
    else {
    	echo "<td class=\"unit last\">".$dataarray[13]."</td>";
    }
echo "</tr></tbody>";
?>
	<tbody><tr><td class="empty" colspan="12"></td></tr></tbody>
    <tbody class="goods"><tr><th><?php echo REPORT_INFORMATION; ?></th><td style="text-align:right" colspan="11">
	<img class="unit itemCategory itemCategory_cage" src="img/x.gif" alt="<?php echo $technology->unarray[$dataarray[155]]; ?>" title="<?php echo $technology->unarray[$dataarray[155]]; ?>" />
	<?php echo $dataarray[24]; ?>
    </td></tr></tbody>


<tbody><tr><td class="empty" colspan="12"></td></tr></tbody>
</table>
<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<td class="role"><div class="boxes boxesColor green"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents"><div class="role">مدافع</div>	</div></div></td>
            <td class="troopHeadline" colspan="10">
            نیروی کمکی
            </td>
		</tr>
	</thead>
    
    <tbody class="units"><tr>
    <th class="coords"></th>
<?php
$start=31;
for($i=$start;$i<=($start+9);$i++) {
	if($i==($start+9) && !$dataarray[116]){ $last = ' last'; }else{ $last = ''; }
	echo "<td class=\"uniticon".$last."\"><img src=\"img/x.gif\" class=\"unit u$i\" title=\"".$technology->getUnitName($i)."\" alt=\"".$technology->getUnitName($i)."\" /></td>";
}
echo "</tr></tbody><tbody class=\"units last\"><tr><th>لشکریان</th>";
for($i=14;$i<=22;$i++) {
	if($dataarray[$i] == 0) {
    	echo "<td class=\"unit none\">0</td>";
    }
    else {
    	echo "<td class=\"unit\">".$dataarray[$i]."</td>";
    }
    
}
if($dataarray[23] == 0) {
    	echo "<td class=\"unit none last\">0</td>";
    }
    else {
    	echo "<td class=\"unit last\">".$dataarray[23]."</td>";
    }
echo "</tr></tbody>";
?>

</table>	
</td></tr></tbody></table>
<div class="clear">&nbsp;</div>