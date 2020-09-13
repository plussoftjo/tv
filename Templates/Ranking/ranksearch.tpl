<?php
if(!isset($_GET['tid'])){ $_GET['tid']='1'; }
?>
<div id="search_navi">
	<form method="post" action="statistiken.php?tid=<?php echo isset($_GET['tid'])? $_GET['tid'] : 1; ?>">
		<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">
            <table class="transparent">
                <tbody><tr>
                    <td>
                        <span>رتبه <input type="text" class="text ra" maxlength="5" name="rank" value="<?php echo $myrank; ?>" /></span>
                    </td>
                    <td>
                        <span>یا نام: <input type="text" class="text name" maxlength="20" name="name" value="<?php if(!is_numeric($search)) {echo $search; } ?>" /></span>
                    </td>
                    <td>
                        <input type="hidden" name="ft" value="r<?php echo isset($_GET['tid'])? $_GET['tid'] : 1; ?>" />
                        <button type="submit" value="submit" name="submit" id="btn_ok" class="dynamic_img" src="img/x.gif">
            <div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">تایید</div></div></button>
                    </td>
                </tr>
                </tbody>
            </table>
		</div>
		</div>
	</form>
<div class="paginator"><?php echo $paginationDisplay; ?></div>
</div>
<div class="clear">&nbsp;</div>