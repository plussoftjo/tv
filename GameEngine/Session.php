<?php
        if(!file_exists('GameEngine/config.php') && !file_exists('GameEngine/Database/connection.php')) {
        	header("Location: install/");
        }
        
        include ("Database/connection.php");
        include ("config.php");
        include ("Database.php");
		include ("Data/buidata.php");
        include ("Data/cp.php");
        include ("Data/cel.php");
        include ("Data/resdata.php");
        include ("Data/unitdata.php");
        include ("Data/hero_full.php");
        include ("Mailer.php");
        include ("Battle.php");
        include ("Form.php");
        include ("Generator.php");
        include ("Automation.php");
        include ("Lang/" . LANG . ".php");
        include ("Logging.php");
        include ("Message.php");
        include ("Multisort.php");
        include ("Ranking.php");
        include ("Alliance.php");
        include ("Profile.php");
        include ("Protection.php");


        class Session {

        	private $time;
        	var $logged_in = false;
        	var $referrer, $url;
        	var $username, $uid, $access, $plus, $tribe, $isAdmin, $alliance, $gold, $oldrank, $gpack;
        	var $bonus = 0;
        	var $bonus1 = 0;
        	var $bonus2 = 0;
        	var $bonus3 = 0;
        	var $bonus4 = 0;
        	var $checker, $mchecker;
        	public $userinfo = array();
        	private $userarray = array();
			public $ghafasplus = 2;
        	var $villages = array();

        	function Session() {
        		$this->time = time();
        		session_start();

        		$this->logged_in = $this->checkLogin();

        		if($this->logged_in && TRACK_USR) {
        			$database->updateActiveUser($this->username, $this->time);
        		}
        		if(isset($_SESSION['url'])) {
        			$this->referrer = $_SESSION['url'];
        		} else {
        			$this->referrer = "/";
        		}
        		$this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
        		$this->SurfControl();
        	}

        	public function Login($user) {
        		global $database, $generator, $logging;
        		$this->logged_in = true;
        		$_SESSION['sessid'] = $generator->generateRandID();
        		$_SESSION['username'] = $user;
        		$_SESSION['checker'] = $generator->generateRandStr(3);
        		$_SESSION['mchecker'] = $generator->generateRandStr(5);
        		$_SESSION['qst'] = $database->getUserField($_SESSION['username'], "quest", 1);
				if($database->checkLogin($user)){
					if(!isset($_SESSION['wid']) || $_SESSION['wid'] == '') {
						$query = mysql_query('SELECT * FROM `' . TB_PREFIX . 'vdata` WHERE `owner` = ' . $database->getUserField($_SESSION['username'], "id", 1) . ' LIMIT 1');
						$data = mysql_fetch_assoc($query);
						$_SESSION['wid'] = $data['wref'];
					}
					$this->PopulateVar();
					$logging->addLoginLog($this->uid, $_SERVER['REMOTE_ADDR']);
					$database->addActiveUser($_SESSION['username'], $this->time);
					$qq1 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'users` WHERE `id` = ' . $database->getUserField($_SESSION['username'], "id", 1) . '');
					$rr1 = mysql_fetch_array($qq1);
					$_SESSION['sessid'] = $rr1['sessid'];
				}else{
					if(!isset($_SESSION['wid']) || $_SESSION['wid'] == '') {
						$query = mysql_query('SELECT * FROM `' . TB_PREFIX . 'vdata` WHERE `owner` = ' . $database->getUserField($_SESSION['username'], "id", 1) . ' LIMIT 1');
						$data = mysql_fetch_assoc($query);
						$_SESSION['wid'] = $data['wref'];
					}
					$this->PopulateVar();

					$logging->addLoginLog($this->uid, $_SERVER['REMOTE_ADDR']);
					$database->addActiveUser($_SESSION['username'], $this->time);
					$database->updateUserField($_SESSION['username'], "sessid", $_SESSION['sessid'], 0);
				}
        		

        		header("Location: dorf1.php");
        	}

        	public function Logout() {
        		global $database;
        		$this->logged_in = false;
        		$database->updateUserField($_SESSION['username'], "sessid", "", 0);
        		if(ini_get("session.use_cookies")) {
        			$params = session_get_cookie_params();
        			setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        		}
        		session_destroy();
        		session_start();
        	}

        	public function changeChecker() {
        		global $generator;
        		$this->checker = $_SESSION['checker'] = $generator->generateRandStr(3);
        		$this->mchecker = $_SESSION['mchecker'] = $generator->generateRandStr(5);
        	}

        	private function checkLogin() {
        		global $database;
        		if(isset($_SESSION['username']) && isset($_SESSION['sessid'])) {
        			if(!$database->checkActiveSession($_SESSION['username'], $_SESSION['sessid'])) {
        				$this->Logout();
        				return false;
        			} else {
        				//Get and Populate Data
        				$this->PopulateVar();
        				//update database
        				$database->addActiveUser($_SESSION['username'], $this->time);
        				$database->updateUserField($_SESSION['username'], "timestamp", $this->time, 0);
        				return true;
        			}
        		} else {
        			return false;
        		}
        	}

        	private function PopulateVar() {
        		global $database;
        		$this->userarray = $this->userinfo = $database->getUserArray($_SESSION['username'], 0);
        		$this->username = $this->userarray['username'];
        		$this->uid = $this->userarray['id'];
        		$this->gpack = $this->userarray['gpack'];
        		$this->access = $this->userarray['access'];
        		$this->plus = ($this->userarray['plus'] > $this->time);
				$this->goldclub = $this->userarray['goldclub'];
        		$this->villages = $database->getVillagesID($this->uid);
        		$this->tribe = $this->userarray['tribe'];
        		$this->isAdmin = $this->access >= MODERATOR;
        		$this->alliance = $this->userarray['alliance'];
        		$this->checker = $_SESSION['checker'];
        		$this->mchecker = $_SESSION['mchecker'];
        		$this->gold = $this->userarray['gold'];
				$this->is_sitter = $database->checkSitter($_SESSION['username']);
				$this->silver = $this->userarray['silver'];
				$this->cp = $this->userarray['cp'];
        		$this->oldrank = $this->userarray['oldrank'];
        		$_SESSION['ok'] = $this->userarray['ok'];
        		if($this->userarray['b1'] > $this->time) {
        			$this->bonus1 = 1;
        		}
        		if($this->userarray['b2'] > $this->time) {
        			$this->bonus2 = 1;
        		}
        		if($this->userarray['b3'] > $this->time) {
        			$this->bonus3 = 1;
        		}
        		if($this->userarray['b4'] > $this->time) {
        			$this->bonus4 = 1;
        		}
        	}

        	private function SurfControl() {
        		if(SERVER_WEB_ROOT) {
        			$page = $_SERVER['SCRIPT_NAME'];
        		} else {
        			$explode = explode("/", $_SERVER['SCRIPT_NAME']);
        			$i = count($explode) - 1;
        			$page = $explode[$i];

        		}
        		$pagearray = array("index.php", "anleitung.php", "tutorial.php", "login.php", "activate.php", "anmelden.php", "xaccount.php");
        		if(!$this->logged_in) {
        			if(!in_array($page, $pagearray) || $page == "logout.php") {
        				header("Location: login.php");
        			}
        		} else {
        			if(in_array($page, $pagearray)) {
        				header("Location: dorf1.php");
        			}

        		}
        	}
        }
        ;

        $session = new Session;
        $form = new Form;
        $message = new Message;

?>