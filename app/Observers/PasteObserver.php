<?php

namespace App\Observers;

use App\Models\Paste;

class PasteObserver
{
    /**
     * Randomly generate a unique key for new pastes.
     *
     * @param Paste $paste
     * @return void
     */
    public function creating(Paste $paste): void
    {
        $paste->key = Paste::generateUniqueKey();
    }
}
