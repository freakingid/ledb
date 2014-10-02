<?php

// app/models/Person.php

class Persons extends Eloquent
{
    // Person hasmany Artwork
    public function artworks()
    {
        return $this->hasMany('Artwork');
    }
}