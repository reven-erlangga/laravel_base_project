<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title, $header, $footer;
    public $type, $nobackbutton;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $type = '', $nobackbutton = null)
    {
        $this->title = $title;
        $this->type = $type;
        $this->nobackbutton = $nobackbutton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
