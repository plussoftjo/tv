<?php

    $MyGold = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE `username`='".$session->username."'") or die(mysql_error());
    $golds = mysql_fetch_array($MyGold);

if($golds['b1'] <= time()) {
mysql_query("UPDATE ".TB_PREFIX."users set b1 = '0' where `username`='".$session->username."'") or die(mysql_error());
}

if($golds['b2'] <= time()) {
mysql_query("UPDATE ".TB_PREFIX."users set b2 = '0' where `username`='".$session->username."'") or die(mysql_error());
}
if($golds['b3'] <= time()) {
mysql_query("UPDATE ".TB_PREFIX."users set b3 = '0' where `username`='".$session->username."'") or die(mysql_error());
}

if($golds['b4'] <= time()) {
mysql_query("UPDATE ".TB_PREFIX."users set b4 = '0' where `username`='".$session->username."'") or die(mysql_error());
}

include("Templates/Plus/pmenu.tpl");
    $MyGold = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE `username`='".$session->username."'") or die(mysql_error());
    $golds = mysql_fetch_array($MyGold);

        $today = date("mdHi");

if (mysql_num_rows($MyGold)) {
	if($session->gold == 0) {
		echo "<div class=\"boxes boxesColor gray goldBalance\"><div class=\"boxes-tl\"></div><div class=\"boxes-tr\"></div><div class=\"boxes-tc\"></div><div class=\"boxes-ml\"></div><div class=\"boxes-mr\"></div><div class=\"boxes-mc\"></div><div class=\"boxes-bl\"></div><div class=\"boxes-br\"></div><div class=\"boxes-bc\"></div><div class=\"boxes-contents\">در حال حاضر شما <b>هیچ</b> سکه ای ندارید</div></div>";
	} else {
		echo "<div class=\"boxes boxesColor gray goldBalance\"><div class=\"boxes-tl\"></div><div class=\"boxes-tr\"></div><div class=\"boxes-tc\"></div><div class=\"boxes-ml\"></div><div class=\"boxes-mr\"></div><div class=\"boxes-mc\"></div><div class=\"boxes-bl\"></div><div class=\"boxes-br\"></div><div class=\"boxes-bc\"></div><div class=\"boxes-contents\">در حال حاضر شما <b>$session->gold</b> عدد سکۀ طلا  داريد.</div></div>";
	}
}

echo ">";

echo "انتقال به بانک طلا";

echo " </a> | <a href=\"?t=7\"";

if ( $this->selectedTabIndex == 7 )

{

    echo " class=\"selected\"";

}

echo ">";

echo "دریافت طلا از بانک";

echo "</a> | ";

if($this->data['player_type']==PLAYERTYPE_ADMIN){

echo "<a href=\"plus.php?t=5\"";

} else {

echo "<a href=\"plus.php?t=3\"";

}

if($this->data['player_type']==PLAYERTYPE_ADMIN){

if ( $this->selectedTabIndex == 5 )

{

    echo " class=\"selected\"";

}

echo ">";

echo "افزودن طلا";

echo "</a>\r\n | <a href=\"plus.php?t=3\"";

}









if ( $this->selectedTabIndex == 3 )

{

    echo " class=\"selected\"";

}

echo ">";

echo LANGUI_PLUS_T111;

echo "</a>\r\n</div>\r\n";







if ( $this->selectedTabIndex == 0 )

