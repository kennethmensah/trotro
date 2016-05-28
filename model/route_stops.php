<?php

include_once ('adb_object.php');

class route_stops extends adb_object
{
    function __construct(){
        parent::__construct();
    }

    function get_route_stop(){

        $str_query = "SELECT
                      DISTINCT routes.route_id, from_terminal, to_terminal, stops.stop_id, stops.stop_name
                      FROM routes INNER JOIN stops
                      ON routes.stop_id = stops.stop_id
                      AND routes.trip_id = stops.trip_id";

    }

    function find_closest_stops(){

}

}