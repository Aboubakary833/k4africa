<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TeamMemberCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $role;
    public $image;

    public function __construct($data)
    {
        $this->name = $data->name;
        $this->role = $data->role->name;
        $this->image = $data->profile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.team-member-card');
    }
}
