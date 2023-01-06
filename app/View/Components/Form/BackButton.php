<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class BackButton extends Component
{
    public function __construct(public $route)
    {
    }

    public function render(): View
    {
        return view('components.form.back-button');
    }
}
