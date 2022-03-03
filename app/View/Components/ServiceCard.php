<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ServiceCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $original;
    public $hovered;
    public $text;
    public $link;

    public function __construct($data)
    {
        $this->title = $data->name;
        $this->original = "assets/images/icons/service/service-1.png";
        $this->hovered = "assets/images/icons/service/service-1-hover.png";
        $this->text = $data->title;
        $this->link = route('details.subpage', $data->slug->value);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.service-card');
    }
}
