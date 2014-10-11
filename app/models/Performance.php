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
        // provided optional 'event_occurrence_id' column name since it is not "event_id"
        return $this->belongsTo('EventOccurrence', 'event_occurrence_id');
    }
    
    public function delete()
    {
        // set all related models to have null Performance, or default
        // TODO this is not very efficient / scalable
        // we have to go through each person and change something...
        // remove references to people        
        $this->people()->detach();
        // do we need to detach artwork and event also, here??

        // now delete the performance
        return parent::delete();        
    }
}