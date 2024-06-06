<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class DestroyCommand implements Command
{

    private MinisterioModel $ministerioModel;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        (new MinisterioModel)->delete($this->data['id']);
    }

    public function undo()
    {
        (new MinisterioModel)->create($this->data);
    }

}