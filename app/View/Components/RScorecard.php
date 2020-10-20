<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RScorecard extends Component
{
    public $href;
    public $class;
    public $caption;
    public $score;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href, $class, $caption, $score)
    {
        $this->href = $href;
        $this->class = $class;
        $this->caption = $caption;
        $this->score = $score;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.r-scorecard');
    }
}
