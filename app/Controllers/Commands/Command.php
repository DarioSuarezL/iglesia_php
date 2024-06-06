<?php

namespace App\Controllers\Commands;

interface Command
{
    public function execute();
    public function undo();
}