<td height="305" width="170" valign="top">

<center><div style="position: height="305" width="170"; bottom: 2px; border: dashed 1px; right: 700px; background-color:#ffffff;padding:5px;z-index:100;"><b>






<?php
require_once("inc/storeAddress.php");
?>


<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
  <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/mailingList.js"></script>
    <title>Newslatter</title>


  <form id="addressForm" action="index.php" method="get">
      
       <style>@CHARSET "UTF-8";body{text-align:right;direction:rtl;margin:0;

font:  tahoma,arial,helvetica,sans-serif;  text-shadow:-1px 1px 1px #C6C6C6;}a:link{text-decoration:none;
}</style>

<br>__________________________________________________________________________<br><br>
        <center>
          <b>ایمیل:</b> <input type="text"   value="<?php echo REGISTER_EMAIL; ?>"name="address" id="address" size="25"><br>
   
   <div id="fm-submit" class="fm-req">
      <input name="Submit" value="عضویت" type="submit" />
   </div>

        <p id="response"><?php echo(storeAddress()); ?>

        </p>
      </center>
    </form>
    
    <br>__________________________________________________________________________<br>
    