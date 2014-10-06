<?php

// app/models/Person.php

class Persons extends Eloquent
{
    // Person belongs to many artworks (one person could create numerous artworks)
    public function artworks()
    {
        return $this->belongsToMany('Artwork');
    }
    // Person belongs to many performances (surely you'll participate in more than one thing)
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
}