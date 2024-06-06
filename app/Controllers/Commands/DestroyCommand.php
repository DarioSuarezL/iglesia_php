<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class DestroyCommand implements Command
{

    private MinisterioModel $ministerioModel;
    private $data;

    public function __construct($data)
    {
        $this->ministerioModel = (new MinisterioModel);
        $this->data = $data;
    }

    public function execute()
    {
        $this->ministerioModel->delete($this->data['id']);
    }

    public function undo()
    {
        $this->ministerioModel->create($this->data);
    }

}