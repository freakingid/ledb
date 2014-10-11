<?php

// app/models/Location.php

class Location extends Eloquent
{
    // each location belongsto many events (surely you'll have more than one event at a venue in its lifetime)
    public function events()
    {
        return $this->hasMany('EventOccurrence');
    }

    public function delete()
    {
        /*
            1. Find events that have location_id == $this->id
            2. Set location_id == null on those events
            3. Save
        */
        $this->events()->get()->each( function( $event )
        {
            // unset event's reference to this location
            $event->location_id = null;
            $event->save();
        });

        // now delete the location
        return parent::delete();        
    }
}