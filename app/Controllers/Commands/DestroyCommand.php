<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class DestroyCommand implements Command
{

    private $ministerioModel;

    public function __construct($ministerioModel)
    {
        $this->ministerioModel = $ministerioModel;
    }

    public function execute()
    {
        (new MinisterioModel)->delete($this->ministerioModel['id']);
    }

    public function undo()
    {
        (new MinisterioModel)->create($this->ministerioModel);
    }

}