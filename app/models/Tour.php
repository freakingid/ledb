<?php

// app/models/Tour.php

class Tour extends Eloquent
{
    // tour hasMany events (each tour has many discreet events it owns alone)
    public function events()
    {
        return $this->hasMany('EventOccurrence');
    }

    public function delete()
    {
        /*
            1. Find events that have tour_id == $this->id
            2. Set tour_id == null on those events
            3. Save
        */
        $this->events()->get()->each( function( $event )
        {
            // unset event's reference to this location
            $event->tour_id = null;
            $event->save();
        });

        // now delete the location
        return parent::delete();        
    }
}