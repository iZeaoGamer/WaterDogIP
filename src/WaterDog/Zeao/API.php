<?php

namespace WaterDog\Zeao;

use pocketmine\Player;
use pocketmine\OfflinePlayer;

class API{
    static $clientIP = [];

static function getClientIP(Player $player): string{
        return (string)self::$clientIP[$player->getLowerCaseName()];
}
static function getConnectingClientIP(string $player): string{
    return (string)self::$clientIP[$this->getLowerCaseName($player)];
}
/**
	 * Checks if a player is online/offline or null.
	 *
	 * @param string $name
	 * @return null|OfflinePlayer|Player
	 */
	static function checkPlayerAvailability(string $name){
		$playerClass = Loader::getInstance()->getServer()->getOfflinePlayer($name);
		if($playerClass instanceof Player){
			return $player;
		}
		if($playerClass instanceof OfflinePlayer){
			if($playerClass->hasPlayedBefore()){
				return $playerClass;
			}else{
				return null;
			}
		}
		return null;
    }
 /**
	 * Checks a lower case name of a player.
	 *
     * If player is online, it'll return as a lowercase name.
     * If the player doesn't exit and has never joined the server before,
     * it'll return null
	 * @param string $player
	 * @return null|string
	 */
static function getLowerCasedName(string $player): ?string{
$playerClass = Loader::getInstance()->getServer()->getOfflinePlayer($player);
		if($playerClass instanceof Player){
			return $player->getLowerCaseName();
		}
		if($playerClass instanceof OfflinePlayer){
			if($playerClass->hasPlayedBefore()){
				return strtolower($playerClass->getName());
			}else{
				return null;
			}
		}
		return null;
	}
}