<?php

class Level extends Model{

    public function __construct()
    {
        $this->table = "level";
        $this->getBDD();
        
    }
}