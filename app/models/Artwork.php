<?php

// app/models/Artwork.php

class Artwork extends Eloquent
{
    // Artwork belongstomany Person
    public function people()
    {
        return $this->belongsToMany('Person');
    }
}