<?php 
namespace examples;

use pocketmine\plugin\PluginBase;

class Example extends PluginBase implements Listener{

public function onEnable(): void{
    //register ban command
    $this->getServer()->getCommandMap()->register("ban", new ExampleBanCommand($this));
}
}
