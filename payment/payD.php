<?php
session_start();

// عنوان صفحه
$PageTitle = 'خرید بسته D';
// قیمت
$Price = '20000';
// شرح خرید
$Desc = '1200 سکه طلا';
// تعداد سکه طلا
$gold = 1200;


// Site Settings
$MerchentID = '492003';
$Password = 'SPpdwqaJe';
$ReturnPath = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];

echo '<html dir="rtl">
	  <head>
	  <title>'.$PageTitle.'</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <style>
		.title
		{
			height:30px;
		}	  
		input
		{
			font-family:tahoma;
			font-size: 12px;
			text-align: center;
			width: 200px;
			
		}
		table
		{
			font-size: 12px;
		}
  	  </style>
	  </head>
	  <body style="font:12px tahoma;line-height:30px; margin: 30px auto; text-align: center;">';
	
	include ("../GameEngine/Database/connection.php");
	include ("../GameEngine/config.php");
	  
	if(isset($_POST['status']) && $_POST['status'] == 100){
	
	mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
	mysql_select_db(SQL_DB);
	
	$query = mysql_query("UPDATE s1_users SET gold = gold + '".$gold."' WHERE username = '".$_SESSION['username']."'");
	
echo '<div style="color:green">
	  عملیات پرداخت با موفقیت انجام گردید و حساب شما شارژ شد.';
	  printf("<script>setTimeout('location.href=\"http://" . $_SERVER['SERVER_NAME'] . "/dorf1.php\"', 1000)</script>");
	  $_SESSION['username'] = "";
	  die();
}

if(isset($_POST['status'])){
echo '<div style="color:red">
	  عملیات پرداخت با مشکل مواجه شد. لطفا دوباره سعی کنید.';
	  printf("<script>setTimeout('location.href=\"http://" . $_SERVER['SERVER_NAME'] . "/dorf1.php\"', 1000)</script>");
	  die();
}
if(isset($_POST['submit'])){

	$_SESSION['username'] = $_POST['Paymenter'];
	
	echo '<table style="margin: 0 auto;"><tr><td class="title">قيمت : '.$Price.' تومان</td></tr>'.
	'<tr><td class="title">نام کاربری در سایت : '.$_SESSION['username'].'</td></tr>'.
	'<tr><td class="title">ايميل : '.$_POST['Email'].'</td></tr>'.
	'<tr><td class="title">شرح خرید : '.$Desc.'</td></tr></table>'.
	'<tr><td class="title">در صورت صحیح بودن اطلاعات فوق ، بر روی دکمه "اتصال به درگاه پرداخت" کلیک کنید.
		<br>
		پس از پرداخت موفق ، اکانت شما به طور خودکار شارژ خواهد شد.
	</td></tr>'.
	'<form action="http://merchant.parspal.com/postservice/" method="post" id="TransactionForm"/>
	<input type="hidden" id="MerchantID" value="'.$MerchentID.'" name="MerchantID"/>
	<input type="hidden" id="Password" value="'.$Password.'" name="Password"/>
	<input type="hidden" id="Paymenter" value="'.$_SESSION['username'].'" name="Paymenter"/>
	<input type="hidden" id="Email" value="'.$_POST['Email'].'" name="Email"/>
	<input type="hidden" id="Mobile" value="00" name="Mobile"/>
	<input type="hidden" id="Price" value="'.$Price.'" name="Price"/>
	<input type="hidden" id="ResNumber" value="'.$Desc.'" name="ResNumber"/>
	<input type="hidden" id="Description" value="'.$Desc.'" name="Description"/>
	<input type="hidden" id="ReturnPath" value="'.$ReturnPath.'" name="ReturnPath"/>
	<input type="submit" value="اتصال به درگاه پرداخت آنلاین پارس پال" style="height:35px"/>
	</form>';
}
else{
	echo '<form method="post"><table style="margin: 0 auto;">';
	
		echo '<tr><td class="title">قيمت </td><td> 
		<input type="text" name="Price" value="'.$Price.'" dir="ltr" disabled/> تومان </td></tr>';

	echo '<tr><td class="title">نام کاربری در سایت </td><td><input type="text" name="Paymenter"/></td></tr>'.
	'<tr><td class="title">ايميل </td><td><input type="text" dir="ltr" name="Email"/></td></tr>'.
	'<tr><td class="title">شرح خرید </td><td><input type="text" name="Description" value="'.$Desc.'" disabled/></td></tr>'.
	'<tr><td class="submit"></td><td><input type="submit" name="submit" style="font-family:tahoma" value="ادامه عمليات خريد" /></td></tr></table></form>';
}

echo '</body>
	  </html>';
?>