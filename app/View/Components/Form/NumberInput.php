<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class NumberInput extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public string|null $id = null,
        public string|null $placeholder = null,
        public string|null $value = null,
        public null|string $inputmode = null,
        public float|int $step = 1,
    ) {
    }

    public function render()
    {
        return view('components.form.number-input');
    }
}
