<?php
/*
|--------------------------------------------------------------------------
| PLEASE DO NOT REMOVE THIS COPYRIGHT NOTICE!
|--------------------------------------------------------------------------
|
| Project owner: V4-Travian <  >
|
| DECODE & DEBUG is property of V4-Travian Project. You are allowed to change
| its source and release it under own name, not under name `V4-Travian`.
| You have no rights to remove copyright notices.
|
| V4-Travian All rights reserved@
*/
if($session->plus) {
$links = $database->getLinks($session->uid);
$query = count($links);
if($query>0){
echo '<div id="linkList" class="listing">
	<div class="head">
	<a href="spieler.php?s=2" accesskey="L">لینک ها</a>
</div><div class="list none">';
foreach($links as $link) {
   echo '<ul><li class="entry">'; 
   echo '<a href="'.$link['url'].'" title="'.$link['name'].'">'.$link['name'].'</a></li></ul>';
}
?>
	<div class="pager">
		<a href="#" class="back" style="display: none; "></a>
		<a href="#" class="next" style="display: none; "></a>
	</div>
</div>
<script type="text/javascript">
	new Travian.Game.PageScroller(
	{
		elementPrev: $('linkList').down('a.back'),
		elementNext: $('linkList').down('a.next'),
		elementList: $('linkList').down('div.list'),
		elementBackground: $('linkList').down('div.list')
	});
</script></div><?php } }
if($session->access == ADMIN)
{
echo '<div id="linkList" class="listing">
	<div class="head"><br /><br><center><b><font color=red>
	مدیریت
</font></div><div class="list none">';
   echo '<a href="meDa.php" title="تقسیم مدال ها"><b><center>تقسیم مدال ها</center></b></a>';
   echo '<a href="katibe.php" title="کتیبه ها"><b><center>کتیبه ها</center></b></a>';
   echo '<a href="Mssg.php" title="پیام همگانی"><b><center>پیام همگانی</center></b></a>';
   echo '<a href="Mass.php" title="نامه همگانی"><b><center>نامه همگانی</center></b></a>';
   echo '<a href="tamir.php" title="تعمیرات سرور"><b><center>تعمیرات سرور</center></b></a>';
   echo '<a href="reg.php" title="تنظیمات ثبت نام"><b><center>تنظیمات ثبت نام</center></b></a>';

?><br /><br /><br /><br /></b></center>
</div>
</div>
<?php
}
if($session->access == ADMIN)
{
echo '<div id="linkList" class="listing">
	<div class="head"><br /><br><center><b><font color=Blue>
مدیریت 2
</font></div><div class="list none">';
   echo '<a href="admin/index.php" title="ورود به پنل مدیریت"><b><center>ورود به پنل مدیریت</center></b></a>';
   echo '<a href="admin/index.php?p=Gold" title="اهداي طلا به همه"><b><center>اهداي طلا</center></b></a>';
   echo '<a href="admin/index.php?p=Banned" title="بازداشت بازیکن"><b><center>بازداشت بازیکن</center></b></a>';
   echo '<a href="admin/index.php?p=results_player" title="مدیریت بازیکنان"><b><center>مدیریت بازیکنان</center></b></a>';
   echo '<a href="admin/index.php?p=results_villages" title="مدیریت دهکده ها"><b><center>مدیریت دهکده ها</center></b></a>';
   echo '<a href="admin/index.php?p=Onlines" title="افراد آنلاین"><b><center>افراد آنلاین</center></b></a>';
  
?><br /><br /><br /><br /></b></center>
</div>
</div>
<?php
}
?>