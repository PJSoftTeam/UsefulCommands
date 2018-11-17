<?php
    
    namespace PJSoft\UsefulCommands;
    
    use PJSoft\UsefulCommands\Command\MeCommand;
    use PJSoft\UsefulCommands\Command\MesCommand;
    use pocketmine\plugin\PluginBase;
    
    class Main extends PluginBase
    {
        const SYSTEM_TAG = "§l§bSYSTEM §8>> §r§6";
        const ERROR_TAG = "§l§4ERROR §8>> §r§4";
        const TITLE = "§l§6UsefulCommands";
        
        protected function onEnable(): void
        {
            $this->getLogger()->info("{$this->getDescription()->getName()} {$this->getDescription()->getVersion()}が有効になりました");
            $this->getServer()->getCommandMap()->register("me", new MeCommand($this));
            $this->getServer()->getCommandMap()->register("mes", new MesCommand($this));
        }
        
        protected function onDisable(): void
        {
            $this->getLogger()->info("{$this->getDescription()->getName()} {$this->getDescription()->getVersion()}が無効になりました");
        }
        
    }