<?php
require("database.php");
require("Converter.php");
require("Session.php");
require("arrays.php");
require("staticfunction.php");
error_reporting(E_ERROR | E_PARSE);
$tins=Array();
$motkas=Array();
$tin=0;
    $motka=0;
    $db=new Database("localhost","root","","test");
    $meno=$db->CustomSelectionAsArray('SELECT * FROM `memo` WHERE `Date` BETWEEN "'.$_REQUEST["date"].'" AND "'.date("Y-m-d").'" AND `Status`="Not Checked";');
foreach($meno as $mn){
        $totalmotka=0;
    $totaltin=0;
$dtss=$db->selectDbAsArray("memo_details",["M_Id","C_Id","T_Id","I_Id","Quantity","baseprice"],["M_Id"=>$mn["M_Id"]]);
foreach($dtss as $dtls){
    if($dtls["C_Id"]=="28"||$dtls["C_Id"]==28){
        $Tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$dtls["T_Id"]])[0]["mm"];
        $lname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$dtls["I_Id"]])[0]["length"];
        $totalmotka=$totalmotka+intval($dtls["Quantity"])*intval($dtls["baseprice"]);
        $mk[]=array(
            "thikness"=>$Tname,
            "length"=>$lname,
            "baseprise"=>$dtls["baseprice"],
            "quantity"=>intval($dtls["Quantity"])
        );
    }
    else if($dtls["C_Id"]!="28"||$dtls["C_Id"]!=28){
        $company=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$dtls["C_Id"]])[0]["Company_name"];
        $Tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$dtls["T_Id"]])[0]["mm"];
        $lname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$dtls["I_Id"]])[0]["length"];
        $tn[]=array(
            "Id"=>$dtls["M_Id"],
            "company"=>$company,
            "thikness"=>$Tname,
            "length"=>$lname,
            "baseprise"=>$dtls["baseprice"],
            "quantity"=>intval($dtls["Quantity"])
        );
    }
    if(!empty($mk)){
        $motkas[$motka][]=$mk[0];
        $mk=[];
    }
    if(!empty($tn)){
        $tins[$tin][]=$tn[0];
        $tn=[];
    }
}
$totaltin=intval($mn["TotalPrice"])-intval($mn["Less"])-intval($totalmotka);
if(!empty($motkas[$motka])){
    $motkas[$motka][]=$totalmotka;
    $motka++;
}
if(!empty($tins[$tin])){
    $tins[$tin][]=$totaltin;
    $tin++;
}


    
}
function complite(){
    $meno=$GLOBALS["meno"];
   foreach($meno as $mn){
    $db=new Database("localhost","root","","test");
    $assige=$db->insertDb("hisab",["Date"=>date("Y-m-d"),"Memo Number"=>$mn["M_Id"],"BanglaDate"=>$_REQUEST["bddate"]]);
    if($assige=="inserted"){
        $success=$db->updateDB("memo",["Status"=>"Checked"],["M_Id"=>$mn["M_Id"]]);
        if($success=="updated"){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    
   }
}
if(isset($_REQUEST["func"])&&$_REQUEST["func"]=="compleate"){
    
}
?>