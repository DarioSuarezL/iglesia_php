<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class StoreCommand implements Command
{
    private $ministerioModel;

    public function __construct($ministerioModel)
    {
        $this->ministerioModel = $ministerioModel;
    }


    public function execute()
    {
        $this->ministerioModel = (new MinisterioModel)->create($this->ministerioModel);
    }

    public function undo()
    {
        (new MinisterioModel)->delete($this->ministerioModel['id']);
    }
}