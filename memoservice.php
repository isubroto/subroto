<?php 
require("Session.php");
require("database.php");
require("staticfunction.php");
require("Converter.php");
error_reporting(E_ERROR | E_PARSE);
$amountbalance="Balance Amount";
function optionvaluse($key,$val,$selected){
   if($selected){
    echo '<option selected value="'.$key.'">'.$val.'</option>';
   }
   else{
    echo ' <option value="'.$key.'">'.$val.'</option> ';
   }
}
function Adddokan(){
    global $amountbalance;
    if(isset($_REQUEST["name"]) && isset($_REQUEST["address"])){
        $db=new Database('localhost',"root","","test");
        $check=$db->selectDbAsArray("wholesale_customer",["Shop_Name","Shop_Address"],["Shop_Name"=>$_REQUEST["name"],"Shop_Address"=>$_REQUEST["address"]]);
        if(empty($check)){
            $stutas=$db->insertDb("wholesale_customer",["Shop_Name"=>$_REQUEST["name"],"Shop_Address"=>$_REQUEST["address"],$amountbalance=>0]);
        if($stutas=="inserted"){
            echo 1;
        }
        else{
            echo 0;
        }
        }
        else{
            echo 99;
        }
        

    }
}
function WholesaleCustomer(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("wholesale_customer",["C_id","Shop_Name","Shop_Address"]);
    $data=json_decode($data,true);
    echo '<option selected="" disabled="">দোকানের তালিকা</option>';
    foreach ($data as $array){
        if($array["Shop_Name"]!="খুচরা"){
            echo '<option value="'.$array["C_id"].'">'.$array["Shop_Name"].", ".$array["Shop_Address"].' </option> ';
        }
    }
}
function LoadCompany(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("company",["c_id","Company_name"]);
    $data=json_decode($data,true);
     if(isset($_REQUEST["companyid"])){
        echo "<option disabled>কোম্পানি</option>";
        foreach($data as $array){
            if($_REQUEST["companyid"]==$array["c_id"]){
                optionvaluse($array["c_id"],$array["Company_name"],true);
            }
            else{
                optionvaluse($array["c_id"],$array["Company_name"],false);
            }
        }
     }
     else{
        echo "<option selected disabled>কোম্পানি</option>";
        foreach($data as $array){
            optionvaluse($array["c_id"],$array["Company_name"],false);
        }
     }
}
function LoadMili(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("thikness",["t_id","mm"],["c_id"=>$_REQUEST["companyid"]]);
    $data=json_decode($data,true);
     if(isset($_REQUEST["miliid"])){
        echo "<option selected >মিলি</option>";
         foreach($data as $array){
            if($_REQUEST["miliid"]==$array["t_id"]){
                optionvaluse($array["t_id"],$array["mm"],true);
             }
             else{
                optionvaluse($array["t_id"],$array["mm"],false);
             }
        }
     }
     else{
        echo "<option selected disabled >মিলি</option>";
        foreach($data as $array){
            optionvaluse($array["t_id"],$array["mm"],false);
        }
     }
}
function LoadFoot(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("lenth",["l_id","length"],["t_id"=>$_REQUEST["miliid"]]);
    $data=json_decode($data,true);
     if(isset($_REQUEST["footid"])){
        echo "<option disabled>ফুট</option>";
        foreach($data as $array){
           if($_REQUEST["footid"]==$array["l_id"]){
            optionvaluse($array["l_id"],$array["length"],true);
           }
           else{
            optionvaluse($array["l_id"],$array["length"],false);
           }
        }
     }
     else
     {
        echo "<option selected disabled>ফুট</option>";
        foreach($data as $array){
            optionvaluse($array["l_id"],$array["length"],false);
        }
     }
}


function CreateMemo(){
    $db=new Database('localhost',"root","","test");
    $newId=date('m').randString(3).date('d');
    $data=Array();
    $less=0;
    while(true){
        $data=$db->selectDbAsArray("memo",["M_Id", "Date", "TotalPrice", "Labor", "Less"],["M_Id"=>$newId]);
        if(empty($data)){
            if(isset($_REQUEST["Less"])){
                $less=intval($_REQUEST["TotalPrice"])-intval($_REQUEST["Less"]);
            }
            $success=$db->insertDb("memo",["M_Id"=>$newId, "Date"=>Datenow(), "TotalPrice"=>intval($_REQUEST["TotalPrice"])+intval($_REQUEST["Labor"]), "Labor"=>$_REQUEST["Labor"], "Less"=>$less,"CustomerId"=>$_REQUEST["CustomerId"],"Status"=>"Not Checked"]);
            if($success=="inserted"){
                $data=["Id"=>$newId,"Stusas"=>1];
            }
            else{
                $data=["Stusas"=>$success];
            }
            break;
        }
        else{
            $newId=date('m').randString(3).date('d');
        }
    }
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}

function CreateMemoDetails(){
    $db=new Database('localhost',"root","","test");
    $success=$db->insertDb("memo_details",["M_Id"=>$_REQUEST["M_Id"], "C_Id"=>$_REQUEST["C_Id"], "T_Id"=>$_REQUEST["T_Id"], "I_Id"=>$_REQUEST["I_Id"], "Quantity"=>$_REQUEST["Quantity"], "baseprice"=>$_REQUEST["baseprice"]])  ;
   if($success=="inserted"){
       echo 1;
   }else{ echo 0;}
}


