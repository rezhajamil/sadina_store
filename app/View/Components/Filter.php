<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $colors;
    public $sizes;
    public $categories;

    public function __construct($colors, $sizes, $categories)
    {
        $this->colors = $colors;
        $this->sizes = $sizes;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter');
    }
}
