<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class StoreCommand implements Command
{
    private $data;
    private $id;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        $this->id = (new MinisterioModel)->create($this->data)['id'];
    }

    public function undo()
    {
        (new MinisterioModel)->delete($this->id);
    }
}