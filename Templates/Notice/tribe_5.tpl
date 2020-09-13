<?php
$start=41;
?>	
<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<td class="role"><div class="boxes boxesColor green"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents"><div class="role">مدافع</div>	</div></div></td>
            <td class="troopHeadline" colspan="<?php if($dataarray[139]){ echo'11'; }else{ echo'10'; } ?>">
            <?php
            if($targettribe=='5'){
            echo '<a href="spieler.php?uid='.$database->getUserField($dataarray[30],"id",0).'">';
            echo "ناتارها";
            echo '</a> از روستای <a href="karte.php?d='.$dataarray[31].'&amp;c='.$generator->getMapCheck($dataarray[31]).'">
            '.stripslashes($dataarray[32]).'</a>';
            } else {
            echo"نیروی کمکی";
            }
            ?>
            </td>
		</tr>
	</thead>
    
    <tbody class="units"><tr>
    <th class="coords"></th>
<?php
for($i=$start;$i<=($start+9);$i++) {
	if($i==($start+9)){ $last = ' last'; }else{ $last = ''; }
	echo "<td class=\"uniticon".$last."\"><img src=\"img/x.gif\" class=\"unit u$i\" title=\"".$technology->getUnitName($i)."\" alt=\"".$technology->getUnitName($i)."\" /></td>";
}
echo "</tr></tbody><tbody class=\"units\"><tr><th>لشکریان</th>";
for($i=129;$i<=138;$i++) {
	if($i==138){ $last = ' last'; }else{ $last = ''; }
	if($dataarray[$i] == 0) {
    	echo "<td class=\"unit none".$last."\">0</td>";
    } else {
    	echo "<td class=\"unit".$last."\">".$dataarray[$i]."</td>";
    }
}
echo "</tr></tbody>";

echo "<tbody class=\"units last\"><th>تلفات</th>";
for($i=139;$i<=148;$i++) {
	if($i==148){ $last = ' last'; }else{ $last = ''; }
	if($dataarray[$i] == 0) {
    	echo "<td class=\"unit none".$last."\">0</td>";
    } else {
    	echo "<td class=\"unit".$last."\">".$dataarray[$i]."</td>";
    }
}
echo "</tr></tbody>";
?>

</table>
