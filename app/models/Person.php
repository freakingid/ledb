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
        // set all related models to have null Person, or default
        // TODO this is not very efficient / scalable
        // we have to go through each performance and change something...
        
        // remove performance references
        $this->performances()->detach();
        // any other references to remove??
        // do we need to detach artworks too?

        // now delete the person
        return parent::delete();        
    }

}