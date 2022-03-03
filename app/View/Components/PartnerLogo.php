<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerLogo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $link;
    public $image;

    public function __construct($data)
    {
        $this->name = $data->name;
        $this->link = $data->link;
        $this->image = $data->logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.partner-logo');
    }
}
