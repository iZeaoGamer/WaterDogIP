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
				 API::$clientIP[API::getLowerCasedName($user)] = $packet->clientData["Waterdog_IP"]; 
		
            }
    }
}
