<?php

class Veranstaltungen
{
    public $tag;
    public $vName;
    public $uhrzeitstart;
    public $uhrzeitende;
    public $redner;


    public function Veranstaltungen($tag, $vName)
    {
        $this->vName = $vName;
    }

    public function setTag($tag){
        $this->tag = $tag;
    }
    public function setZeit($uhrzeitstart, $uhrzeitende){
        $this->uhrzeitstart = $uhrzeitstart;
        $this->uhrzeitende = $uhrzeitende;
    }
    public function setRedner($redner){
        $this->redner = $redner;
    }
}
















