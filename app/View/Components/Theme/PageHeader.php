<?php

namespace App\View\Components\Theme;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public function __construct(
        public string $h1,
        public string $h2,
    ) {
    }

    public function render()
    {
        return view('components.theme.page-header');
    }
}
