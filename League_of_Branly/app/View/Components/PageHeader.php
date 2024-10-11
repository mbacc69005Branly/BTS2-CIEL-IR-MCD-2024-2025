<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $createRoute;

    public function __construct($title, $createRoute)
    {
        $this->title = $title;
        $this->createRoute = $createRoute;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
