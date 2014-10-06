<?php

// app/models/Artwork.php

class Artwork extends Eloquent
{
    // Artwork belongstomany Person (because could have multiple authors / creators who collaborate)
    public function people()
    {
        return $this->belongsToMany('Person');
    }
    
    // Artwork hasmany Performances (could be performed numerous times)
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
}