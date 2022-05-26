<?php

class Veranstaltungen
{
    public $tag;
    public $vName;
    public $uhrzeitstart;
    public $uhrzeitende;
    public $redner;


    public function __construct($tag, $vName, $uhrzeitstart, $uhrzeitende, $redner)
    {
        $this->tag = $tag;
        $this->vName = $vName;
        $this->uhrzeitstart = $uhrzeitstart;
        $this->uhrzeitende = $uhrzeitende;
        $this->redner = $redner;
    }
}
















