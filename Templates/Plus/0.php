<?php
//V4-Travian
#################################################################################################
#####################################Copy Rights#################################################
#################################################################################################
###																							 ####
###				.:This Fils Has Been Written And Fixed By V4-Travian:. 			 ####
###				.:You DO NOT HAVE Any Right To Remove This Copy Right Notice:.				 ####
###																							 ####
#################################################################################################
####################################Contact Details##############################################
#################################################################################################
###																							 ####
###					Email : 												 ####
###					Y! ID : 														 ####
###					Skype :																 ####
###					Tell  :													 ####
###																							 ####
#################################################################################################
#################################################################################################

if($_POST){
    $golds = $_POST['gold'];
    $other = $_POST['other'];
    $password = md5($_POST['password']);
    $uid = $session->uid;

    $_SESSION['error_transfer_gold_35'] = NULL;
    $_SESSION['error_transfer_gold_less'] = NULL;
    $_SESSION['error_transfer_gold_pass'] = NULL;
    $_SESSION['error_transfer_gold_user'] = NULL;

    $key1=$key2=$key3=$key4=1;
    if($golds <= 35){
        $_SESSION['error_transfer_gold_35'] = 'طلای انتخابی برای انتقال کمتر از 35 می باشد لطفا عدد دیگری انتخاب نمایید';
		$key1 = 0;
		}
    
    if($session->gold < $golds){
        $_SESSION['error_transfer_gold_less'] = 'طلا کافی ندارید';
		$key2 = 0;
	}

    $result = mysql_query("SELECT * FROM s1_users WHERE id = '$uid' AND password = '$password'" ) or die(mysql_error());
    if(!mysql_fetch_assoc($result)){
        $_SESSION['error_transfer_gold_pass'] = 'کلمه عبور انتخابی غلط می باشد';
		$key3 = 0;
	}
    
    $result = mysql_query("SELECT * FROM s1_users WHERE username = '$other'" ) or die(mysql_error());
    if(!mysql_fetch_assoc($result)){
        $_SESSION['error_transfer_gold_user'] = 'این اکانت موجود نمی باشد';
		$key4 = 0;
	}
    if($key1 && $key2 && $key3 && $key4){
        mysql_query("UPDATE ".TB_PREFIX."users SET gold = gold - ".$golds." WHERE id = '".$uid."'");
        mysql_query("UPDATE ".TB_PREFIX."users SET gold = gold + ".$golds." WHERE username = '".$other."'");
//        exit();
    }
    
    header("Location: plus.php?id=0");
                
}                


?>

<div id="silverExchange">
	
	<?php $id = $_SESSION['id']; ?>
        

        
<form action="plus.php?id=0" method="post">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <p>
        <?php
            if($_SESSION['error_transfer_gold_35'])
                echo "<h4 style='color: red; text-align: center;'>{$_SESSION['error_transfer_gold_35']}<h4>";
            if($_SESSION['error_transfer_gold_less'])
                echo "<h4 style='color: red; text-align: center;'>{$_SESSION['error_transfer_gold_less']}<h4>";
            if($_SESSION['error_transfer_gold_pass'])
                echo "<h4 style='color: red; text-align: center;'>{$_SESSION['error_transfer_gold_pass']}<h4>";
            if($_SESSION['error_transfer_gold_user'])
                echo "<h4 style='color: red; text-align: center;'>{$_SESSION['error_transfer_gold_user']}<h4>";
        ?>
        </p>
    
    <h3>انتقال سکه طلا</h3>
<table cellpadding="1" cellspacing="1" class="transparent">
  <tbody>
    <tr>
      <td colspan="2">
در اين قسمت شما قادر به انتقال سکه هاي اکانت خود به اکانت ديگري مي باشيد.
<ul>
<li>
حداکثر به ميزان خريداري شده در اين بازي قادر به انتقال و ذخيره سکه هستيد.
</li>
<li>
حداقل سکه ها براي انتقال 35 سکه است.
</li>
</ul>

      </td>
    </tr>
    <tr>
      <td>تعداد</td>
      <td><input class="text" type="text" name="gold" value="0"></td>
    </tr>
    <tr>
      <td>اکانت</td>
      <td><input class="text" type="text" name="other" value"></td>
    </tr>
    <tr>
      <td>با رمز تايید کنید</td>
      <td><input class="text" type="password" name="password" maxlength="20"></td>
    </tr>
    <tr>
    <td></td>
    <td>
<br />
<button type="submit" value="انتقال"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">انتقال</div></div></button>
    </td>
    </tr>
  </tbody>
</table>

</form>
                
</div>
<script type="text/javascript">
	window.addEvent('domready', function(){
		new Travian.Game.GoldToSilver({
			elementInputGold: 'goldInput',
			elementInputSilver: 'silverInput',
			elementResultGold: 'goldResult',
			elementResultSilver: 'silverResult',
			gold: <?php echo $session->gold; ?>,
			silver: <?php echo $session->silver; ?>,
			rateGoldToSilver: 100,
			rateSilverToGold: 200
		});
	});
</script>
