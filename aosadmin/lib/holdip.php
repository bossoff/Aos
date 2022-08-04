<?php



// $approved_ips = $static_ips = '';
// function ban_ip($ip,$ip2)
// {
//   global $static_ips;

//   $filename = file('/bannedips.txt');
//   if (is_writable($filename)) {
//       if (!$handle = fopen($filename, 'a')) 
//     return "Cannot open file ($filename)";
//       if (!is_ip_approved($ip))
//       {
//          if (!is_ip_banned($ip) && fwrite($handle, "$ip\n") === FALSE) 
//        return "Cannot write to file ($filename)";
//          else
//          $static_ips[] = "$ip\n";
//       }
//       if ($ip2 && !is_ip_approved($ip2))
//           if (!is_ip_banned($ip2) && fwrite($handle, "$ip2\n") === FALSE) 
//         return "Cannot write to file ($filename)";
//           else
//         $static_ips[] = "$ip2\n";
//      fclose($handle);
//   } 
//   else 
//     return "The file $filename is not writable";
//   return '';
// }

// function is_ip_banned($ip)
// {
//   global $static_ips;
//   $filename = file('/bannedips.txt');
//   if (!is_array($static_ips))
//       $static_ips = file($filename);
//   return in_array("$ip\n",$static_ips);
// }

// function is_ip_approved($ip)
// {
//   global $approved_ips;
//   $filename = file('/approvedips.txt');
//   if (!is_array($approved_ips))
//       $approved_ips = file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//   return in_array($ip,$approved_ips);
// }

// if(!function_exists('error')) {
// function error($mess) {
//   header('Content-Type: text/plain; charset=UTF-8');
//   echo "ERROR: $mess";
//   die;
// }
// }

// define('_is_utf8_split',5000); 
// function is_utf8($string) { // v1.01 
//     if (strlen($string) > _is_utf8_split) { 
//         // Based on: http://mobile-website.mobi/php-utf8-vs-iso-8859-1-59 
//         for ($i=0,$s=_is_utf8_split,$j=ceil(strlen($string)/_is_utf8_split);$i < $j;$i++,$s+=_is_utf8_split) { 
//             if (is_utf8(substr($string,$s,_is_utf8_split))) 
//                 return true; 
//         } 
//         return false; 
//     } else { 
//         // From http://w3.org/International/questions/qa-forms-utf-8.html 
//         return preg_match('%^(?: 
//                 [\x09\x0A\x0D\x20-\x7E]            # ASCII 
//             | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte 
//             |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs 
//             | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte 
//             |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates 
//             |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3 
//             | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15 
//             |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16 
//         )*$%xs', $string); 
//     } 
// } 


?>