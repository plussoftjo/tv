<?php
include "Data/hero_full.php";
$hero_levels = $GLOBALS["hero_levels"];
if($_POST && $_POST['a']=='inventory'){
	$data = $_POST;
	$uid = $session->uid;
	$hero = $database->HeroFace($uid);
	$heroInv = $database->getHeroInventory($uid);
	$heroData = $database->getHeroData($uid);
	$itemData = $database->getItemData($data['id']);
	if($itemData['proc']==0){
		if($data['btype']==1){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'helmet', $data['id']);
			if($hero['helmet']!=0){
				$database->modifyHeroFace($uid, 'helmet', $data['type']);
				$id = $database->getHeroItemID2($uid, 1, $hero['helmet']);
				$database->editProcItem($id, 0);
			}else{
				$database->modifyHeroFace($uid, 'helmet', $data['type']);
			}
		}
		
		elseif($data['btype']==2){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'body', $data['id']);
			if($data['type']==88){
				$database->modifyHero2('power', 500, $uid, 1);
			}elseif($data['type']==89){
				$database->modifyHero2('power', 1000, $uid, 1);
			}elseif($data['type']==90){
				$database->modifyHero2('power', 1500, $uid, 1);
			}
			if($hero['body']!=0){
				$database->modifyHeroFace($uid, 'body', $data['type']);
				$id = $database->getHeroItemID2($uid, 2, $hero['body']);
				$database->editProcItem($id, 0);
				$item = $database->getHeroItem($id);
				if($item['type']==88){
					$database->modifyHero2('power', 500, $uid, 2);
				}elseif($item['type']==89){
					$database->modifyHero2('power', 1000, $uid, 2);
				}elseif($item['type']==90){
					$database->modifyHero2('power', 1500, $uid, 2);
				}
			}else{
				$database->modifyHeroFace($uid, 'body', $data['type']);
			}
		}
		
		elseif($data['btype']==3){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'leftHand', $data['id']);
			if($data['type']==76){
				$database->modifyHero2('power', 500, $uid, 1);
			}elseif($data['type']==77){
				$database->modifyHero2('power', 1000, $uid, 1);
			}elseif($data['type']==78){
				$database->modifyHero2('power', 1500, $uid, 1);
			}
			if($hero['leftHand']!=0){
				$database->modifyHeroFace($uid, 'leftHand', $data['type']);
				$id = $database->getHeroItemID2($uid, 3, $hero['leftHand']);
				$database->editProcItem($id, 0);
				$item = $database->getHeroItem($id);
				if($item['type']==76){
					$database->modifyHero2('power', 500, $uid, 2);
				}elseif($item['type']==77){
					$database->modifyHero2('power', 1000, $uid, 2);
				}elseif($item['type']==78){
					$database->modifyHero2('power', 1500, $uid, 2);
				}
			}else{
				$database->modifyHeroFace($uid, 'leftHand', $data['type']);
			}
		}
		
		elseif($data['btype']==4){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'rightHand', $data['id']);
			if($data['type']==16 || $data['type']==19 || $data['type']==22 || $data['type']==25 || $data['type']==28 || $data['type']==31 || $data['type']==34 || $data['type']==37 || $data['type']==40 || $data['type']==43 || $data['type']==46 || $data['type']==49 || $data['type']==52 || $data['type']==55 || $data['type']==58){
				$database->modifyHero2('power', 500, $uid, 1);
			}elseif($data['type']==17 || $data['type']==20 || $data['type']==23 || $data['type']==26 || $data['type']==29 || $data['type']==32 || $data['type']==35 || $data['type']==38 || $data['type']==41 || $data['type']==44 || $data['type']==47 || $data['type']==50 || $data['type']==53 || $data['type']==56 || $data['type']==59){
				$database->modifyHero2('power', 1000, $uid, 1);
			}elseif($data['type']==18 || $data['type']==21 || $data['type']==24 || $data['type']==27 || $data['type']==30 || $data['type']==33 || $data['type']==36 || $data['type']==39 || $data['type']==42 || $data['type']==45 || $data['type']==48 || $data['type']==51 || $data['type']==54 || $data['type']==57 || $data['type']==60){
				$database->modifyHero2('power', 1500, $uid, 1);
			}
			if($hero['rightHand']!=0){
				$database->modifyHeroFace($uid, 'rightHand', $data['type']);
				$id = $database->getHeroItemID2($uid, 4, $hero['rightHand']);
				$database->editProcItem($id, 0);
				$data = $database->getHeroItem($id);
				if($data['type']==16 || $data['type']==19 || $data['type']==22 || $data['type']==25 || $data['type']==28 || $data['type']==31 || $data['type']==34 || $data['type']==37 || $data['type']==40 || $data['type']==43 || $data['type']==46 || $data['type']==49 || $data['type']==52 || $data['type']==55 || $data['type']==58){
					$database->modifyHero2('power', 500, $uid, 2);
				}elseif($data['type']==17 || $data['type']==20 || $data['type']==23 || $data['type']==26 || $data['type']==29 || $data['type']==32 || $data['type']==35 || $data['type']==38 || $data['type']==41 || $data['type']==44 || $data['type']==47 || $data['type']==50 || $data['type']==53 || $data['type']==56 || $data['type']==59){
					$database->modifyHero2('power', 1000, $uid, 2);
				}elseif($data['type']==18 || $data['type']==21 || $data['type']==24 || $data['type']==27 || $data['type']==30 || $data['type']==33 || $data['type']==36 || $data['type']==39 || $data['type']==42 || $data['type']==45 || $data['type']==48 || $data['type']==51 || $data['type']==54 || $data['type']==57 || $data['type']==60){
					$database->modifyHero2('power', 1500, $uid, 2);
				}
			}else{
				$database->modifyHeroFace($uid, 'rightHand', $data['type']);
			}
		}
		
		elseif($data['btype']==5){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'shoes', $data['id']);
			if($hero['foot']!=0){
				$database->modifyHeroFace($uid, 'foot', $data['type']);
				$id = $database->getHeroItemID2($uid, 5, $hero['foot']);
				$database->editProcItem($id, 0);
			}else{
				$database->modifyHeroFace($uid, 'foot', $data['type']);
			}
		}
		
		elseif($data['btype']==6){
			$database->editProcItem($data['id'], 1);
			$database->setHeroInventory($uid, 'horse', $data['id']);
			if($hero['horse']!=0){
	
			}else{
				if($data['type']==103){
					$value = 14;
				}elseif($data['type']==104){
					$value = 17;
				}elseif($data['type']==105){
					$value = 20;
				}
				$database->modifyHeroFace($uid, 'horse', $data['type']);
				$database->modifyHero2('speed', $value, $uid, 1);
			}
		}
		
		elseif($data['btype']==7){
			$database->editProcItem($data['id'], 1);
			if($heroInv['bag']==0){
				$database->setHeroInventory($uid,'bag',$data['id']);
			}
		}
		
		elseif($data['btype']==8){
			$database->editProcItem($data['id'], 1);
			if($heroInv['bag']==0){
				$database->setHeroInventory($uid,'bag',$data['id']);
			}
		}
		
		elseif($data['btype']==9){
			$database->editProcItem($data['id'], 1);
			if($heroInv['bag']==0){
				$database->setHeroInventory($uid,'bag',$data['id']);
			}
		}
		
		elseif($data['btype']==10){
			if($data['amount'] <= $itemData['num']){
				$value = ($data['amount']*10);
				if($data['amount'] < $itemData['num']){
					$database->modifyHero2('experience', $value, $uid, 1);
					$database->editHeroNum($data['id'], $data['amount'], 0);
					if($heroData['experience']>=$hero_levels[$heroData['level']+1]){
						$database->modifyHero2("level",1,$uid,1);
						$database->modifyHero2("points",4,$uid,1);
					}
				}else{
					$database->editProcItem($data['id'], 1);
					$database->modifyHero2('experience', $value, $uid, 1);
					if($heroData['experience']>=$hero_levels[$heroData['level']+1]){
						$database->modifyHero2("level",1,$uid,1);
						$database->modifyHero2("points",4,$uid,1);
					}
				}
			}
			header("Location: hero_inventory.php");
		}
		
		elseif($data['btype']==11){
			if($heroData['health']<100){
				if($data['amount'] <= $itemData['num']){
					$health = round($heroData['health']);
					if(($health+$data['amount'])>100){
						$database->modifyHero2('health', 100, $uid, 0);
						$newAmount = intval(100-$health);
						$database->editHeroNum($data['id'], $newAmount, 0);
					}	
					else{
						if($data['amount'] < $itemData['num']){
							$database->modifyHero2('health', $data['amount'], $uid, 1);
							$database->editHeroNum($data['id'], $data['amount'], 0);
						}else{
							$database->editProcItem($data['id'], 1);
							$database->modifyHero2('health', $data['amount'], $uid, 1);
						}
					}
				}
			}
		}
		
		elseif($data['btype']==12){
			if($heroData['dead']!=0){
				$database->modifyHero2('dead', 0, $uid, 0);
				$database->modifyHero2('health', 100, $uid, 0);
				$database->modifyHero2('wref', $village->wid, $uid, 0);
				$database->editProcItem($data['id'], 1);
				$database->query("UPDATE ".TB_PREFIX."units SET hero = 1 WHERE vref = ".$village->wid);
			}
		}
		
		elseif($data['btype']==13){
			if($session->tribe == 1){ $tp = 100; }else{ $tp = 80; }
			$rp = 30;
			$powerPoints = intval($heroData['power']/$tp)-1;
			$offPoints = intval($heroData['offBonus']/$tp);
			$defPoints = intval($heroData['defBonus']/$tp);
			$productPoints = intval($heroData['product']/$rp);
			
			$AllPoints = ($powerPoints+$offPoints+$defPoints+$productPoints);
			
			$database->modifyHero2('points', $AllPoints, $uid, 0);
			$database->modifyHero2('power', 100, $uid, 0);
			$database->modifyHero2('offBonus', 0, $uid, 0);
			$database->modifyHero2('defBonus', 0, $uid, 0);
			$database->modifyHero2('product', 0, $uid, 0);
			for($i=0;$i<=4;$i++){
				$database->modifyHero2('r'.$i, 0, $uid, 0);
			}
			$database->editProcItem($data['id'], 1);
		}
		
		elseif($data['btype']==14){
			if($village->loyalty<=125){
				if($data['amount'] <= $itemData['num']){
					if(($village->loyalty+$data['amount'])>125){
						$database->setVillageField($village->wid, 'loyalty', 125);
						$newAmount = intval(125-$village->loyalty);
						$database->editHeroNum($data['id'], $newAmount, 0);
					}	
					else{
						if($data['amount'] < $itemData['num']){
							$database->setVillageField($village->wid, 'loyalty', ($village->loyalty+$data['amount']));
							$database->editHeroNum($data['id'], $data['amount'], 0);
						}else{
							$database->editProcItem($data['id'], 1);
							$database->setVillageField($village->wid, 'loyalty', ($village->loyalty+$data['amount']));
						}
					}
				}
			}
			header("Location: hero_inventory.php");
		}
		
		elseif($data['btype']==15){
			if($data['amount'] <= $itemData['num']){
				$value = ($data['amount']*$database->getVSumField($uid, 'cp'));
				if($data['amount'] < $itemData['num']){
					$database->updateUserField($uid, 'cp', $value, 2);
					$database->editHeroNum($data['id'], $data['amount'], 0);
				}else{
					$database->editProcItem($data['id'], 1);
					$database->updateUserField($uid, 'cp', $value, 2);
				}
			}
		}
	}
}
?>