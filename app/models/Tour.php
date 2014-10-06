<?php

// app/models/Tour.php

class Tour extends Eloquent
{
    // tour hasMany events (each tour has many discreet events it owns alone)
    public function events()
    {
        return $this->hasMany('Event');
    }
}