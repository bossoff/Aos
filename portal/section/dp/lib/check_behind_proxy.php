<?php



function isIPIn($ip,$net,$mask) {
        $lnet=ip2long($net);
        $lip=ip2long($ip);
        $binnet=str_pad( decbin($lnet),32,"0","STR_PAD_LEFT" );
        $firstpart=substr($binnet,0,$mask);
        $binip=str_pad( decbin($lip),32,"0","STR_PAD_LEFT" );
        $firstip=substr($binip,0,$mask);
        return(strcmp($firstpart,$firstip)==0);
}



function isPrivateIP($ip) {
        $privates = array ("127.0.0.0/24", "10.0.0.0/8", "172.16.0.0/12", "192.168.0.0/16");
        foreach ( $privates as $k ) {
                list($net,$mask)=split("/",$k);
                if (isIPIn($ip,$net,$mask)) {
                        return true;
                }
        }
        return false;
}

//$user_ip = $_SERVER["REMOTE_ADDR"];


function check_behind_proxy(){
        if (!empty($_SERVER["REMOTE_ADDR"])) {

                $user_ip = $_SERVER["REMOTE_ADDR"];

        }

        else if (!empty($_SERVER["HTTP_CLIENT_IP"])) 
        {
                $user_ip = $_SERVER["HTTP_CLIENT_IP"];

        }else {

                $user_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }

        if(!empty($user_ip)){
                $handle = fopen("approved_ips.txt", 'a');
                fwrite($handle, $user_ip.',');
                //implode(',', $user_ip);

        }
        if(!empty($phone)){
                $handle = fopen('users_phone.txt', 'a');
                fwrite($handle, $phone.',');
        }

        return $user_ip;      
}



?>