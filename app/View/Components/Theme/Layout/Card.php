<?php

namespace App\View\Components\Theme\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Card extends Component
{
    public function __construct(
        public string $wrapper_css_class = 'w-1/2 mx-auto mt-5',
        public string $title = '',
    ) {
        //
    }

    public function render(): View
    {
        return view('components.theme.layout.card');
    }
}
