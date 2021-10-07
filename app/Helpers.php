<?php
use App\Models\User;

if (!function_exists('get_formetted_date')) {

    function get_formetted_date($date,$format){
        $formattedDate = date($format,strtotime($date));
        return $formattedDate;
    }
}

if (!function_exists('login_user_name')) {
    
    function login_user_name(){
        if (Session::has('userid')) {            
            $userdata = User::where('id', '=', Session::get('userid'))->first();
            echo $userdata->name;
        }
    }
}