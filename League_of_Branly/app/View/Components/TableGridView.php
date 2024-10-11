<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableGridView extends Component
{
    public $title;
    public $items;
    public $columns;
    public $routePrefix;

    public function __construct($title, $items, $columns, $routePrefix)
    {
        $this->title = $title;
        $this->items = $items;
        $this->columns = $columns;
        $this->routePrefix = $routePrefix;
    }

    public function render()
    {
        return view('components.table-grid-view');
    }
}
