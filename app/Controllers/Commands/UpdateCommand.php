<?php

namespace App\Controllers\Commands;
use App\Models\MinisterioModel;

class UpdateCommand implements Command
{
    private $ministerioModel;
    private $data;
    private $id;
    
    public function __construct($data, $id)
    {
        $this->id = $id;
        $this->ministerioModel = (new MinisterioModel)->find($id);
        $this->data = $data;
    }

    public function execute()
    {
        (new MinisterioModel)->update($this->id, $this->data);
    }

    public function undo()
    {
        (new MinisterioModel)->update($this->id, $this->ministerioModel);
    }
}