<?php

namespace App\Controllers\Templates;

class SacramentoClient
{
    private Sacramento $sacramento;

    public function __construct(Sacramento $sacramento)
    {
        $this->sacramento = $sacramento;
    }

    public function realizar($data)
    {
        $this->sacramento->realizar($data);
    }

    public function deshacer($id)
    {
        $this->sacramento->deshacer($id);
    }
}