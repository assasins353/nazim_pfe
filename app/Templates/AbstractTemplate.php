<?php

namespace App\Templates;

use Illuminate\View\View;

abstract class AbstractTemplate
{
    protected $view;

    abstract public function prepare(View $view);

    public function getView()
    {
        return $this->view;
    }
}
