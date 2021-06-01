<?php

class BLLGame 
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $gamename;
    public $agerating;
    public $platform;
    public $genre;
    public $rank;
    public $releasedate;
    public $editorialscore;
    public $audiencescore;
    public $fullreview;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLListItem
{
    //-------CLASS FIELDS------------------
	public $id = null;
	public $gamename;
   
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLRevList
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $rank;
    public $gamelist;
    public $editorialscore;
    public $audiencescore;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

?>