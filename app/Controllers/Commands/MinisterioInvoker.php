<?php

namespace App\Controllers\Commands;

class MinisterioInvoker
{
    private Command $command;
    private $command_history = [];

    public function __construct(){}

    public function setCommand(Command $cmd)
    {
        $this->command = $cmd;
    }

    public function executeCommand()
    {
        $this->command->execute();
        $this->command_history[] = $this->command;
    }

    public function undoCommand()
    {
        $cmd = array_pop($this->command_history);
        if ($cmd != null) {
            $cmd->undo();
        }else{
            echo "No hay comandos para deshacer";
        }
    }

}