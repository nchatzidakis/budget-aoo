<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
    public function __construct(
        public string $name,
        public string $label,
        public array $values,
        public string|null $id = null,
        public string|null $value = null
    )
    {
    }

    public function render(): View
    {
        return view('components.form.select');
    }
}
