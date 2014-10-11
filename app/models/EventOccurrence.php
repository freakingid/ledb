<?php

// app/models/EventOccurrence.php
// NOTE: cannot use "Event" as it collides with Laravel keyword class "Event"
/*
- Tour
-- Event 1
---- Location (only one)
---- Performance 1
------ Actors List
------ Artwork (only one)
---- Performance 2
------ Actors List
------ Artwork (only one)
... and so forth
*/

class EventOccurrence extends Eloquent
{
    // event has_many performances (more than one performance per event sometimes)
    public function performances()
    {
        return $this->hasMany('Performance');
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

    public function delete()
    {
        /*
            1. Find performances that have event_id == $this->id
            2. Set event_id == null on those performances
            3. Save
        */
        $this->performances()->get()->each( function( $performance )
        {
            // unset performance's reference to this artwork
            $performance->event_occurrence_id = null;
            $performance->save();
        });

        // now delete the artwork
        return parent::delete();        
    }

}