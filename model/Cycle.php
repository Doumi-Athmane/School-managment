<?php

class Cycle extends Model{

    public function __construct()
    {
        $this->table = "cycle";
        $this->getBDD();
        
    }
}