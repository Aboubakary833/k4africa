<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $title;
     public $link;
     public $image;
     public $created_at;

    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->link = $data['link'];
        $this->image = $data['image'];
        $this->created_at = $data['created_at'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.article-card');
    }
}
