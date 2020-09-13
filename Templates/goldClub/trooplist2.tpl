<?php
  $getUnit = $database->getUnit($village->wid);
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

if($session->tribe == 1){
?>
<div class="troops">
				<div class="troopGroup">
					<label for="t1"><img class="unit u1" title="<?php echo U1." ($unit1)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t1" type="text" name="t1" value="0">
				</div>
				<div class="troopGroup">
					<label for="t2"><img class="unit u2" title="<?php echo U2." ($unit2)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t2" type="text" name="t2" value="0">
				</div>
				<div class="troopGroup">
					<label for="t3"><img class="unit u3" title="<?php echo U3." ($unit3)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t3" type="text" name="t3" value="0">
				</div>
				<div class="troopGroup">
					<label for="t4"><img class="unit u4" title="<?php echo U4." ($unit4)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t4" type="text" value="0" disabled="disabled">
				</div>
				<div class="troopGroup">
					<label for="t5"><img class="unit u5" title="<?php echo U5." ($unit5)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t5" type="text" name="t5" value="0">
				</div>
				<div class="clear"></div>
				<div class="troopGroup">
					<label for="t6"><img class="unit u6" title="<?php echo U6." ($unit6)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t6" type="text" name="t6" value="0">
				</div>
				<div class="troopGroup">
					<label for="t7"><img class="unit u7" title="<?php echo U7." ($unit7)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t7" type="text" name="t7" value="0">
				</div>
				<div class="troopGroup">
					<label for="t8"><img class="unit u8" title="<?php echo U8." ($unit8)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t8" type="text" name="t8" value="0">
				</div>
				<div class="troopGroup">
					<label for="t9"><img class="unit u9" title="<?php echo U9." ($unit9)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t9" type="text" name="t9" value="0">
				</div>
				<div class="troopGroup">
					<label for="t10"><img class="unit u10" title="<?php echo U10." ($unit10)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t10" type="text" name="t10" value="0">
				</div>
			
						<div class="clear"></div>
		</div>
<?php }elseif($session->tribe == 2){ ?>
<div class="troops">
				<div class="troopGroup">
					<label for="t1"><img class="unit u11" title="<?php echo U11." ($unit1)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t1" type="text" name="t1" value="0">
				</div>
				<div class="troopGroup">
					<label for="t2"><img class="unit u12" title="<?php echo U12." ($unit2)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t2" type="text" name="t2" value="0">
				</div>
				<div class="troopGroup">
					<label for="t3"><img class="unit u13" title="<?php echo U13." ($unit3)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t3" type="text" name="t3" value="0">
				</div>
				<div class="troopGroup">
					<label for="t4"><img class="unit u14" title="<?php echo U14." ($unit4)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t4" type="text" value="0" disabled="disabled">
				</div>
				<div class="troopGroup">
					<label for="t5"><img class="unit u15" title="<?php echo U15." ($unit5)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t5" type="text" name="t5" value="0">
				</div>
				<div class="clear"></div>
				<div class="troopGroup">
					<label for="t6"><img class="unit u16" title="<?php echo U16." ($unit6)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t6" type="text" name="t6" value="0">
				</div>
				<div class="troopGroup">
					<label for="t7"><img class="unit u17" title="<?php echo U17." ($unit7)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t7" type="text" name="t7" value="0">
				</div>
				<div class="troopGroup">
					<label for="t8"><img class="unit u18" title="<?php echo U18." ($unit8)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t8" type="text" name="t8" value="0">
				</div>
				<div class="troopGroup">
					<label for="t9"><img class="unit u19" title="<?php echo U19." ($unit9)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t9" type="text" name="t9" value="0">
				</div>
				<div class="troopGroup">
					<label for="t10"><img class="unit u20" title="<?php echo U20." ($unit10)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t10" type="text" name="t10" value="0">
				</div>
			
						<div class="clear"></div>
		</div>
<?php }elseif($session->tribe == 3){ ?>
<div class="troops">
				<div class="troopGroup">
					<label for="t1"><img class="unit u21" title="<?php echo U21." ($unit1)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t1" type="text" name="t1" value="0">
				</div>
				<div class="troopGroup">
					<label for="t2"><img class="unit u22" title="<?php echo U22." ($unit2)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t2" type="text" name="t2" value="0">
				</div>
				<div class="troopGroup">
					<label for="t3"><img class="unit u23" title="<?php echo U23." ($unit3)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t3" type="text" name="t3" value="0" disabled="disabled">
				</div>
				<div class="troopGroup">
					<label for="t4"><img class="unit u24" title="<?php echo U24." ($unit4)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t4" type="text" name="t4" value="0">
				</div>
				<div class="troopGroup">
					<label for="t5"><img class="unit u25" title="<?php echo U25." ($unit5)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t5" type="text" name="t5" value="0">
				</div>
				<div class="clear"></div>
				<div class="troopGroup">
					<label for="t6"><img class="unit u26" title="<?php echo U26." ($unit6)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t6" type="text" name="t6" value="0">
				</div>
				<div class="troopGroup">
					<label for="t7"><img class="unit u27" title="<?php echo U27." ($unit7)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t7" type="text" name="t7" value="0">
				</div>
				<div class="troopGroup">
					<label for="t8"><img class="unit u28" title="<?php echo U28." ($unit8)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t8" type="text" name="t8" value="0">
				</div>
				<div class="troopGroup">
					<label for="t9"><img class="unit u29" title="<?php echo U29." ($unit9)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t9" type="text" name="t9" value="0">
				</div>
				<div class="troopGroup">
					<label for="t10"><img class="unit u30" title="<?php echo U30." ($unit10)"; ?>" src="img/x.gif"></label>
					<input class="text troop" id="t10" type="text" name="t10" value="0">
				</div>
			
						<div class="clear"></div>
		</div>
<?php } ?>