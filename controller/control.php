<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 5/27/2016
 * Time: 8:45 PM
 */

if (!isset($_REQUEST['cmd'])){
    exit();
}else {


    $cmd = intval($_REQUEST['cmd']);

    switch ($cmd) {
        case 0:
//        find_stop();
            break;
        case 1:
            find_closest_stops();
            break;
        default:
            break;
    }
}

 function find_stops(){
     
 }


function find_closest_stops(){
    if(isset($_REQUEST['lat']) && isset($_REQUEST['long'])){
        $lat = $_REQUEST['lat'];
        $long = $_REQUEST['long'];
        $dist = $_REQUEST['dist'];

        $stops = get_stop_model();
        $request = $stops->find_closest_stop($lat, $long, $dist);
        $result = $request->fetch_all(MYSQLI_ASSOC);

        if(count($result) < 1){
            echo '{"result":0, "message": "No result"}';
        }else{
            $message =  '{"result":1, "locations":';
            $message.= json_encode($result);
            $message.= '}';

            echo $message;
        }
    }
}




function get_stop_model(){
    include_once '../model/stops.php';

    $stops = new stops();
    return $stops;
}
