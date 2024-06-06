<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class UpdateCommand implements Command
{
    private $data_old;
    private $data;
    private $id;
    private MinisterioModel $ministerioModel;
    
    public function __construct($data, $id)
    {
        $this->ministerioModel = new MinisterioModel();
        $this->id = $id;
        $this->data_old = $this->ministerioModel->find($id);
        $this->data = $data;
    }

    public function execute()
    {
        $this->ministerioModel->update($this->id, $this->data);
    }

    public function undo()
    {
        $this->ministerioModel->update($this->id, $this->data_old);
    }
}