function SellFormMemo(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("stock",["l_id","pice"],["l_id"=>$_REQUEST["l_id"]]);
    if(!empty(json_decode($data,true))){
        updatestock($data);
    }
    else{
        CreateStock();
    }
}
function updatestock($data){
    $db=new Database('localhost',"root","","test");
    $Oldquantity=intval(json_decode($data,true)[0]["pice"]);
        $quantity=$Oldquantity-intval($_REQUEST["pice"]);
        if($quantity<1){
            $quantity=0;
        }
        $success=$db->updateDB("stock",["pice"=>$quantity],["l_id"=>$_REQUEST["l_id"]]);
        if($success=="updated"){
            $activity=$db->selectwithjoiningDbAsArray(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["l_id"]]])[0];
            print_r($_REQUEST);
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity["Company_name"]." কোম্পানির"." ".$activity["mm"]." মিলির ".$activity["length"]." ফুটে ".Converter::en2bn($_REQUEST["pice"])." পিছ বিক্রি করা হয়েছে","time"=>Datenow(),"Foot_Id"=>$_REQUEST["l_id"],"Pices"=>intval($_REQUEST["pice"]),"PreviousPice"=>$Oldquantity,"Operation"=>"SELL"]);
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
function CreateStock(){
    $db=new Database('localhost',"root","","test");
    $success=$db->insertDb("stock",["l_id"=>$_REQUEST["l_id"],"pice"=>"0"]);
        if($success=="inserted")
        {
            $activity=$db->selectwithjoiningDbAsArray(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["footid"]]])[0];
            $log=$db->insertDb("stock_log",["user_name"=>$_SESSION["uname"],"activity"=>$activity["Company_name"]." কোম্পানির ".$activity["mm"]." মিলির ".$activity["length"]." ফুটে ".Converter::en2bn($_REQUEST["pice"])." পিছ বিক্রি করা হয়েছে","time"=>Datenow(),"Foot_Id"=>$_REQUEST["l_id"],"Pices"=>intval($_REQUEST["pice"]),"PreviousPice"=>"0","Operation"=>"SELL"]);
            if($log=="inserted"){
                echo 1;
            }
            else{
                echo 0;
            }
        }
}
function updateaccount(){
    global $amountbalance;
    $db=new Database("localhost","root","","test");
    $balance=$db->selectDbAsArray("wholesale_customer",[$amountbalance],["C_id"=>$_REQUEST["CustomerId"]])[0][$amountbalance];
    if($balance!='' || $balance!=null){
        $newbalance=intval($balance) + intval($_REQUEST["TotalPrice"])+intval($_REQUEST["labor"]);
    $success=$db->insertDb("account_log",["Date"=>date("Y-m-d"),"C_id"=>$_REQUEST["CustomerId"],"Amount"=>intval($_REQUEST["TotalPrice"])+intval($_REQUEST["labor"]),"Payment Status"=>"Debit","Balance"=>$newbalance,"Referance"=>$_REQUEST["Referance"],"Old_Balance"=>intval($balance)]);
    if($success=="inserted"){
        $upadte=$db->updateDB("wholesale_customer",[$amountbalance=>intval($newbalance)],["C_id"=>$_REQUEST["CustomerId"]]);
        if($upadte=="updated"){
            echo 1;
        }
        else{
            echo $upadte;
        }
    }
    }
}

function CreateMemoLog(){
    $db=new Database("localhost","root","","test");
    $success=$db->insertDb("memo_log",["memoId"=>$_REQUEST["memoId"], "CustomerName"=>$_REQUEST["CustomerId"], "Jomataka"=>intval($_REQUEST["Jomataka"])]);
    if($success=="inserted"){
        echo 1;
    }
    else{
        echo $success;
    }
}

function AddJoma(){
    global $amountbalance;
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("wholesale_customer",[$amountbalance],["C_id"=>$_REQUEST["CustomerId"]]);
    $oldbalance=intval($data[0][$amountbalance]);
    $newbalance=$oldbalance-intval($_REQUEST["taka"]);
    $success=$db->updateDB("wholesale_customer",[$amountbalance=>$newbalance],["C_id"=>$_REQUEST["CustomerId"]]);
    if($success=="updated"){
        $insert=$db->insertDb("account_log",["Date"=>date("Y-m-d"),"C_id"=>$_REQUEST["CustomerId"],"Amount"=>$_REQUEST["taka"],"Payment Status"=>"Credit","Balance"=>$newbalance,"Referance"=>$_REQUEST["Referance"],"Old_Balance"=>intval($oldbalance)]);
        if($insert=="inserted"){
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
if(isset($_REQUEST["func"]) && $_SESSION["loginstutas"] && isset($_SESSION["Access"]) && $_SESSION["Access"]){
    switch ($_REQUEST["func"]) {
        case 'Adddokan':
            Adddokan();
            break;
            case 'WholesaleCustomer':
            WholesaleCustomer();
            break;
            case 'LoadCompany':
            LoadCompany();
            break;
            case 'LoadMili':
            LoadMili();
            break;
            case 'LoadFoot':
            LoadFoot();
            break;
            case 'loadWholesaleCustomer':
                WholesaleCustomer();
            break;
            case 'CreateMemo':
            CreateMemo();
            break;
            case 'CreateMemoDetails':
            CreateMemoDetails();
            break;
            case 'SellFormMemo':
            SellFormMemo();
            break;
            case 'updateaccount':
                updateaccount();
            break;
            case 'AddJoma':
                AddJoma();
            break;
            case 'CreateMemoLog':
                CreateMemoLog();
            break;
        
        default:
            # code...
            break;
    }
}
else {
    echo "<style>.text-red {display: flex;margin: 0 auto;position: relative;color: #ed1c1c !important;justify-content: center;top: 15vw;}h2 .text-red{font-size: 5rem;}h5 .text-red{font-size: 2rem;}a .text-red{text-decoration: none;}</style>";
    echo "<a href='index.city'><h2 class='text-red'>Access Denied</h2><h5 class='text-red'>Unauthorised access</h5></a>";
}
?>