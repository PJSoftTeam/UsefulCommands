<?php
    
    namespace PJSoft\UsefulCommands\Command;
    
    use PJSoft\UsefulCommands\Main;
    use pocketmine\command\Command;
    use pocketmine\command\CommandSender;
    use pocketmine\Player;
    
    class MeCommand extends Command
    {
        private $plugin;
        
        public function __construct(Main $plugin)
        {
            $name = "me";
            $description = "チャットで指定したアクションを実行します";
            $usageMessage = "/me < アクション >";
            $aliases = array();
            parent::__construct($name, $description, $usageMessage, $aliases);
            $this->setPermission("usefulcommands.command.me");
            $this->plugin = $plugin;
        }
        
        public function execute(CommandSender $sender, string $commandLabel, array $args): bool
        {
            /*if ( !$sender instanceof Player ) {
                $sender->sendMessage(Main::ERROR_TAG . "このコマンドはプレイヤーのみ実行できます");
                return true;
            } else {
                $player = $sender;
                $name = $player->getName();
            }*/
            if ( !isset($args[0]) ) {
                $sender->sendMessage(Main::ERROR_TAG . "使用方法：{$this->getUsage()}");
                return true;
            }
            if ( $sender instanceof Player ) {
                $player = $sender;
                $display_name = $player->getDisplayName();
            } else {
                $display_name = $sender->getName();
            }
            $action = "";
            for ( $i = 0; $i < count($args); $i++ ) {
                if ( $i === 0 ) {
                    $action .= $args[$i];
                } else {
                    $action .= " " . $args[$i];
                }
            }
            $this->plugin->getServer()->broadcastMessage("* {$display_name} {$action}");
            return true;
        }
        
    }