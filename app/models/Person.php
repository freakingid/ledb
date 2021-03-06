<?php

// app/models/Person.php

class Person extends Eloquent
{
    // Person belongs to many artworks (one person could create numerous artworks)
    public function artworks()
    {
        return $this->belongsToMany('Artwork');
    }
    // Person belongs to many performances (surely you'll participate in more than one thing)
    public function performances()
    {
        return $this->belongsToMany('Performance');
    }

    // deleting the person object
    public function delete()
    {
        // remove performance references
        $this->performances()->detach();
        
        // remove artwork references
        $this->artworks()->detach();

        // now delete the person
        return parent::delete();        
    }

}