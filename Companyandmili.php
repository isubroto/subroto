<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require("database.php");
require("staticfunction.php");
require("Converter.php");
function AddCompany()
{
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("company",["Company_name"],["Company_name"=>$_REQUEST["companyname"]]);
    if(!empty(json_decode($data,true))){
        echo 99;
    }
    else{
        $success=$db->insertDb("company",["Company_name"=>$_REQUEST["companyname"]]);
        if($success=="inserted"){
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$_REQUEST["companyname"]." কোম্পানি যোগ করা হয়েছে ","time"=>Datenow()]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo 0;
        }
    }

}
function AddMili(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("thikness",["mm"],["c_id"=>$_REQUEST["companyid"],"mm"=>$_REQUEST["miliinfo"]]);
    if(!empty(json_decode($data,true))){
        echo 99;
    }
    else{
        $success=$db->insertDb("thikness",["c_id"=>$_REQUEST["companyid"],"mm"=>$_REQUEST["miliinfo"]]);
        if($success=="inserted"){
            $activity=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$_REQUEST["companyid"]])[0]["Company_name"]." কোম্পানির"." ".$_REQUEST["miliinfo"]." মিলি যোগ করা হয়েছে ";
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity,"time"=>Datenow()]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo 0;
        }
    }
}
function AddFoot(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("lenth",["length"],["t_id"=>$_REQUEST["miliid"],"length"=>$_REQUEST["footinfo"]]);
    if(!empty(json_decode($data,true))){
        echo 99;
    }
    else{
        $success=$db->insertDb("lenth",["t_id"=>$_REQUEST["miliid"],"length"=>$_REQUEST["footinfo"]]);
        if($success=="inserted"){
            $activity=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$_REQUEST["miliid"]])[0]["c_id"]])[0]["Company_name"]." কোম্পানির ".$db->selectDbAsArray("thikness",["mm"],["t_id"=>$_REQUEST["miliid"]])[0]["mm"]." মিলির"." ".$_REQUEST["footinfo"]." ফুট যোগ করা হয়েছে ";
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity,"time"=>Datenow()]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo 0;
        }
    }
}

function UpdateStock(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("stock",["l_id","pice"],["l_id"=>$_REQUEST["footid"]]);
    if(!empty(json_decode($data,true))){
        $Oldquantity=intval(json_decode($data,true)[0]["pice"]);
        $quantity=$Oldquantity+intval($_REQUEST["stock"]);
        $success=$db->updateDB("stock",["pice"=>$quantity],["l_id"=>$_REQUEST["footid"]]);
        if($success=="updated"){
            $activity=$db->selectwithjoiningDbAsArray(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["footid"]]])[0];
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity["Company_name"]." কোম্পানির"." ".$activity["mm"]." মিলির ".$activity["length"]." ফুটে ".Converter::en2bn($_REQUEST["stock"])." পিছ যোগ করা হয়েছে","time"=>Datenow(),"Foot_Id"=>$_REQUEST["footid"],"Pices"=>intval($_REQUEST["stock"]),"PreviousPice"=>$Oldquantity,"Operation"=>"BUY"]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo $success;
        }
    }
    else{
        $success=$db->insertDb("stock",["l_id"=>$_REQUEST["footid"],"pice"=>$_REQUEST["stock"]]);
        if($success=="inserted")
        {
            $activity=$db->selectwithjoiningDbAsArray(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["footid"]]])[0];
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity["Company_name"]." কোম্পানির ".$activity["mm"]." মিলির ".$activity["length"]." ফুটে ".$_REQUEST["stock"]." পিছ যোগ করা হয়েছে","time"=>Datenow(),"Foot_Id"=>$_REQUEST["footid"],"Pices"=>intval($_REQUEST["stock"]),"PreviousPice"=>"0","Operation"=>"BUY"]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
    }
}
if(isset($_REQUEST["func"]) && $_SESSION["loginstutas"] && isset($_SESSION["Access"]) && $_SESSION["Access"]){
    switch ($_REQUEST["func"]) {
        case 'AddCompany':
            AddCompany();
            break;
        case 'AddMili':
            AddMili();
            break;
            case 'AddFoot':
            AddFoot();
            break;
            case 'UpdateStock':
            UpdateStock();
            break;
        default:
            break;
    
    }
}
else {
    echo "<style>.text-red {display: flex;margin: 0 auto;position: relative;color: #ed1c1c !important;justify-content: center;top: 15vw;}h2 .text-red{font-size: 5rem;}h5 .text-red{font-size: 2rem;}a .text-red{text-decoration: none;}</style>";
    echo "<a href='index.city'><h2 class='text-red'>Access Denied</h2><h5 class='text-red'>Unauthorised access</h5></a>";
}

?>