<pre>
<?php 
/*require("arrays.php");
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
    return $ipmac[$_SERVER['REMOTE_ADDR']];
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

$user_os        = getOS();
$user_browser   = getBrowser();
$user_mac       = getMac();
$user_browser_version=browservertion($user_browser);
if($user_os=="Android"){
    $androidinfo=androidInfo();
    $device_details = "<strong>Operating System: </strong>".$user_os."<br/><strong>Vertion: </strong>".$androidinfo[0]."<br/><strong>Model: </strong>".$androidinfo[1]."<br/><strong>Browser: </strong>".$user_browser."<br/><strong>Browser Version: </strong>".$user_browser_version."<br/><strong>Mac: </strong>".$user_mac;
}
else{
    $device_details = "<strong>Operating System: </strong>".$user_os."<br/><strong>Browser: </strong>".$user_browser."<br/><strong>Browser Version: </strong>".$user_browser_version."<br /><strong>Mac: </strong>".$user_mac;
}

print_r($device_details);
echo date("d/m/Y : h.i A");*/
$tables=null;$collumns=null;$joiningcondition=null;$condition=null;
echo "SELECT lenth.length FROM company,thikness,lenth WHERE company.c_id=thikness.c_id and thikness.t_id=lenth.t_id and company.Company_name='nnnnn'<br/><br/><br/><br/>\n ";
//echo md5($_REQUEST["p"]);
function Mustitableselect($tables,$collumns,$joiningcondition,$condition)
        {
            $selecttables=null;
            $selectcollumns=null;
            $selectjoiningcondition=null;
            $selectcondition=null;
            foreach($tables as $table)
            {
                $selecttables.=$table.',';
            }
            $selecttables=substr($selecttables,0,strlen($selecttables)-1);

            foreach($collumns as $collumn=>$collumnvalue){
                $selectcollumns.=$collumn.".".$collumnvalue." as ".$collumnvalue.",";
            }
            $selectcollumns=substr($selectcollumns,0,strlen($selectcollumns)-1);
            foreach ($joiningcondition as $joincondition) {
                foreach($joincondition as $join=>$col){
                    $selectjoiningcondition.=$join.".".$col." = ";
                }
                $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-3);
                $selectjoiningcondition.=" AND ";
            }
            $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-5);

            foreach($condition as $data){
                    $selectcondition.=$data[0].".".$data[1]." = '".$data[2]."' AND ";
            }
            $selectcondition=substr( $selectcondition,0,strlen( $selectcondition)-5);
            return "SELECT ".$selectcollumns." FROM ".$selecttables." WHERE ".$selectjoiningcondition ." AND ".$selectcondition;
        }
        print_r( [["company","Company_name","nnnnn"]]);
       echo Mustitableselect(["company","thikness","lenth"],["lenth"=>"length","Thikness"=>"Thikness"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"]],[["company","Company_name","nnnnn"],["company","Company_name","nnnnn"],["company","Company_name","nnnnn"]]);
?>
</pre>
