<?php 
namespace WaterDog\Zeao;

use pocketmine\plugin\PluginBase;

use WaterDog\Zeao\listener\EventListener;
use pocketmine\Player;

class Loader extends PluginBase{
    public $API;
    public static $instance;
    
    public function onEnable(): void{
        self::$instance = $this;
        $this->API = new API();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
    static public function getInstance(): self{
return self::$instance;
    }
    public function getAPI(): API{
        return $this->API;
    }
}
