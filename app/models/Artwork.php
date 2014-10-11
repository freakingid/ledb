<?php

// app/models/Artwork.php

class Artwork extends Eloquent
{
    // Artwork belongstomany Person (because could have multiple authors / creators who collaborate)
    public function people()
    {
        return $this->belongsToMany('Person');
    }
    
    // Artwork hasmany Performances (could be performed numerous times)
    public function performances()
    {
        return $this->hasMany('Performance');
    }
    
    public function delete()
    {
        // TODO this is not very efficient / scalable
        // we have to go through each person and change something...
        // remove references to people        
        $this->people()->detach();
        // do we need to explicitly remove performances.artwork also? yes
        // $this->performances()->detach(); // detach is only for many-to-many;
        
        /*
            1. Find performances that have artwork_id == $this->id
            2. Set artwork_id == null on those performances
            3. Save
        */
        $this->performances()->get()->each( function( $performance )
        {
            // unset performance's reference to this artwork
            $performance->artwork_id = null;
            $performance->save();
        });

        // now delete the artwork
        return parent::delete();        
    }
}