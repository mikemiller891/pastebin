<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
        <button
          class="bg-{{ $color }}-500 hover:bg-{{ $color }}-700 dark:hover:bg-{{ $color }}-300
            text-black dark:text-white hover:text-white dark:hover:text-black
            uppercase text-l font-bold
            py-1 px-4 rounded-full
            opacity-50 hover:opacity-100"
          type="submit"
          name="cmd"
          {{ $attributes }}>{{ $slot }}</button>
blade;
    }
}
