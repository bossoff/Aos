<?php
//$ip_address = $_SERVER["REMOTE_ADDR"];


function check_behind_proxy(){
        if (!empty($_SERVER["REMOTE_ADDR"])) {

                $ip_address = $_SERVER["REMOTE_ADDR"];

        }

        else if (!empty($_SERVER["HTTP_CLIENT_IP"])) 
        {
                $ip_address = $_SERVER["HTTP_CLIENT_IP"];

        }else {

                $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }

        if(!empty($ip_address)){
                $handle = fopen("approved_ips.txt", 'a');
                fwrite($handle, $ip_address.',');
                //implode(',', $ip_address);

        }
        // if(!empty($phone)){
        //         $handle = fopen('users_phone.txt', 'a');
        //         fwrite($handle, $phone.',');
        // }

        return $ip_address;      
}


?>