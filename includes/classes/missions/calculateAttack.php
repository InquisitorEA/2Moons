<?php

##############################################################################
# *                                                                          #
# * 2MOONS                                                                   #
# *                                                                          #
# * @copyright Copyright (C) 2010 By ShadoX from titanspace.org              #
# *                                                                          #
# *	                                                                         #
# *  This program is free software: you can redistribute it and/or modify    #
# *  it under the terms of the GNU General Public License as published by    #
# *  the Free Software Foundation, either version 3 of the License, or       #
# *  (at your option) any later version.                                     #
# *	                                                                         #
# *  This program is distributed in the hope that it will be useful,         #
# *  but WITHOUT ANY WARRANTY; without even the implied warranty of          #
# *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           #
# *  GNU General Public License for more details.                            #
# *                                                                          #
##############################################################################


function calculateAttack(&$attackers, &$defenders)
{
	global $pricelist, $CombatCaps, $CONF, $resource, $ExtraDM;

	$TRES 	= array('attacker' => 0, 'defender' => 0);
	$ARES 	= $DRES = array('metal' => 0, 'crystal' => 0);
	$ROUND	= array();

	foreach ($attackers as $fleetID => $attacker) 
	{
		foreach ($attacker['detail'] as $element => $amount) 
		{
			$ARES['metal'] 		+= $pricelist[$element]['metal'] * $amount;
			$ARES['crystal'] 	+= $pricelist[$element]['crystal'] * $amount;
		}
	}
	
	$TRES['attacker']	= $ARES['metal'] + $ARES['crystal'];

	foreach ($defenders as $fleetID => $defender) 
	{
		foreach ($defender['def'] as $element => $amount)
		{
			if ($element < 300) {
				$DRES['metal'] 		+= $pricelist[$element]['metal'] * $amount;
				$DRES['crystal'] 	+= $pricelist[$element]['crystal'] * $amount ;

				$TRES['defender'] 	+= $pricelist[$element]['metal'] * $amount;
				$TRES['defender'] 	+= $pricelist[$element]['crystal'] * $amount;
			} else {
				if (!isset($STARTDEF[$element])) 
					$STARTDEF[$element] = 0;
				
				$STARTDEF[$element] += $amount;

				$TRES['defender']	+= $pricelist[$element]['metal'] * $amount;
				$TRES['defender']	+= $pricelist[$element]['crystal'] * $amount;
			}
		}
	}
	
	for ($ROUNDC = 0; $ROUNDC < MAX_ATTACK_ROUNDS; $ROUNDC++) 
	{
		$attackDamage  = array('total' => 0);
		$attackShield  = array('total' => 0);
		$attackAmount  = array('total' => 0);
		$defenseDamage = array('total' => 0);
		$defenseShield = array('total' => 0);
		$defenseAmount = array('total' => 0);
		$attArray = array();
		$defArray = array();

		foreach ($attackers as $fleetID => $attacker) {
			$attackDamage[$fleetID] = 0;
			$attackShield[$fleetID] = 0;
			$attackAmount[$fleetID] = 0;

			$attTech	= (1 + (0.1 * $attacker['user']['military_tech']) + (0.05 * $attacker['user']['rpg_amiral']) + ((TIMESTAMP - $attacker['user'][$resource[700]] <= 0) ? $ExtraDM[700]['add'] : 0)); //attaque
			$defTech	= (1 + (0.1 * $attacker['user']['defence_tech']) + (0.05 * $attacker['user']['rpg_amiral']) + ((TIMESTAMP - $attacker['user'][$resource[701]] <= 0) ? $ExtraDM[701]['add'] : 0)); //bouclier
			$shieldTech = (1 + (0.1 * $attacker['user']['shield_tech']) + (0.05 * $attacker['user']['rpg_amiral'])); //coque
			$attackers[$fleetID]['techs'] = array($shieldTech, $defTech, $attTech);
				
			foreach ($attacker['detail'] as $element => $amount) {
				$thisAtt	= $amount * ($CombatCaps[$element]['attack']) * $attTech * (rand(80, 120) / 100); //attaque
				$thisDef	= $amount * ($CombatCaps[$element]['shield']) * $defTech ; //bouclier
				$thisShield	= $amount * ($pricelist[$element]['metal'] + $pricelist[$element]['crystal']) / 10 * $shieldTech; //coque

				$attArray[$fleetID][$element] = array('def' => $thisDef, 'shield' => $thisShield, 'att' => $thisAtt);

				$attackDamage[$fleetID] += $thisAtt;
				$attackDamage['total'] += $thisAtt;
				$attackShield[$fleetID] += $thisDef;
				$attackShield['total'] += $thisDef;
				$attackAmount[$fleetID] += $amount;
				$attackAmount['total'] += $amount;
			}
			$temp1	= $attacker['detail'];
		}

		foreach ($defenders as $fleetID => $defender) {
			$defenseDamage[$fleetID] = 0;
			$defenseShield[$fleetID] = 0;
			$defenseAmount[$fleetID] = 0;

			$attTech	= (1 + (0.1 * $defender['user']['military_tech']) + (0.05 * $defender['user']['rpg_amiral']) + ((TIMESTAMP - $defender['user'][$resource[700]] <= 0) ? $ExtraDM[700]['add'] : 0)); //attaquue
			$defTech	= (1 + (0.1 * $defender['user']['defence_tech']) + (0.05 * $defender['user']['rpg_amiral']) + ((TIMESTAMP - $defender['user'][$resource[701]] <= 0) ? $ExtraDM[701]['add'] : 0)); //bouclier
			$shieldTech = (1 + (0.1 * $defender['user']['shield_tech']) + (0.05 * $defender['user']['rpg_amiral'])); //coque
			$defenders[$fleetID]['techs'] = array($shieldTech, $defTech, $attTech);

			foreach ($defender['def'] as $element => $amount) {
				$thisAtt	= $amount * ($CombatCaps[$element]['attack']) * $attTech * (rand(80, 120) / 100); //attaque
				$thisDef	= $amount * ($CombatCaps[$element]['shield']) * $defTech ; //bouclier
				$thisShield	= $amount * ($pricelist[$element]['metal'] + $pricelist[$element]['crystal']) / 10 * $shieldTech; //coque

				if ($element == 407 || $element == 408 || $element == 409) $thisAtt = 0;

				$defArray[$fleetID][$element] = array('def' => $thisDef, 'shield' => $thisShield, 'att' => $thisAtt);

				$defenseDamage[$fleetID] += $thisAtt;
				$defenseDamage['total'] += $thisAtt;
				$defenseShield[$fleetID] += $thisDef;
				$defenseShield['total'] += $thisDef;
				$defenseAmount[$fleetID] += $amount;
				$defenseAmount['total'] += $amount;
			}
			$temp2	= $defender['def'];
		}

		$ROUND[$ROUNDC] = array('attackers' => $attackers, 'defenders' => $defenders, 'attack' => $attackDamage, 'defense' => $defenseDamage, 'attackA' => $attackAmount, 'defenseA' => $defenseAmount, 'infoA' => $attArray, 'infoD' => $defArray);

		if ($defenseAmount['total'] <= 0 || $attackAmount['total'] <= 0) {
			break;
		}

		// Calculate hit percentages (ACS only but ok)
		$attackPct = array();
		foreach ($attackAmount as $fleetID => $amount) {
			if (!is_numeric($fleetID)) continue;
				$attackPct[$fleetID] = $amount / $attackAmount['total'];
		}

		$defensePct = array();
		foreach ($defenseAmount as $fleetID => $amount) {
			if (!is_numeric($fleetID)) continue;
				$defensePct[$fleetID] = $amount / $defenseAmount['total'];
		}

		// CALCUL DES PERTES !!!
		$attacker_n = array();
		$attacker_shield = 0;
		foreach ($attackers as $fleetID => $attacker) {
			$attacker_n[$fleetID] = array();

			foreach($attacker['detail'] as $element => $amount) {
				if ($amount <= 0)
					continue;

				$defender_moc = $amount * ($defenseDamage['total'] * $attackPct[$fleetID]) / $attackAmount[$fleetID];
				
				if (($attArray[$fleetID][$element]['def'] / $amount) >= $defender_moc) {
					$attacker_n[$fleetID][$element] = round($amount);
					$attacker_shield += $defender_moc;
					continue;
				}

				$max_removePoints = floor($amount * $defenseAmount['total'] / $attackAmount[$fleetID] * $attackPct[$fleetID]);

				$attacker_shield += min($attArray[$fleetID][$element]['def'], $defender_moc);
				$defender_moc 	 -= min($attArray[$fleetID][$element]['def'], $defender_moc);

				$ile_removePoints = max(min($max_removePoints, $amount * min($defender_moc / $attArray[$fleetID][$element]['shield'] * (rand(0, 200) / 100), 1)), 0);

				$attacker_n[$fleetID][$element] = max(ceil($amount - $ile_removePoints), 0);
			}
		}

		$defender_n = array();
		$defender_shield = 0;

		foreach ($defenders as $fleetID => $defender) {
			$defender_n[$fleetID] = array();

			foreach($defender['def'] as $element => $amount) {
				if ($amount <= 0)
					continue;

				$attacker_moc = $amount * ($attackDamage['total'] * $defensePct[$fleetID]) / $defenseAmount[$fleetID];
				
				if (($defArray[$fleetID][$element]['def'] / $amount) >= $attacker_moc) {
					$defender_n[$fleetID][$element] = round($amount);
					$defender_shield += $attacker_moc;
					continue;
				}
	
				$max_removePoints = floor($amount * $attackAmount['total'] / $defenseAmount[$fleetID] * $defensePct[$fleetID]);
				$defender_shield += min($defArray[$fleetID][$element]['def'], $attacker_moc);
				$attacker_moc 	 -= min($defArray[$fleetID][$element]['def'], $attacker_moc);
				
				$ile_removePoints = max(min($max_removePoints, $amount * min($attacker_moc / $defArray[$fleetID][$element]['shield'] * (rand(0, 200) / 100), 1)), 0);

				$defender_n[$fleetID][$element] = max(ceil($amount - $ile_removePoints), 0);
			}
		}

		foreach ($attackers as $fleetID => $attacker) {
			foreach ($defenders as $fleetID2 => $defender) {
				if($attacker_moc > 0) {
					foreach($attacker['detail'] as $element => $amount) {
						if ($amount <= 0)
							continue;
							
						foreach ($CombatCaps[$element]['sd'] as $c => $d) {
							if (!isset($defender['def'][$c]) || $d <= 0) 
								continue;
							
							$d = $d / $defender['techs'][0] / $defender['techs'][1] * $attacker['techs'][2];
							$defender_n[$fleetID2][$c] -= min($defender_n[$fleetID2][$c], floor($amount * $d * (rand(0, 100) / 200) * $defensePct[$fleetID2] * ($amount / $attackAmount[$fleetID])));
						}
					}
				}
				
				if($defender_moc > 0) {
					foreach($defender['def'] as $element => $amount) {
						if ($amount <= 0)
							continue;
						
						foreach ($CombatCaps[$element]['sd'] as $c => $d) {
							if (!isset($attacker['detail'][$c]) || $d <= 0) 
								continue;

							$d = $d / $defender['techs'][0] / $defender['techs'][1] * $attacker['techs'][2];
							$attacker_n[$fleetID][$c] -= min($attacker_n[$fleetID][$c], floor($amount * $d * (rand(0,100) / 200) * $attackPct[$fleetID] * ($amount / $defenseAmount[$fleetID2])));
						}
					}
				}
			}
		}

		$ROUND[$ROUNDC]['attackShield'] = $attacker_shield;
		$ROUND[$ROUNDC]['defShield'] = $defender_shield;

		foreach ($attackers as $fleetID => $attacker) {
			$attackers[$fleetID]['detail'] = array_map('round', $attacker_n[$fleetID]);
		}

		foreach ($defenders as $fleetID => $defender) {
			$defenders[$fleetID]['def'] = array_map('round', $defender_n[$fleetID]);
		}
	}

	if ($attackAmount['total'] <= 0 && $defenseAmount['total'] > 0) {
		$won = "r"; // defender
	} elseif ($attackAmount['total'] > 0 && $defenseAmount['total'] <= 0) {
		$won = "a"; // attacker
	} else {
		$won = "w"; // draw
		$ROUND[count($ROUND)] = array('attackers' => $attackers, 'defenders' => $defenders, 'attack' => $attackDamage, 'defense' => $defenseDamage, 'attackA' => $attackAmount, 'defenseA' => $defenseAmount);
	}

	// CDR
	foreach ($attackers as $fleetID => $attacker) {					   // flotte attaquant en CDR
		foreach ($attacker['detail'] as $element => $amount) {
			$TRES['attacker'] -= $pricelist[$element]['metal'] * $amount ;
			$TRES['attacker'] -= $pricelist[$element]['crystal'] * $amount ;

			$ARES['metal'] -= $pricelist[$element]['metal'] * $amount ;
			$ARES['crystal'] -= $pricelist[$element]['crystal'] * $amount ;
		}
	}

	$DRESDefs = array('metal' => 0, 'crystal' => 0);
	foreach ($defenders as $fleetID => $defender) {
		foreach ($defender['def'] as $element => $amount) {
			if ($element < 300) {							// flotte defenseur en CDR
				$DRES['metal'] -= $pricelist[$element]['metal'] * $amount ;
				$DRES['crystal'] -= $pricelist[$element]['crystal'] * $amount ;

				$TRES['defender'] -= $pricelist[$element]['metal'] * $amount ;
				$TRES['defender'] -= $pricelist[$element]['crystal'] * $amount ;
			} else {									// defs defenseur en CDR + reconstruction
				$TRES['defender'] -= $pricelist[$element]['metal'] * $amount ;
				$TRES['defender'] -= $pricelist[$element]['crystal'] * $amount ;

				$lost = $STARTDEF[$element] - $amount;
				$giveback = round($lost * (rand(56, 84) / 100));
				$defenders[$fleetID]['def'][$element] += $giveback;
				$DRESDefs['metal'] += $pricelist[$element]['metal'] * ($lost - $giveback) ;
				$DRESDefs['crystal'] += $pricelist[$element]['crystal'] * ($lost - $giveback) ;
			}
		}
	}

	$totalLost = array('att' => $TRES['attacker'], 'def' => $TRES['defender']);
	$debAttMet = ($ARES['metal'] * ($CONF['Fleet_Cdr'] / 100));
	$debAttCry = ($ARES['crystal'] * ($CONF['Fleet_Cdr'] / 100));
	$debDefMet = ($DRES['metal'] * ($CONF['Fleet_Cdr'] / 100)) + ($DRESDefs['metal'] * ($CONF['Defs_Cdr'] / 100));
	$debDefCry = ($DRES['crystal'] * ($CONF['Fleet_Cdr'] / 100)) + ($DRESDefs['crystal'] * ($CONF['Defs_Cdr'] / 100));

	return array('won' => $won, 'debree' => array('att' => array($debAttMet, $debAttCry), 'def' => array($debDefMet, $debDefCry)), 'rw' => $ROUND, 'lost' => $totalLost);
}
?>