{

    if ( $this->packageIndex < 0 )

    {

        echo "<div id=\"products\">\r\n\t";

        $_c = 0;

        foreach ( $this->GameEngineAccount['plus']['packages'] as $package )

        {

            ++$_c;

            echo "\t<table class=\"product lang_rtl lang_ar\" cellpadding=\"1\" cellspacing=\"1\">\r\n\t\t<thead>\r\n\t\t\t<tr><th>";

            echo $package['name'];

            echo "</th></tr>\r\n\t\t</thead>\r\n        <tbody>\r\n\t\t\t<tr><td class=\"pic\"><a href=\"?id=";

            echo $_c;

            echo "\"><img src=\"assets/default/plus/";

            echo htmlspecialchars( $package['image'] );

            echo "\" style=\"width:100px;height:100px;\" alt=\"";

            echo htmlspecialchars( $package['name'] );

            echo "\"></a></td></tr>\r\n            <tr><td>";

            echo $package['gold'];

            echo "&nbsp;";

            echo LANGUI_PLUS_T6;

            echo "</td></tr>\r\n            <tr><td>";

            echo $package['cost'];

            echo "&nbsp;";

            echo $package['currency'];

            echo "</td></tr>\r\n\t\t\t<tr><td><a href=\"?id=";

            echo $_c;

            echo "\">";

            echo LANGUI_PLUS_T7;

            echo "</a></td></tr>\r\n\t\t</tbody>\r\n\t</table>\r\n\t";

        }

        echo "\t<div class=\"clear\"></div>\r\n</div>\r\n";

    }

    else

    {

        $_c = 0;

        foreach ( $this->GameEngineAccount['plus']['payments'] as $paymentKey => $payment )

        {

            ++$_c;

            echo "<table class=\"rate_details lang_rtl lang_ar\" cellpadding=\"1\" cellspacing=\"1\">\r\n    <thead>\r\n        <tr><th colspan=\"2\">";

            echo $_c.". ".$payment['name'];

            echo "</th></tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class=\"pic\">\r\n\t\t\t\t<img src=\"assets/default/plus/";

            echo htmlspecialchars( $this->GameEngineAccount['plus']['packages'][$this->packageIndex]['image'] );

            echo "\" style=\"width:100px;height:100px;\" alt=\"";

            echo htmlspecialchars( $this->GameEngineAccount['plus']['packages'][$this->packageIndex]['name'] );

            echo "\">\r\n                <div>";

            echo text_period_lang;

            echo ": ";

            echo constant( "payments_".$paymentKey."_period" );

            echo "</div>\r\n            </td>\r\n            <td class=\"desc\">\r\n                ";

            echo constant( "payments_".$paymentKey."_description" );

            echo "<br>\r\n                <a href=\"#\" onclick=\"window. open('payment.php?p=";

            echo $paymentKey;

            echo "&pg=";

            echo $this->packageIndex;

            echo "','tgpay','scrollbars=yes,status=yes,resizable=yes,toolbar=yes,width=800,height=600');return false;\">\r\n                <img src=\"assets/default/plus/";

            echo htmlspecialchars( $payment['image'] );

            echo "\" style=\"width:119px; height:58px;\" alt=\"";

            echo htmlspecialchars( $payment['name'] );

            echo "\"></a><br>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n";

        }

    }

} else if ( $this->selectedTabIndex == 5 && $this->data['player_type']==PLAYERTYPE_ADMIN){

require_once(ADMIN_PATH."ggold.phtml");

} else if ( $this->selectedTabIndex == 6){

require_once(VIEW_PATH."bank1.phtml");

} else if ( $this->selectedTabIndex == 7){

require_once(VIEW_PATH."bank2.phtml");

} else if ( $this->selectedTabIndex == 3 ){

if(isset($_GET['report'])){

?>

<style type="text/css">

.auto-style1 {

	text-align: center;

}

</style>

</head>



<body>

<div align="left"><a href="plus.php?t=<?php echo $this->selectedTabIndex; ?>"> » بازگشت </a> </div> 



	<?php

	$pid = $this->player->playerId;



	$rs = mysql_query("SELECT * FROM `p_gold_moved` WHERE `player_id`='$pid' ORDER BY date ASC");

	$rn = mysql_num_rows($rs);

	if($rn == 0){

	?>

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

	<thead><th colspan="2" class="auto-style3">گزارشات</thead><p class="custDir">

	<tr>

	<td class="auto-style1">شما انتقالی نداشته اید.</td>

	</tr>

	</table>

    <?php

	} else {

	?>

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

	<thead><th colspan="6" class="auto-style3">انتقال ها</thead><p class="custDir">

	<tr>

		<td class="auto-style1">ردیف</td>

		<td class="auto-style1">مقدار طلا</td>

		<td class="auto-style1">نام اکانت شما</td>

		<td class="auto-style1">نام اکانت مقصد</td>

		<td class="auto-style1">کد رهگیری</td>

		<td class="auto-style1">تاریخ و زمان</td>

	</tr>

	<?php

	$i = 0;

	

	while(($rfs = mysql_fetch_array($rs))){

	$i++;

	$ud = $rfs['player_id'];

	$us = $rfs['to_player_id'];

$res1 = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`id` = '$ud'");

$res2 = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`id` = '$us'");

$row1 = mysql_fetch_array($res1);

$row2 = mysql_fetch_array($res2);



	?>

	<tr>

		<td class="auto-style1"><?php echo $i; ?></td>

		<td class="auto-style1"><?php echo $rfs['gold_count']; ?></td>

		<td class="auto-style1"><?php echo $row1['name']; ?></td>

		<td class="auto-style1"><?php echo $row2['name']; ?></td>

		<td class="auto-style1"><?php echo $rfs['configuration_key']; ?></td>

		<td class="auto-style1"><?php echo $rfs['date']; ?></td>

	</tr>



<?php

}

?>

</table>

<?php

}

} else {

$limit = $this->GameEngineAccount['move']['pop'];

$m     = $this->GameEngineAccount['move']['cc'];

if($limit==''){

exit('error');

}

if($m == 0){

exit("error");

} elseif($m == 100){

exit("error");

}



?>

<div align="left"><a href="plus.php?t=<?php echo $this->selectedTabIndex; ?>&report"> گزارش انتقال ها </a> </div>

<style type="text/css">

.auto-style1 {

	text-align: center;

}

.auto-style3 {

	text-align: center;

}

</style>



<?php

if($this->data['total_people_count'] >= $limit){

?>

<?php

if($this->data['gold_num'] == 0) {

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">انتقال طلا</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>شما طلایی برای انتقال ندارید</b></td>

</tr>

</p>

</table>

</div>

<?php

} else {

?>



<p class="auto-style1">

<form method="post">

<div class="auto-style1">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

	<thead><th colspan="2" class="auto-style3">انتقال طلا</thead><p class="custDir">

<div align="center"><b><font color="red">توجه : <?php echo $m; ?> درصد کارمزد گرفته خواهد شد.</font></b></div><br>

<div align="center"><b><font color="red">مقدار طلا نباید کمتر از 50 باشد</font></b></div><br>



<tr>

<td class="auto-style3">مقدار طلای شما :</td>

<td class="auto-style3">شما <?php echo $this->data['gold_num']; ?> طلا دارید</td>

</tr>

<tr>

<td class="auto-style3">نام اکانت شما :</td>

<td class="auto-style3">

<?php

$sgs = $this->player->playerId;

$c = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`id`='$sgs'");

$c = mysql_fetch_array($c);

?>

<input name="<?php echo $this->player->playerId; ?>" type="text" disabled="disabled" value="<?php echo $c['name'];?>">

&nbsp;</td>

</tr>

<tr>

<td class="auto-style3">نام اکانت مقصد :</td>

<td class="auto-style3">

<input name="to" type="text" value="<?php echo $_POST['to'];?>">

&nbsp;</td>

</tr>

<tr>

<td class="auto-style3">مقدار طلا :</td>

<td class="auto-style3">

<input name="gold" type="text" value="" id="number" onkeyup="amounting(this.value);" onkeypress="amounting(this.value);" onkeydown="amounting(this.value);">

&nbsp;</td>

</tr>

</table>

<div class="auto-style3">

<input name="move" type="submit" value="انتقال">

</div>

</div>

</form>

<?php

if(isset($_POST['move']) && $this->banned==0 && $this->wasrest==0 & !$this->isGameTransientStopped () & !$this->isGameOver() && $_POST['gold'] > 49){

$ggj = (int) trim($_POST['gold']);

if($ggj < 49){

exit("ONLY KEYS UP TO 50");

}



if(empty($_POST['to']) or empty($_POST['gold'])){

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<?php

}

if(empty($_POST['to'])){

?>

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>هدف مشخص نشده است.</b></td>

</tr>

<?php

}

if(empty($_POST['gold'])){

?>

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>مقدار طلا وارد نشده است.</b></td>

</tr>

<?php

}

if(empty($_POST['to']) or empty($_POST['gold'])){

?>

</p>

</table>

</div>

<?php

}

if($this->data['gold_num'] == 0) {

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">انتقال طلا</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>شما طلایی برای انتقال ندارید</b></td>

</tr>

</p>

</table>

</div>

<?php

}

if(!empty($_POST['gold']) and !empty($_POST['to']) and $this->data['total_people_count'] >= $limit and $this->data['gold_num'] >= $_POST['gold_num'] & trim($_POST['to']) != $c['name'] && $this->banned==0 && $this->wasrest==0){

$Gold = trim($_POST['gold']);

$Play = trim($_POST['to']);

$Gold = round($Gold);

$Gold = preg_replace('#[^0-9]#i', '', $Gold); // Filter out everything, except numbers

$m = preg_replace('#[^0-9]#i', '', $m); // Filter out everything, except numbers

if(empty($m)){

$m = 100;

}

$m = (((($Gold * $m) / 100)));

$ngold = (($Gold) - ($m));

$ngold = round($ngold);

$gold_new = $ngold;

if($this->data['gold_num'] >= $Gold){

$Check_player = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`name` = '$Play'");

$row = mysql_fetch_array($Check_player);

$num = mysql_num_rows($Check_player);

if($num == 0){

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>بازیکنی با این نام وجود ندارد.</b></td>

</tr>

</p>

</table>

</div>

<?php

} elseif($row['is_blocked'] == 1) {

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>این بازیکن بازداشت شده است.</b></td>

</tr>

</p>

</table>

</div>

<?php

} elseif($num == 1 & $row['is_blocked'] != 1 & $row['name'] != $c['name'] && $this->banned==0 && $this->wasrest==0){

$id = $this->player->playerId;

$to = $row['id'];

if($num == 1 & $row['is_blocked'] != 1 & $this->data['gold_num'] >= $Gold & $this->data['total_people_count'] >= $limit){

$q1 = mysql_query("UPDATE `p_players` SET `gold_num` = `gold_num` - '$Gold' WHERE `p_players`.`id` = '$id'") or die(mysql_error());

$q2 = mysql_query("UPDATE `p_players` SET `gold_num` = `gold_num` + '$gold_new' WHERE `p_players`.`id` = '$to'") or die(mysql_error());

}

if($q1 & $q2){

$res1 = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`id` = '$id'");

$res2 = mysql_query("SELECT * FROM `p_players` WHERE `p_players`.`id` = '$to'");

$row1 = mysql_fetch_array($res1);

$row2 = mysql_fetch_array($res2);

$res3 = mysql_query("SELECT * FROM `p_gold_moved`");

while($row3=mysql_fetch_array($res3)){

$id = $row3['id'];

}$id++;

$new_gold_num1 = $row1['gold_num'];

$new_gold_num2 = $row2['gold_num'];

$date = date('Y-m-d H:i:s');

$gold_count = $Gold;

$ppid = $this->player->playerId;

$configuration_key = (md5(base64_encode(crypt(time()))));

$sec = rand(5,7);

$str = strlen($configuration_key)-($sec+1);

$random = rand(1,$str);

$configuration_key = substr(md5($configuration_key),$random,$sec);

$q = "INSERT INTO `p_gold_moved` (`player_id`, `to_player_id`, `gold_count`, `new_gold_num1`, `new_gold_num2`, `date`, `configuration_key`) VALUES ('$ppid', '$to', '$gold_count', '$new_gold_num1', '$new_gold_num2', '$date', '$configuration_key');";

$q = mysql_query($q);



?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>طلای شما با موفقیت انتقال داده شد <br> کد رهگیری شما : <?php echo $configuration_key; ?></b></td>

</tr>

</p>

</table>

</div>

<?php

}

}

} else {

?>

<div class="auto-style3">

<table id="plus_features" class="features" cellpadding="1" cellspacing="1">

<thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3"><b>طلای کافی ندارید</b></td>

</tr>

</p>

</table>

</div>

<?php

}

}

} elseif($this->isPost()) {

echo "<centeR><b>Only Keys Up To 50</b></center>";

}

}

} else {

?>

<table id="plus_features" class="features" cellpadding="1" cellspacing="1"><p class="custDir"><thead>

<th colspan="2" class="auto-style3">پیام سیستم</thead><p class="custDir">

<tr>

<td class="auto-style3">پیام سیستم :</td>

<td class="auto-style3">جمعیت شما کافی نیست حداقل جمعیت <?php echo $limit; ?> است.</td>

</tr>

</p>

</table>





                    






		



	
<div id="ce"></div>
</div>
</body>
</html>
