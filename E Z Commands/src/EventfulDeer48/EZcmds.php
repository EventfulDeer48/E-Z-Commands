<?php

namespace EventfulDeer48;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerMoveEvent;

class Main extends PluginBase implements Listener {

  public function onEnable() : void {

    $this->getLogger()->info(TextFormat::GREEN . "E Z Commands is now enabled on " . $this->getServer()->getName());
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onLoad() : void {

    $this->getLogger()->info(TextFormat::BLUE . "E Z Commands is now loaded on " . $this->getServer()->getName());
  }

  public function onDisable() : void {

    $this->getLogger()->info(TextFormat::RED . "E Z Commands is now disabled on " . $this->getServer()->getName());
  }

  public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {

    $command = strtolower($command->getName());
    $prefix = TextFormat::GRAY . "> ";

    switch($command) {

      case "gmc":

        if ($sender->hasPermission("ezcmds.gamemode") || $sender->hasPermission("ezcmds.*")) {

          if (!$args) {

            if ($sender->Gamemode() === 1) {

              $sender->sendMessage($prefix . TextFormat::RED . "Your gamemode is already Creative!");
              return true;

            } else {

              $sender->setGamemode(1);
              $sender->sendMessage($prefix . TextFormat::GREEN . "Your gamemode has been set to Creative.");
              return true;
            }

          } elseif ($args[0]) {

            $player = $this->getServer()->getPlayerExact("$args[0]");

            if (!$player) {

              $sender->sendMessage($prefix . TextFormat::RED . "Player " . $args[0] . TextFormat::RED . " not found.");
              return true;

            } else {

              $player->setGamemode(1);
              $player->sendMessage($prefix . TextFormat::YELLOW . "Your gamemode has been set to Creative.");
              $sender->sendMessage($prefix . TextFormat::GREEN . $player->getName() . "'s has been set to Creative.");
              return true;
            }
          }
        }
        break;

        case "gms":

        if ($sender->hasPermission("ezcmds.gamemode") || $sender->hasPermission("ezcmds.*")) {

          if (!$args) {

            if ($sender->Gamemode() === 0) {

              $sender->sendMessage($prefix . TextFormat::RED . "Your gamemode is already Survival!");
              return true;

            } else {

              $sender->setGamemode(0);
              $sender->sendMessage($prefix . TextFormat::GREEN . "Your gamemode has been set to Survival.");
              return true;
            }

          } elseif ($args[0]) {

            $player = $this->getServer()->getPlayerExact("$args[0]");

            if (!$player) {

              $sender->sendMessage($prefix . TextFormat::RED . "Player " . $args[0] . TextFormat::RED . " not found.");
              return true;

            } else {

              $player->setGamemode(0);
              $player->sendMessage($prefix . TextFormat::YELLOW . "Your gamemode has been set to Survival.");
              $sender->sendMessage($prefix . TextFormat::GREEN . $player->getName() . "'s has been set to Survival.");
              return true;
            }
          }
        }
        break;

        case "gma":

        if ($sender->hasPermission("ezcmds.gamemode") || $sender->hasPermission("ezcmds.*")) {

          if (!$args) {

            if ($sender->Gamemode() === 2) {

              $sender->sendMessage($prefix . TextFormat::RED . "Your gamemode is already Adventure!");
              return true;

            } else {

              $sender->setGamemode(2);
              $sender->sendMessage($prefix . TextFormat::GREEN . "Your gamemode has been set to Adventure.");
              return true;
            }

          } elseif ($args[0]) {

            $player = $this->getServer()->getPlayerExact("$args[0]");

            if (!$player) {

              $sender->sendMessage($prefix . TextFormat::RED . "Player " . $args[0] . TextFormat::RED . " not found.");
              return true;

            } else {

              $player->setGamemode(2);
              $player->sendMessage($prefix . TextFormat::YELLOW . "Your gamemode has been set to Adventure.");
              $sender->sendMessage($prefix . TextFormat::GREEN . $player->getName() . "'s has been set to Adventure.");
              return true;
            }
          }
        }
    }
  }
}
?>
