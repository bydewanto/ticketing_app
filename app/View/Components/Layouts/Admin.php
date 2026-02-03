<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class Admin extends Component
{
    /**
     * The page title.
     *
     * @var string|null
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('layouts.admin.admin');
    }
}


