<?php
include("GameEngine/Account.php");
if(isset($_GET['del_cookie'])) {
	setcookie("COOKUSR","",time()-3600*24,"/");
	header("Location: login.php");
}
if(!isset($_COOKIE['COOKUSR'])) {
	$_COOKIE['COOKUSR'] = "";
}
include "Templates/html.tpl";
?>
<body class="v35 activate" onLoad="initCounter()">

<div id="wrapper">
<img id="staticElements" src="img\x.gif" alt="" />
<div class="bodyWrapper">
					
<img style="filter:chroma();" src="img\x.gif" id="msfilter" alt="" />
<div id="header">
<div id="mtop">
<a id="logo" href="../" target="_blank" title="<?php echo SERVER_NAME; ?>"></a>
<div class="clear"></div>
</div>
</div>
<div id="mid">

<div id="side_navi">
	<ul>
		<li>
			<a href="<?php echo HOMEPAGE; ?>" title="<?php echo HOME; ?>"><?php echo HOME; ?></a>
		</li>

		<li>
			<a href="login.php" title="<?php echo LOGIN; ?>"><?php echo LOGIN; ?></a>
		</li>

		<li class="active">
			<a href="anmelden.php" title="<?php echo REG; ?>"><?php echo REG; ?></a>
		</li>

				<li>
			<a href="#" target="_blank" title="<?php echo FORUM; ?>"><?php echo FORUM; ?></a>
		</li>
		
		<li class='support' >
			<a href="contact.php" title="<?php echo SUPPORT; ?>"><?php echo SUPPORT; ?></a>
		</li>
	</ul>
</div>
												<div class="clear"></div>
						<div id="contentOuterContainer">
							<div class="contentTitle">&nbsp;</div>
							<div class="contentContainer">
								<div id="content" class="activate">




