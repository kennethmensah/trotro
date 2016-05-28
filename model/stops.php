<?php

include_once ('adb_object.php');

class stops extends adb_object
{
    function __construct(){
        parent::__construct();
    }

    function find_closest_stop($lat, $long, $dist=1000){

        $str_query = "SELECT DISTINCT * FROM
                      stops
                      WHERE acos(sin(?) * sin(stop_lat) + cos(?) * cos(stop_lat) * cos(stop_lon - (?))) * 6371 <= ?";

        $stmt = $this->prepareQuery($str_query);

        if($stmt === false){
            return false;
        }

        $stmt->bind_param("dddd", $lat, $lat, $long, $dist);

        $stmt->execute();

        return $stmt->get_result();
    }
}


