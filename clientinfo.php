<?php 
require("arrays.php");
error_reporting(E_ERROR | E_PARSE);
function getMac()
{
$arp=`arp -a`;
$lines=explode("\n",$arp);
$ipmac=array();
foreach ($lines as $line){
    $line=preg_replace('/\s\s+/',' ',$line);
    $info=explode(" ",$line);
    if(isset($info[3])&&$info[3]=="dynamic")
    {
        $ipmac[$info[1]]=$info[2];
    }
}
if($_SERVER['REMOTE_ADDR']!="::1"){
    return $ipmac[$_SERVER['REMOTE_ADDR']];
}
else{
    return "Local Host";
}
}

function androidInfo(){
$devise_info=array();
$devise_info[]=explode(";",explode(")",explode("(",$_SERVER["HTTP_USER_AGENT"])[1])[0])[1];
$devise_info[]=explode(";",explode(")",explode("(",$_SERVER["HTTP_USER_AGENT"])[1])[0])[2];
return $devise_info;
}

function getOS() { 

global $user_agent;
global $os_array;
$os_platform  = "Unknown OS Platform";

foreach ($os_array as $regex => $value)
    {
        if (preg_match($regex, $user_agent))
        {
            $os_platform = $value;
        }


    }
return $os_platform;
}

function getBrowser() {

global $user_agent;
global $browser_array;
global $mobile_array;

$browser        = "Unknown Browser";
foreach ($browser_array as $regex => $value)
{
    if (preg_match($regex, $user_agent))
    {
        $browser = $value;
        if($browser=="Handheld Browser")
        {
            foreach($mobile_array as $regex1=>$value1)
            {
                if (preg_match($regex1, $user_agent))
                {
                    $browser = $value1;
                }
            }
        }
    }
} 

return $browser;
}

function browservertion($value){
global $browser_array;
global $user_agent;
global $mobile_array;
if(getOS()!="Android")
{
$key=array_search($value,$browser_array);
$key=ucfirst(substr($key,1,strlen($key)-2));
if(explode($key,$user_agent)[1]!=null)
{
    $end=explode(" ",explode($key,$user_agent)[1])[0];
}
else{
    $end=explode(" ",explode($key,$user_agent)[0]);
}
return $end;
}
else{
$key=array_search($value,$mobile_array);
$key=ucfirst(substr($key,1,strlen($key)-2));
if(explode($key,$user_agent)[1]!=null)
{
    $end=explode(" ",explode($key,$user_agent)[1])[0];
}
else{
    $end=explode(" ",explode($key,$user_agent)[0]);
}
return $end;
}
}
?>