<?php
if(!isset($_GET['e']) && !isset($_GET['active']) && !isset($_GET['activemap'])) { ?>
<h1 class="titleInHeader"><?php echo REG; ?></h1>
<script type="text/javascript">
Element.implement({
	 //imgid: falls zu dem link ein pfeil gehört kann dieser "auf/zugeklappt" werden
	 showOrHide: function(imgid) {
		 //einblenden
		 if (this.getStyle('display') == 'none')
		 {
			 if (imgid != '')
			 {
				 $(imgid).className = 'open';
			 }
		 }
		 //ausblenden
		 else
		 {
			 if (imgid != '')
			 {
				 $(imgid).className = 'close';
			 }
		 }
		 this.toggleClass('hide');
	}
});
</script>

<div class="outerLoginBox">

	<h2><?php echo LOGIN_WELCOME; ?></h2>
<noscript>
<div class="noJavaScript"><?php echo LOGIN_NO_JAVASCRIPT; ?></div>
	</noscript>
		<div class="innerLoginBox">
		<?php if(isset($_GET['activecode'])){ ?>
		<br><b>با سلام و تشکر از ثبت نام در سرور ما کد فعال سازی شما <?php if(isset($_GET['activecode'])){ echo $_GET['activecode']; } else{ echo ""; } ?> میباشد.</b><br>
		 <?php } ?>
				<form method="post" name="snd" action="login.php">
					<input type="hidden" name="ft" value="a2" /><br /><br /><br />
						  <b>کد فعالسازي:</b><br />
					  <input class="text" type="text" name="id" maxlength="10" value="<?php if(isset($_GET['activecode'])){ echo $_GET['activecode']; } else{ echo ""; } ?>"/>
                        <button type="submit" value="Send" name="s1" id="btn_send" onclick="document.snd.w.value=screen.width+':'+screen.height;">
       					 <div class="button-container">
                         <div class="button-position">
                         <div class="btl">
                         <div class="btr">
                         <div class="btc"></div></div></div>
                         <div class="bml">
                         <div class="bmr">
                         <div class="bmc"></div></div></div>
                         <div class="bbl">
                         <div class="bbr">
                         <div class="bbc"></div></div></div></div>
       					 <div class="button-contents">اکانت خود را فعال کرده و بازي کنيد</div></div>
        				</button>
                        <input type="hidden" name="ft" value="a2" />
				<br /><br />
					<div class="error"></div>
				
				<br /><br /><br /></form>
                </div>
			<div class="greenbox passwordForgotten">
				<div class="greenbox-top"></div>
				<div class="greenbox-content">
<div class="passwordForgottenLink">
	 	<a onClick="$('showPasswordForgotten').showOrHide('arrow');" href="<?php if(isset($_GET['action'])){ echo'#'; }else{ echo'?action=Noemail'; }?>" class="showPWForgottenLink">
	 		<img class="close" id="arrow" src="img/x.gif"><?php echo "ايميلي دريافت نکرده‌ايد؟"; ?></a>
	 </div>
	 		<div class="showPasswordForgotten <?php if(isset($_GET['action']) && $_GET['action']=='Noemail'){}else{ echo'hide'; }?>" id="showPasswordForgotten">
<?php if(isset($_GET['finish'])){ ?>
<font color="#008000"><?php echo "ايميل براي شما ارسال شد."; ?></font>
<?php }else{ ?>
			 	<form method="POST" action="">
					<input type="hidden" name="noemail" value="1">

<div class="forgotPasswordDescription"><?php echo "		 امکان دارد دليل آن يکي از موارد زير باشد:		<ul>
			<li>آدرس ايميل را اشتباه نوشته‌ايد</li>
			<li>ظرفيت ادرس ايميل شما پر شده است</li>
			<li>دومين را اشتباه وارد کرده‌ايد: براي مثال aol.ir موجود نمي‌باشد و فقط aol.com مي‌تواند باشد.</li>
			<li>ايميل به اشتباه به پوشه‌ي اسپم/جانک/بالک شما انتقال يافته است.</li>
		</ul>"; ?></div>
					<table class="transparent pwForgottenTable" id="pw_forgotten_form" cellpadding="0" cellspacing="0">
						<tbody><tr class="mail">
							<th><?php echo "آدرس ایمیل فعلی"; ?></th>
							<td><input class="text" type="text" name="email" value=""><br><div class="error RTL"><?php echo $form->getError("email"); ?></div>
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td colspan="2">
								<button type="submit" value="<?php echo "رسال ایمیل"; ?>" name="semail" id="s2"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents"><?php echo "رسال ایمیل"; ?></div></div></button>
                                </td>
						</tr>
					</tbody></table>
				</form>
                <?php } ?>
						</div>
				</div>
				<div class="greenbox-bottom"></div>
				<div class="clear"></div>
			</div>		
			<div class="greenbox passwordForgotten">
				<div class="greenbox-top"></div>
				<div class="greenbox-content">
<div class="passwordForgottenLink">
	 	<a onClick="$('showPasswordForgotten').showOrHide('arrow');" href="<?php if(isset($_GET['action1'])){ echo'#'; }else{ echo'?action1=del'; }?>" class="showPWForgottenLink">
	 		<img class="close" id="arrow" src="img/x.gif"><?php echo "حذف ثبت نام؟"; ?></a>
	 </div>
	 		<div class="showPasswordForgotten <?php if(isset($_GET['action1']) && $_GET['action1']=='del'){}else{ echo'hide'; }?>" id="showPasswordForgotten">
<?php if(isset($_GET['finish'])){ ?>
<font color="#008000"><?php echo "ثبت نام حذف شد."; ?></font>
<?php }
else{ include("Templates/activate/delete.tpl"); } ?>
						</div>
				</div>
				<div class="greenbox-bottom"></div>
				<div class="clear"></div>
			</div>	</div>	
<?php
}
if(isset($_GET['active'])) {
	if(($session->uid > 0) && ($session->tribe == 0)) {
?>
<script type="text/javascript">
Element.implement({
	 showOrHide: function(imgid) {
		 //einblenden
		 if (this.getStyle('display') == 'none')
		 {
			 if (imgid != '')
			 {
				 $(imgid).className = 'open';
			 }
		 }
		 //ausblenden
		 else
		 {
			 if (imgid != '')
			 {
				 $(imgid).className = 'close ';
			 }
		 }
		 this.toggleClass('hide');
	}
});
</script>


	<div id="content" class="activate">
		<h1 class="titleInHeader">یک نژاد انتخاب کنید</h1>
<div id="vid">
	<div class="ffBug"></div>
			<div class="greenbox boxVidInfo">
				<div class="greenbox-top"></div>
				<div class="greenbox-content">
				<div>از این که در سرور ما ثبت نام کرد اید متشکریم.</div><br>
					<div class="vidDescription">
						نژاد خود را برای این جهان (سرور) انتخاب کنید.	<br>
اگر به تازگی با TRAVIAN آشنا شده‌اید ما توصیه می‌کنیم گول‌ها را انتخاب کنید.					</div>	
<br>لطفا گزینه مقابل نژاد مورد نظر را انتخاب کنید.
				</div>
				
				<div class="greenbox-bottom"></div>
				<div class="clear"></div>
			</div>
			<div class="boxes boxGrey boxesColor gray">
	<div class="boxes-tl"></div>
	<div class="boxes-tr"></div>
	<div class="boxes-tc"></div>
	<div class="boxes-ml"></div>
	<div class="boxes-mr"></div>
	<div class="boxes-mc"></div>
	<div class="boxes-bl"></div>
	<div class="boxes-br"></div>
	<div class="boxes-bc"></div>
	<div class="boxes-contents cf">		<div class="content">
	
			<form method="POST" action="?activemap=activator">
				<div class="container">
					<div class="vidSelect">
						<div class="kind">
							<div id="vid1" class="vid vid1" ></div>
						</div><br><br>
						<div class="bubble"></div>
						<div class="text">
						<div class="headline">رومی‌ها</div>
						<div class="text">
						<div class="special">خصوصیات:</div>
						<ul>
							<li>زمان کمی نیاز می‌باشد.<br /></li>
							<li>می‌توانند سریع‌تر از بقیه دهکده‌ی خود را وسعت دهند.<br /></li>
							<li>لشکریان قدرتمند ولی گرانبهایی دارند؛ پیاده نظام‌های <br>بسیارقدرتمندی دارند.<br /></li>
							<li>با این نژاد مراحل ابتدایی بازی بسیار سخت می‌باشد و برای <br>بازیکن‌های جدید این نژاد توصیه نمی‌شود.<br /></li>
						</ul>
						</div>
						</div>
<input type="radio"	name="vid" value="1" style="position: absolute; top: 30px; left: 390px;:"/>
<input type="radio"	name="vid" value="2" style="position: absolute; top: 225px; left: 390px;:"/>
<input type="radio"	name="vid" value="3" style="position: absolute; top: 390px; left: 390px;:" checked="checked"/>
<div class="avatar vid1" style="position: absolute; top: -10px; left: 40px;:"></div>	
<div class="kind">
<div id="vid1" class="vid vid2"></div>
</div>
<br><br>
	<div class="bubble"></div>
	<div class="text">
		<div class="headline">توتن‌ها</div>
		<div class="text">
			<div class="special">
				خصوصیات:		</div>

			<ul>
									<li>زمان کافی برای بازیکن‌های مهاجم وجود دارد.<br />
</li>
									<li>لشکریان ارزان آن را می‌توان سریع تربیت کرد و برای جنگیدن<br> و غنیمت گیری خوبهستند.<br />
</li>
									<li>برای بازیکن‌های مهاجم و با تجربه.</li>
							</ul>
		</div>
	</div>
	<div class="avatar vid2" style="position: absolute; top: 150px; left: 40px;:"></div>
	<div class="kind">
<div id="vid2" class="vid vid3"></div>
</div>
<br><br>
	<div class="bubble"></div>
	<div class="text">
		<div class="headline">گول‌ها</div>
		<div class="text">
			<div class="special">
				خصوصیات:			</div>

			<ul>
									<li>زمان کمی نیاز می‌باشد.<br />
</li>
									<li>از همان ابتدای بازی در مقابل جنگیدن و غنیمت گیری دفاع بهتری دارند.<br />
</li>
									<li>سواره نظام‌های عالی و سریع‌ترین نیروها را در بازی دارند.<br />
</li>
									<li>برای بازیکن‌های تازه وارد بهترین انتخاب می‌باشد.</li>
							</ul>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="avatar vid3" style="position: absolute; top: 350px; left: 40px;:"></div>

							
							
						
						<div class="clear"></div>
					</div>
				</div>

				<div class="clear"></div><br><br><br><br><br><br>
				<div class="submitButton">
					<button type="submit" value="" name="" id="submitKind">
	<div class="button-container">
		<div class="button-position">
			<div class="btl">
				<div class="btr">
					<div class="btc"></div>
				</div>
			</div>
			<div class="bml">
				<div class="bmr">
					<div class="bmc"></div>
				</div>
			</div>
			<div class="bbl">
				<div class="bbr">
					<div class="bbc"></div>
				</div>
			</div>
		</div>
		<div class="button-contents">
			ادامه		</div>
	</div>
</button>				</div>
			</form>
		</div>
		</div>
		
</div></div>




	
		<div id="tpixeliframe_loading" style="display: none; z-index: 1000; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; background-color:#000; opacity:0.4; -moz-opacity:0.4; FILTER:progid:DXImageTransform.Microsoft.Alpha(opacity=40);"></div>
		<script type="text/javascript">
	
			var tg_load_handler = function() {
				document.getElementById("tpixeliframe_loading").style.display = "none";
			}
			tg_load_handler.delay(1000);

			window.onload = function() {
				tg_iframe = document.getElementById("tpixeliframe");
				tg_iframe.onload = tg_load_handler;
			}

			document.getElementById("tpixeliframe_loading").style.display = "block";
	
		</script>


</div>

<?php
	}
	else{
		header("Location: dorf1.php");
	}
}
if(isset($_GET['activemap'])) {
	if(isset($_POST['vid'])) {
		if(($_POST['vid'] == 1) || ($_POST['vid'] == 2) || ($_POST['vid'] == 3)){
?>

<div id="content" class="activate">
<h1 class="titleInHeader">موقعیت شروع انتخاب کنید</h1>

<div id="sector">
	<form name="snd" method="POST" action="">
	<input type="hidden" name="uid" value="<?php echo $session->uid; ?>">
	<input type="hidden" name="username" value="<?php echo $session->username; ?>">
	<input type="hidden" name="email" value="<?php echo $session->email; ?>">
	<input type="hidden" name="vid" value="<?php echo $_POST['vid']; ?>">
	<input type="hidden" name="ft" value="a5">
	<div class="ffBug"></div>
			<div class="greenbox boxVidInfo">
				<div class="greenbox-top"></div>
				<div class="greenbox-content">
				<div>
		  شما نژاد  <?php if(isset($_POST['vid'])){
		 
			switch($_POST['vid']){
				case 1:
					echo "روم";
					break;
				case 2:
					echo "توتن";
					break;
				case 3:
					echo "گول";
					break;
		 
			}
		}?>
		<br>
		
		
		را انتخاب کردید. بعد از این <?php if(isset($_POST['vid'])){
		 
			switch($_POST['vid']){
				case 1:
					echo "کوینتوس ";
					break;
				case 2:
					echo "هنریک ";
					break;
				case 3:
					echo "امبیوریکس ";
					break;
		 
			}
		}?> راهنمای 
شما خواهد بود.		</div>

		<div class="changeVid">
			<a href="?active=activator">تغییر نژاد</a>
		</div>
	
				</div>
				<div class="greenbox-bottom"></div>
				<div class="clear"></div>
			</div>
			<div class="boxes boxGrey boxesColor gray">
	<div class="boxes-tl"></div>
	<div class="boxes-tr"></div>
	<div class="boxes-tc"></div>
	<div class="boxes-ml"></div>
	<div class="boxes-mr"></div>
	<div class="boxes-mc"></div>
	<div class="boxes-bl"></div>
	<div class="boxes-br"></div>
	<div class="boxes-bc"></div>
	<div class="boxes-contents cf">	<div class="content">
		<div class="sectorDescription">
			دهکده‌ی خود را اینجا بسازید و یا محل انتخابی را با کلیک روی 
نقشه عوض کنید.		</div>
		<div class="sectorSelect">
				<table cellpadding="1" cellspacing="1" id="sign_select" class="transparent">
			<tbody>
				<tr>
					<td>
						<input class="radio" type="radio" id="positionRandom" name="kid" value="0" checked="checked"  />&nbsp;<label for="positionRandom"><?php echo REGISTER_RANDOM; ?></label>
					</td>
					<td>
						<input class="radio" type="radio" id="positionNW" name="kid" value="4" <?php echo $form->getRadio('kid',4); ?>>&nbsp;<label for="positionNW"><?php echo REGISTER_NW; ?></label>
					</td>
					<td>
						<input class="radio" type="radio" id="positionNE" name="kid" value="3" <?php echo $form->getRadio('kid',3); ?>>&nbsp;<label for="positionNE"><?php echo REGISTER_NE; ?></label>
					</td>
				</tr>
				<tr>
					<td class="pos2">&nbsp;
						
					</td>
					<td>
						<input class="radio" type="radio" id="positionSW" name="kid" value="1" <?php echo $form->getRadio('kid',1); ?>>&nbsp;<label for="positionSW"><?php echo REGISTER_SW; ?></label>
					</td>
					<td>
						<input class="radio" type="radio" id="positionSE" name="kid" value="2" <?php echo $form->getRadio('kid',2); ?>>&nbsp;<label for="positionSE"><?php echo REGISTER_SE; ?></label>
					</td>
				</tr>
			</tbody>
		</table>

<br><br><br><br><br><br><br><br>
			<div class="buttonContainer">
				<button type="submit" value="" name="submitSector" id="submitSector" class="submitSector">
	<div class="button-container">
		<div class="button-position">
			<div class="btl">
				<div class="btr">
					<div class="btc"></div>
				</div>
			</div>
			<div class="bml">
				<div class="bmr">
					<div class="bmc"></div>
				</div>
			</div>
			<div class="bbl">
				<div class="bbr">
					<div class="bbc"></div>
				</div>
			</div>
		</div>
		<div class="button-contents">
			ایجاد دهکده		</div>
	</div>
</button>			</div>
			<div class="clear"></div>
		</div>

		<div class="avatar vid<?php if(isset($_POST['vid'])){
		 
			switch($_POST['vid']){
				case 1:
					echo "1 ";
					break;
				case 2:
					echo "2 ";
					break;
				case 3:
					echo "3 ";
					break;
		 
			}
		}?>"></div>
	</div>
		</div>
</div>	</form>
</div></div>





<?php
	}
	else{
		header("Location: activate.php?active=activator");
	}	
	
	}
	else{
		header("Location: activate.php?active=activator");
	}
}

?>

<div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
</div>
<div class="contentFooter">&nbsp;</div>



</div>
		<div id="side_info">
	<?php if(NEWSBOX1) { ?>
                <div class="news news1">
                <?php include("Templates/News/newsbox1.tpl"); ?>
                </div>
                <?php } ?>
				<?php if(NEWSBOX2) { ?>
                <div class="news news2">
                <?php include("Templates/News/newsbox2.tpl"); ?>
                </div>
               <?php } ?>
            
		</div>
				<?php
				include("Templates/footer.tpl");
				?>
		</div>

<div id="ce"></div>
</div>
</body>
</html>