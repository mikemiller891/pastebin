<?php

namespace App\Observers;

use App\Models\Paste;

class PasteObserver
{
    /**
     * Randomly generate a unique key for new pastes.
     *
     * @param  \App\Models\Paste  $paste
     * @return void
     */
    public function creating(Paste $paste)
    {
        $paste->key = Paste::generateUniqueKey();
    }
}
