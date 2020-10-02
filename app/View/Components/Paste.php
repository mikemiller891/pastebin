<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Paste extends Component
{
    public $readonly;

    public $tag;

    /**
     * Create a new component instance.
     *
     * @param bool $readonly
     */
    public function __construct($readonly = false)
    {
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return string
     */
    public function render()
    {
        if ($this->readonly) {
            $this->tag = 'div';
        } else {
            $this->tag = 'textarea';
        }

        return <<<'blade'
        <{{ $tag }}
          class="h-full w-full
            bg-white dark:bg-black text-black dark:text-white
            text-l font-mono
            resize-none
            p-4
            whitespace-pre-wrap
            overflow-y-scroll"
          {{ $attributes }}>{{ $slot }}</{{ $tag }}>
blade;
    }
}
