<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class RadioButtonInput extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public array $values,
        public string|null $id = null,
        public string|null $value = null)
    {
    }

    public function render()
    {
        return view('components.form.radio-button-input');
    }
}
