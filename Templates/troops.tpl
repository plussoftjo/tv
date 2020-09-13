<div class="boxes villageList units"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">
<table id="troops" cellpadding="1" cellspacing="1">
<thead><tr>
	<th colspan="3"><?php echo TROOPS_DORF; ?></th>
</tr></thead><tbody>
<?php

$units = $technology->getUnitList();
if(count($units) == 0) {
	echo "<tr><td>هیچ</td></tr>";
}
else {
	foreach($units as $unit){
    	if($unit['hero']['amt']>0){
            echo "<tr><td class=\"ico\"><a href=\"build.php?id=39\"><img class=\"unit u".$unit['hero']['id']."\" src=\"img/x.gif\" alt=\"".$unit['hero']['name']."\" title=\"".$unit['hero']['name']."\" /></a></td>
            ";	
            echo "<td class=\"num\">".$unit['hero']['amt']."</td><td class=\"un\">".$unit['hero']['name']."</td></tr>";
		}
        for($i=1;$i<=50;$i++){
            if($unit['u'.$i]['amt']>0){
                echo "<tr><td class=\"ico\"><a href=\"build.php?id=39\"><img class=\"unit u".$unit['u'.$i]['id']."\" src=\"img/x.gif\" alt=\"".$unit['u'.$i]['name']."\" title=\"".$unit['u'.$i]['name']."\" /></a></td>
                    ";	
                echo "<td class=\"num\">".$unit['u'.$i]['amt']."</td><td class=\"un\">".$unit['u'.$i]['name']."</td></tr>";
            }
        }
	}
}
?>
            </tbody></table>
            	</div> 
				</div>