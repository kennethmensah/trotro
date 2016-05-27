<?php

include_once ('adb_object.php');

class stops extends adb_object
{
    function stops(){}

    function find_closest_stop($lat, $long, $dist){
        $str_query = "SELECT * FROM stops WHERE acos(sin($lat) * sin(stop_lat) + cos($lat) * cos(stop_lat) * cos(stop_lon - ($long))) * 6371 <= $dist";
        
        return $this->query($str_query);
    }
}