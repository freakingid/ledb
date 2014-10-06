<?php

// app/models/Event.php

class Event extends Eloquent
{
    // event belongstomany performances (more than one performance per event sometimes)
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }
    // event belongsto locations (each event only has one location; for multiples use tour;)
    public function locations()
    {
        return $this->belongsTo('Location');
    }
    // event belongsto tours (each event is part of only one tour; for generic use artwork;)
    public function tours()
    {
        return $this->belongsTo('Tour');
    }
}