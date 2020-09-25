<?php

namespace App\Observers;

use App\Models\Paste;

class PasteObserver
{
    /**
     * @param Paste $paste
     */
    public function creating(Paste $paste): void
    {
        $paste->key = Paste::generateUniqueKey();
    }
}
