<?php include("inc/bouncer.php"); ?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<br>
<center>
<img src="css/logo.gif" alt="Maillist">
<?php
  $file = "maillist.php";
  $lines = count(file($file));
  $lines = $lines-1;
  echo "<br><br>- مجموعه $lines کاربر عضو خبرنامه هستند -";
?>
<a href="../admin/index.php" title="Back">برگشت</a>
<div id="container">
<fieldset>
<legend>Messaging</legend>
<center><img src="images/email_large.png"><br><br></center>
<?php
@set_time_limit(0); // Turn off limit (if allowed)
$error = 0;
$line = explode(";", htmlspecialchars($_POST['to']));
$owner = htmlspecialchars($_POST['email']); // Send a copy of letter to owner
$header = file_get_contents('assets/header.txt'); // Load header
$footer = file_get_contents('assets/footer.txt'); // Load footer
$email = $_POST['email']; // Load email
$subject = $_POST['subject']; // Load subject
if($subject == ''){
  $subject = '(no subject)';
}
$body = $header."<br><br>".$_POST['elm2']."<br><br>--------<br><br>".$footer; // Construct message


//Save to outbox

$myFile = "outbox/".$subject.'989898989898989898989898'.date("F j, Y").'.txt';
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $_POST['elm2']);
fclose($fh);


//Send

foreach ($line as $line) {
  if($line != ''){
    $to = str_replace("<br>", "", $line);
	$headers = "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: ".$email."\r\n" ."X-Mailer: php";
    if (mail($to, $subject, $body, $headers)) {
  echo('پیام ارسال شد به'.$to.' <img src="images/tick.png"><br>');  // If successfull
 } else {
  echo("پیام به $to<br>"); // ارسال نشد
  $error = 1;
 }
} // Done
}
if($error == 1){
  echo 'There has been an error, make sure your SMTP settings are set correcly, help can be found <a href="http://uk2.php.net/mail">here</a><img src="images/cross.png">';
}
 $to = str_replace("<br>", "", $owner);
	$headers = "Content-type: text/html; charset=UTF-8\r\n";
	$headers .= "From: ".$email."\r\n" ."X-Mailer: php";
    if (mail($to, $subject, $body, $headers)) {
  echo('پیام با موفقیت به '.$to.'<img src="images/tick.png"><br>');  // ارسال شد
 }
?>
</fieldset>
</div>