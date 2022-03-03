<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PromoCard extends Component
{
    public $title;
    public $original;
    public $gradient;
    public $text;

    public function __construct($data)
    {
        $data = json_decode($data, true);
        $this->title = $data['title'];
        $this->original = $data['images']['original'];
        $this->gradient = $data['images']['gradient'];
        $this->text = $data['text'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.promo-card');
    }
}
