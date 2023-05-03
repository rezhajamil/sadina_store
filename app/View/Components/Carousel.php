<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Carousel extends Component
{

    public $images;
    public $name;
    public $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($images, $name = '', $category = '')
    {
        $this->images = $images;
        $this->name = $name;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
