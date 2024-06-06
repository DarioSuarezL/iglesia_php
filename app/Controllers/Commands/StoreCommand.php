<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class StoreCommand implements Command
{
    private $data;
    private MinisterioModel $ministerioModel;

    public function __construct($data)
    {
        $this->ministerioModel = new MinisterioModel();
        $this->data = $data;
    }

    public function execute()
    {
        $this->ministerioModel->create($this->data);
    }

    public function undo()
    {
        $this->ministerioModel->delete($this->data['id']);
    }
}