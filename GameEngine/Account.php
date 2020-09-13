<?php
include("Session.php");


class Account {

	function Account() {
		global $session;
		if(isset($_POST['ft'])) {
			switch($_POST['ft']) {
				case "a1":
				$this->Signup();
				break;
				case "a2":
				$this->Activate();
				break;
				case "a3":
				$this->Unreg();
				break;
				case "a4":
				$this->Login();
				break;
			}
		}
		if($_POST['forgotPassword'] == 1) {
			$this->forgotPassword($_POST['pw_email']);
		}
		if(isset($_GET['code'])) {
		$_POST['id'] = $_GET['code']; $this->Activate();
		} else {
			if($session->logged_in && in_array("logout.php",explode("/",$_SERVER['PHP_SELF']))) {
				$this->Logout();
			}
		}
	}

	private function Signup() {
		global $database,$form,$mailer,$generator,$session;
		if(!isset($_POST['name']) || $_POST['name'] == "") {
			$form->addError("name",USRNM_EMPTY);
		} else {
			if(strlen($_POST['name']) < USRNM_MIN_LENGTH) {
				$form->addError("name",USRNM_SHORT);
			}
			else if(!USRNM_SPECIAL && preg_match('/[^0-9A-Za-z]/',$_POST['name'])) {
				$form->addError("name",USRNM_CHAR);
			}
			else if($database->checkExist($_POST['name'],0)) {
				$form->addError("name",USRNM_TAKEN);
			}
			else if($database->checkExist_activate($_POST['name'],0)) {
				$form->addError("name",USRNM_TAKEN);
			}
			
		}
		if(!isset($_POST['pw']) || $_POST['pw'] == "") {
			$form->addError("pw",PW_EMPTY);
		} else {
			if(strlen($_POST['pw']) < PW_MIN_LENGTH) {
				$form->addError("pw",PW_SHORT);
			}
			else if($_POST['pw'] == $_POST['name']) {
				$form->addError("pw",PW_INSECURE);
			}
		}
		if(!isset($_POST['email'])) {
			$form->addError("email",EMAIL_EMPTY);
		} else {
			if(!$this->validEmail($_POST['email'])) {
				$form->addError("email",EMAIL_INVALID);
			}
			else if($database->checkExist($_POST['email'],1)) {
				$form->addError("email",EMAIL_TAKEN);
			}
			else if($database->checkExist_activate($_POST['email'],1)) {
				$form->addError("email",EMAIL_TAKEN);
			}
		}
		if(!isset($_POST['vid'])) {
			$form->addError("tribe",TRIBE_EMPTY);
		}
		if(!isset($_POST['agb'])) {
			$form->addError("agree",AGREE_ERROR);
		}
		if($form->returnErrors() > 0) {
			
				function StrRegister55($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '*' , '=' , '^' , '&' , '<' , '>' , '?');
		return @str_replace($bug , '' , $TextVar);
	}
			
			$_SESSION['errorarray'] = $form->getErrors();
			$_SESSION['valuearray'] = StrRegister55($_POST);


			header("Location: anmelden.php");
		} else {
			if(AUTH_EMAIL){
				function StrRegister4($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '!' , '%' , '*' , '(' , '$' , '#' , '^' , '&' , ')' , '<' , '>' , '?' , '{' , '}' , '[' , ']');
		return @str_replace($bug , '' , $TextVar);
	}



	
	
				$act = $generator->generateRandStr(10);
				$act2 = $generator->generateRandStr(5);
				$uid = $database->activate(StrRegister4($_POST['name']),md5($_POST['pw']),$_POST['email'],$_POST['vid'],$_POST['kid'],$act,$act2);
			
				if($uid) {
					
									function StrRegister5($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '!' , '%' , '*' , '(' , '$' , '#' , '^' , '&' , ')' , '<' , '>' , '?' , '{' , '}' , '[' , ']');
		return @str_replace($bug , '' , $TextVar);
	}
					
					$mailer->sendActivate($_POST['email'],StrRegister4($_POST['name']),$_POST['pw'],$act);
					header("Location: activate.php?id=$uid&q=$act2");
				}
			} else {
					function StrRegister1($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '!' , '%' , '*' , '(' , '$' , '#' , '^' , '&' , ')' , '<' , '>' , '?' , '{' , '}' , '[' , ']');
		return @str_replace($bug , '' , $TextVar);
	}
	
	
	$vid = $_POST['vid'] > 3 ? $_POST['vid'] = 1 : $_POST['vid'];
	
				$uid = $database->register(StrRegister1($_POST['name']),md5($_POST['pw']),$_POST['email'],$vid,$_POST['kid'],$act);
				$frandom0 = rand(0,3);$frandom1 = rand(0,3);$frandom2 = rand(0,4);$frandom3 = rand(0,3);
				
				if($uid) {
				$database->addHeroFace($uid,$frandom0,$frandom1,$frandom2,$frandom3,$frandom3,$frandom2,$frandom1,$frandom0,$frandom2);
				$database->addHero($uid);
				$database->addHeroinventory($uid);
					
	function StrRegister($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '*' , '=' , '^' , '&' , '<' , '>' , '?');
		return @str_replace($bug , '' , $TextVar);
	}
	
				
				$cookiepost = StrRegister($_POST['name']);
				
				
				
					setcookie("COOKUSR",$cookiepost,time()+COOKIE_EXPIRE,COOKIE_PATH);
					setcookie("COOKEMAIL",$_POST['email'],time()+COOKIE_EXPIRE,COOKIE_PATH);
	
					$database->updateUserField($uid,"act","",1);
					
					$this->generateBase($_POST['kid'],$uid,StrRegister($_POST['name']));
					
					$database->modifyUnit($database->getVFH($uid), 'hero', 1, 1);
					
					$database->modifyHero2('wref', $database->getVFH($uid), $uid, 0);
					
				$database->getVFH($uid);
				
				$sath = 0;

				mysql_query("UPDATE ".TB_PREFIX."fdata SET 
				`f1`='".$sath."',`f2`='".$sath."',`f3`='".$sath."',`f4`='".$sath."',
				`f5`='".$sath."',`f6`='".$sath."',`f7`='".$sath."',`f8`='".$sath."',
				`f9`='".$sath."',`f10`='".$sath."',`f11`='".$sath."',`f12`='".$sath."',
				`f13`='".$sath."',`f14`='".$sath."',`f15`='".$sath."',`f16`='".$sath."',
				`f17`='".$sath."',`f18`='".$sath."' WHERE vref = '".$database->getVFH($uid)."'");

				
	
					for($s=1;$s<=3;$s++){
						
						$database->addAdventure($database->getVFH($uid), $uid);
						
					}
					header("Location: login.php");
				}
			}
		}
	}
	
	private function Activate() {
			
		global $database;
		$q = "SELECT * FROM ".TB_PREFIX."activate where act = '".$_POST['id']."'";
		$result = mysql_query($q, $database->connection);
		$dbarray = mysql_fetch_array($result);
		if($dbarray['act'] == $_POST['id']) {
			function StrRegister($TextVar)
	{
		$bug = $bug = array('' , '!' , '\'' , '/' , '"' , '*' , '=' , '^' , '&' , '<' , '>' , '?');
		return @str_replace($bug , '' , $TextVar);
	}
			$uid = $database->register(StrRegister($dbarray['username']),$dbarray['password'],$dbarray['email'],$dbarray['tribe'],$dbarray['location'],"");
			$frandom0 = rand(0,4);$frandom1 = rand(0,3);$frandom2 = rand(0,4);$frandom3 = rand(0,3);
			
			
			if($uid) {
			$database->addHeroFace($uid,$frandom0,$frandom1,$frandom2,$frandom3,$frandom3,$frandom2,$frandom1,$frandom0,$frandom2);
			$database->addHero($uid);
			$database->addHeroinventory($uid);
			$database->unreg($dbarray['username']);
			$this->generateBase($dbarray['kid'],$uid,$dbarray['username']);
			$database->modifyUnit($database->getVFH($uid), 'hero', 1, 1);
			$database->modifyHero2('wref', $database->getVFH($uid), $uid, 0);
			for($s=1;$s<=3;$s++){
				$database->addAdventure($database->getVFH($uid), $uid);
			}
			header("Location: activate.php?e=2");
			}
		} 
		else {
			header("Location: activate.php?e=3");
		}
	}
	
	private function Unreg() {
		
		
		global $database;
		
		
		$q = "SELECT * FROM ".TB_PREFIX."activate where id = '".$_POST['id']."'";
		$result = mysql_query($q, $database->connection);
		$dbarray = mysql_fetch_array($result);
		if(md5($_POST['pw']) == $dbarray['password']) {
			$database->unreg($dbarray['username']);
			header("Location: anmelden.php");
		}
		else {
			header("Location: activate.php?e=3");
		}
	}
	
	private function Login() {
		global $database,$session,$form;
		if(!isset($_POST['user']) || $_POST['user'] == "") {
			$form->addError("user",LOGIN_USR_EMPTY);
		}
		else if(!$database->checkExist($_POST['user'],0)) {
			$form->addError("user",USR_NT_FOUND);
		}
		if(!isset($_POST['pw']) || $_POST['pw'] == "") {
			$form->addError("pw",LOGIN_PASS_EMPTY);
		}
		else if(!$database->login($_POST['user'],$_POST['pw']) && !$database->sitterLogin($_POST['user'],$_POST['pw'])) {
			$form->addError("pw",LOGIN_PW_ERROR);
		}
		if($database->getUserField($_POST['user'],"act",1) != "") {
			$form->addError("activate",$_POST['user']);
		}
		
		function StrRegister56($TextVar)
	{
		$bug = array('' , '!' , '\'' , '/' , '"' , '*' , '=' , '^' , '&' , '<' , '>' , '?');
		return @str_replace($bug , '' , $TextVar);
	}
		
		if($form->returnErrors() > 0) {
			$_SESSION['errorarray'] = $form->getErrors();
			$_SESSION['valuearray'] = StrRegister56($_POST);
			
			header("Location: login.php");
		}
		else {
			
			setcookie("COOKUSR",$_POST['user'],time()+COOKIE_EXPIRE,COOKIE_PATH);
			if($database->sitterLogin($_POST['user'],$_POST['pw'])){
				$database->UpdateOnline("login" ,$_POST['user'],1);
			}else{
				$database->UpdateOnline("login" ,$_POST['user'],0);
			}
			
			$session->login($_POST['user']);
		}
	}
	
	private function Logout() {
		global $session,$database;
		unset($_SESSION['wid']);
		$database->activeModify($session->username,1);
		$database->UpdateOnline("logout") or die(mysql_error());
		$session->Logout();
	}
	
	private function forgotPassword($email) {
		global $database,$generator,$form,$mailer;
		$npw = $generator->generateRandStr(6);
		$act = $generator->generateRandStr(10);
		$getData = $database->getUserWithEmail($email);
		if($email == "") {
			$form->addError("pw_email",EMAIL_EMPTY);
		}
		elseif($database->checkProcExist($getData['id'])){
			if($database->checkExist($email,1)){
				$database->addNewProc($getData['id'], $npw, 0, $act, 0);
				$mailer->sendPassword($email, $npw, $act, $getData['username']);
			}else{
				$form->addError("pw_email",EMAIL_NOTEXIST);
			}
		}else{
			$form->addError("pw_email",EMAIL_TAKEN);
		}
		if($form->returnErrors() > 0) {
			$_SESSION['errorarray'] = $form->getErrors();
			$_SESSION['valuearray'] = $_POST;
		}else{
			header("Location: login.php?action=forgotPassword&finish=true");
		}
	}
	
	private function validEmail($email) {
	  $regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
	  if ( !preg_match($regexp, $email) ) {
		   return false;
	  }
	  return true;
	}
	
	function generateBase($kid,$uid,$username) {
		global $database,$message;
		
		if($kid == 0) {
			$kid = rand(1,4);
		}
		else{
			$kid = $_POST['kid'];
		}
		
		$wid = $database->generateBase($kid);
		$database->setFieldTaken($wid);
		$database->addVillage($wid,$uid,$username,1);
		$database->addResourceFields($wid,$database->getVillageType($wid));
		$database->addUnits($wid);
		$database->addTech($wid);
		$database->addABTech($wid);
		$database->updateUserField($uid,"access",USER,1);
		$database->updateUserField($uid,"location","",1);
		$message->sendWelcome($uid,$username);
	}
	
	
	
};
$account = new Account;

?>