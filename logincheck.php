<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require("clientinfo.php");
require('database.php');
error_reporting(E_ERROR | E_PARSE);
function usercheck()
{
    $db=new Database('localhost',"root","","test");
    $arr=null;
    if(isset($_REQUEST["username"]) && isset($_REQUEST["pass"])){
        $data= $db->selectDbAsJson("test_users",["user_name","password","email","type"],["user_name"=>$_REQUEST["username"],"password"=>md5($_REQUEST["pass"])]);
        if(json_decode($data)==null)
        {
            $arr=[
                "stutas"=>0,
                "message"=>"Login failed",
                "dt"=>$data
            ];
        }
        
        elseif(json_decode($data)!=null){
            $stutas=login();
            if($stutas){
                $arr=[
                    "stutas"=>1,
                    "message"=>"Login successfull",
                    "infor"=>$stutas,
                    "dt"=>$data
                ];
            }else{
                $arr=[
                    "stutas"=>0,
                    "message"=>"Login failed",
                    "infor"=>$stutas,
                    "dt"=>$data
                ];
            }
        }
        echo json_encode($arr);
     }else{
        echo json_encode($arr);
     }
}
function login(){
    $os=getOS();
    $browser=getBrowser();
    $mac=getMac();
    $browserversion=browservertion($browser);
    $db=new Database('localhost',"root","","test");
    $islogin=false;
    if($os=="Android"){
        $androidinfo=androidInfo();
        $data=$db->insertDb("login_log",["log_date"=>date("Y-m-d H:i:s"),"username"=>$_REQUEST["username"],"device_details"=>"Operating System: ".$os." Vertion: ".$androidinfo[0]." Model:".$androidinfo[1],"device_mac"=>$mac,"browser_details"=>" Browser: ".$browser." Browser Version: ".$browserversion]);
        if($data=="inserted"){
            $_SESSION["loginstutas"]=1;
            $_SESSION["uname"]=$_REQUEST["username"];
            $_SESSION["LoginId"]=$db->selectDbAsArray("test_users",["Login_Id"],["user_name"=>$_SESSION["uname"]])[0]["Login_Id"];
            $_SESSION["Access"]=true;
            $islogin= true;
        }
        else{
            $_SESSION["loginstutas"]=0;
            $_SESSION["LoginId"]=null;
            $_SESSION["Access"]=false;
            $islogin= false;
        }
    }
    else{
        $data=$db->insertDb("login_log",["log_date"=>date("Y-m-d H:i:s"),"username"=>$_REQUEST["username"],"device_details"=>"Operating System: ".$os,"device_mac"=>$mac,"browser_details"=>" Browser: ".$browser." Browser Version: ".$browserversion]);
        if($data=="inserted"){
            $_SESSION["loginstutas"]=1;
            $_SESSION["uname"]=$_REQUEST["username"];
            $_SESSION["LoginId"]=$db->selectDbAsArray("test_users",["Login_Id"],["user_name"=>$_SESSION["uname"]])[0]["Login_Id"];
            $_SESSION["Access"]=true;
            $islogin= true;
        }
        else{
            $_SESSION["loginstutas"]=0;
            $_SESSION["LoginId"]=null;
            $_SESSION["Access"]=false;
            $islogin= false;
        }
    }
    return $islogin;

    //uniqid('user_');
}
function logout(){
    $_SESSION["loginstutas"]=0;
    $_SESSION["LoginId"]=null;
    $_SESSION["Access"]=false;
    
    echo 0;
}
?>
<?php 
if(isset($_REQUEST["func"])&&$_REQUEST["func"]!=null){
        switch ($_REQUEST["func"]) {
            case 'usercheck':
                usercheck();
                break;
            case 'login':
                login();
                break;
                case 'logout':
                    logout();
                    break;
            default:
                # code...
                break;
        }
}
// LOWER(DATE_FORMAT(LoginTime,'%l:%i %p'))
?>
