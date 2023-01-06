<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class TextInput extends Component
{
    public function __construct(
        public $name,
        public $label,
        public $id = null,
        public $placeholder = null,
        public $value = null
    )
    {
    }

    public function render(): View
    {
        return view('components.form.text-input');
    }
}
