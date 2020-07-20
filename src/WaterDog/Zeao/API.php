<?php 
namespace WaterDog\Zeao;
use pocketmine\Player;

class API{
    static public $clientIP = [];

static public function getClientIP(Player $player): string{
        return (string)self::$clientIP[$player->getLowerCaseName()];
}
}
