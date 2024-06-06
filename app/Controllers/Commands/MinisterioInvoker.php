<?php

namespace App\Controllers\Commands;

class MinisterioInvoker
{
    private Command $command;
    private $command_history = [];

    public function __construct(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->command_history = $_SESSION['command_history'] ?? [];
    }


    public function setCommand(Command $cmd)
    {
        $this->command = $cmd;
    }

    public function executeCommand()
    {
        $this->command->execute();
        $this->command_history[] = $this->command;
        $_SESSION['command_history'] = $this->command_history;
    }

    public function undoCommand()
    {
        $cmd = array_pop($this->command_history);
        if ($cmd != null) {
            $cmd->undo();
        }
        $_SESSION['command_history'] = $this->command_history;
    }

}