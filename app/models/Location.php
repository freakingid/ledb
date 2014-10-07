<?php

// app/models/Location.php

class Location extends Eloquent
{
    // each location belongsto many events (surely you'll have more than one event at a venue in its lifetime)
    public function events()
    {
        return $this->belongsToMany('EventOccurrence');
    }
}