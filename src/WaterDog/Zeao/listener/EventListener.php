<?php

namespace WaterDog\Zeao\listener;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;

use WaterDog\Zeao\Loader;
use WaterDog\Zeao\API;
use pocketmine\Player;


class EventListener implements Listener{
	public $plugin;
public function ___construct(Loader $plugin){
    $this->plugin = $plugin;
}
    public function onIP(DataPacketReceiveEvent $event){
		$packet = $event->getPacket();
			if($packet instanceof LoginPacket){
                $user = $packet->username;
				//this is so the ip can be detected upon spawned
				//and if it instancesof a player, so it doesn't assume the player is offline.
				$player = $this->plugin->getServer()->getPlayerExact($user);
				if($player->spawned and $player instanceof Player){ 
               API::getClientIP($player) = $packet->clientData["Waterdog_IP"]; //todo fix getClientIP() for players that haven't quite joined yet.
										//This is just a messy hack for now. In future updates, I plan to recode this mess completely.
            }
    }
}
}
