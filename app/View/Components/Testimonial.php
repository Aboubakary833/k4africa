<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Testimonial extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $text;
    public $fillStarsNumber;
    public $blankStarsNumber;

    public function __construct($data)
    {
        $this->text = $data['text'];
        $this->fillStarsNumber = $data['mark'];
        $this->blankStarsNumber = 5 - $this->fillStarsNumber;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.testimonial');
    }
}
