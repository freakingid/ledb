<?php

// app/models/EventOccurrence.php
// NOTE: cannot use "Event" as it collides with Laravel keyword class "Event"

class EventOccurrence extends Eloquent
{
    // event belongstomany performances (more than one performance per event sometimes)
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
    // event belongsto locations (each event only has one location; for multiples use tour;)
    public function location()
    {
        return $this->belongsTo('Location');
    }
    // event belongsto tours (each event is part of only one tour; for generic use artwork;)
    public function tour()
    {
        return $this->belongsTo('Tour');
    }
}