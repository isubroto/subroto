<?php  function Datenow() {
    return date("Y-m-d H:i:s");
}
date_default_timezone_set('Asia/Dhaka');
function randString($length){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>