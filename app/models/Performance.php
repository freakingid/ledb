<?php

// app/models/Performance.php

class Performance extends Eloquent
{
    // performance belongstomany persons (more than one performer)
    public function people()
    {
        return $this->belongsToMany('Person');
    }
    // performance belongsto one artwork (only performing one work per performance)
    public function artwork()
    {
        return $this->belongsTo('Artwork');
    }
    // performance belongsto one event (each performance is specific to an event)
    public function event()
    {
        return $this->belongsTo('EventOccurrence');
    }
    
}