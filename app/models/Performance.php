<?php

// app/models/Performance.php

class Performance extends Eloquent
{
    // performance belongstomany persons (more than one performer)
    public function people()
    {
        $this->belongsToMany('Person');
    }
    // performance belongsto one artwork (only performing one work per performance)
    public function artworks()
    {
        $this->belongsTo('Artwork');
    }
    // performance belongsto one event (each performance is specific to an event)
    public function events()
    {
        $this->belongsTo('EventOccurrence');
    }
    
}