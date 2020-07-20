<?php 
namespace WaterDog\Zeao;

use pocketmine\plugin\PluginBase;

use WaterDog\Zeao\listener\EventListener;
use pocketmine\Player;

class Loader extends PluginBase{
    public $API;
    
    public function onEnable(): void{
        $this->API = new API();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
    public function getAPI(): API{
        return $this->API;
    }
}