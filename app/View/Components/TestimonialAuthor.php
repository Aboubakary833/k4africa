<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestimonialAuthor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $name;
     public $role;
     public $company;
     public $image;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->role = $data['role'];
        $this->company = $data['company'];
        $this->image = $data['image'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.testimonial-author');
    }
}
