<?php 
namespace examples;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use WaterDog\Zeao\API;
use pocketmine\utils\TextFormat;

class ExampleBanCommand extends Command{
    //ExampleBanCommand constructor
    public function __construct(Example $plugin){
        parent::__construct("exampleban", "Bans an exampled player using getClientIP() detection.", "/exampleban <player> <reason>");
        $this->plugin = $plugin;
    }
    //ban command 
    public function execute(CommandSender $sender, string $label, array $args): bool{
        if ($this->testPermissionSilent($sender)) {
            if(!isset($args[0])){
                $sender->sendMessage(TextFormat::colorize("&5Please use: &6" . $this->getUsage()));
                return false;
            }
            $banList = $sender->getServer()->getIPBans();
            if ($banList->isBanned($args[0])) {
                $sender->sendMessage(TextFormat::colorize("&cThis player's IP is already banned, silly!"));
                return false;
            }
            
            $player = $sender->getServer()->getPlayer($args[0]);
            $ip = API::getClientIP($player);
            if(isset($args[1])){
                if ($ip != null) {
                    $banList->addBan($ip, null, null, $sender->getName());
                    foreach ($sender->getServer()->getOnlinePlayers() as $onlinePlayers) {
                        if (API::getClientIP($onlinePlayers) == $ip) {
                            $onlinePlayers->kick(TextFormat::RED . "You have been IP banned", false);
                        }
                    }
                       } else {
                    if ($player != null) {
                        $banList->addBan(API::getClientIP($player), null, null, $sender->getName());
                        $player->kick(TextFormat::RED . "You have been IP banned.", false);
    
                    } else {
                        $sender->sendMessage(TextFormat::colorize("&cThis player is not online."));
                    }
                }
            } else if (count($args) >= 2) {
                $reason = "";
                for ($i = 1; $i < count($args); $i++) {
                    $reason .= $args[$i];
                    $reason .= " ";
                }
                $reason = substr($reason, 0, strlen($reason) - 1);
                if ($ip != null) {
                    $sender->getServer()->getIPBans()->addBan($ip, $reason, null, $sender->getName());
                    foreach ($sender->getServer()->getOnlinePlayers() as $players) {
                        if (API::getClientIP($players) == $ip) {
                            $players->kick(TextFormat::RED . "You have been IP banned for " . TextFormat::AQUA . $reason . TextFormat::RED . ".", false);
                        }
                    }
                      } else {
                    if ($player != null) {
                        $banList->addBan(API::getClientIP($player), $reason, null, $sender->getName());
                        $player->kick(TextFormat::RED . "You have been IP banned for " . TextFormat::AQUA . $reason . TextFormat::RED . ".", false);
                    } else {
                        $sender->sendMessage(TextFormat::colorize("&cThis player is not online."));
                    }
                }
            } else {
                $sender->sendMessage(TextFormat::colorize("&cYou do not have permission to use this action."));
            }
        }
        return true;
    }
}
