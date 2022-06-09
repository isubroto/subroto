<?php 
require("database.php"); 
require("Converter.php");
require("arrays.php");
error_reporting(E_ERROR | E_PARSE);
if(isset($_REQUEST["m"])){
    $db=new Database('localhost',"root","","test");
$Customer=$db->selectDbAsArray("memo",["M_Id","TotalPrice","Less","Date","Labor","CustomerId"],["M_Id"=>$_REQUEST['m']])[0];
$TotalPrice=$Customer["TotalPrice"];
$Memo=$Customer["M_Id"];
$labor=$Customer["Labor"];
$customerId=$Customer["CustomerId"];
$d=$Customer["Date"];
$dt=explode(" ",$d);
$dtt=explode("-",$dt[0]);
$date=$dtt[2].'/'.$dtt[1].'/'.$dtt[0];
if($customerId!=0||$customerId!="0"){
    $CustomerInfo=$db->selectDbAsArray("wholesale_customer",["Shop_Name", "Shop_Address"],["C_id"=>$customerId])[0];
$customerName=$CustomerInfo["Shop_Name"];
$customerAddress=$CustomerInfo["Shop_Address"];
$oldbalabce=$db->selectDbAsArray("account_log",["Old_Balance"],["Referance"=>$Memo])[0]["Old_Balance"];
$jomataka=$db->selectDbAsArray("memo_log",["Jomataka"],["memoId"=>$Memo])[0]["Jomataka"];
}
else{
    $customerName=$db->selectDbAsArray("memo_log",["CustomerName"],["memoId"=>$Memo])[0]["CustomerName"];
    $less=$Customer["Less"];
}
$memoDetails=$db->selectDbAsArray("memo_details",["C_Id", "T_Id", "I_Id", "Quantity", "baseprice"],["M_Id"=>$Memo]);
$memoInformotion=Array();
foreach($memoDetails as $details){
    $createInfo["company"]=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$details["C_Id"]])[0]["Company_name"];
    $createInfo["thikness"]=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$details["T_Id"]])[0]["mm"];
    $createInfo["lenth"]=$db->selectDbAsArray("lenth",["length"],["l_id"=>$details["I_Id"]])[0]["length"];
    $createInfo["Quantity"]=$details["Quantity"];
    $createInfo["baseprice"]=$details["baseprice"];
    $createInfo["Totalprice"]=intval(Totalprise($createInfo["lenth"],$createInfo["baseprice"],$createInfo["company"],$createInfo["Quantity"]));
    $memoInformotion[]=$createInfo;
}
}

function Totalprise($length,$baseprise,$company,$quantity){
    global $lenths;
    if($company!='মটকা'){
        $total=(float)(((float)($baseprise)/$lenths[$length])*(float)$quantity);
        $total=round($total);
    }
    else {
        $total=(float)(((float)$baseprise)*(float)$quantity);
        $total=round($total);
    }
    return $total;


}


?>