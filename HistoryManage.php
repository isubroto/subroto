<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
} 
require("database.php");
require("arrays.php");
error_reporting(E_ERROR | E_PARSE);
function srcmemo()
{
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("memo_details",["C_Id", "T_Id", "I_Id", "Quantity", "baseprice"],["M_Id"=>$_REQUEST["Id"]]);
    $memos=Array();
    if(!empty($data)){
        foreach($data as $dt){
            $createInfo["company"]=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$dt["C_Id"]])[0]["Company_name"];
        $createInfo["thikness"]=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$dt["T_Id"]])[0]["mm"];
        $createInfo["lenth"]=$db->selectDbAsArray("lenth",["length"],["l_id"=>$dt["I_Id"]])[0]["length"];
        $createInfo["Quantity"]=$dt["Quantity"];
        $createInfo["baseprice"]=$dt["baseprice"];
        $createInfo["Totalprice"]=intval(Totalprise($createInfo["lenth"],$createInfo["baseprice"],$createInfo["company"],$createInfo["Quantity"]));
        $memos[]=$createInfo;
            }
            echo json_encode($memos,JSON_UNESCAPED_UNICODE);
    }
    else{
        echo 0;
    }
}
function Loadlabor(){
    $db=new Database("localhost","root","","test");
    $labor=$db->selectDbAsArray("memo",["Labor"],["M_Id"=>$_REQUEST["Id"]])[0]["Labor"];
    echo intval($labor);
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

function MemoOverlook()
{
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("memo",["Date", "TotalPrice", "Labor", "Less", "CustomerId"],["M_Id"=>$_REQUEST["Id"]])[0];
    if(!empty($data)){
        $d=$data["Date"];
        $dt=explode(" ",$d);
        $dtt=explode("-",$dt[0]);
        $date=$dtt[2].'/'.$dtt[1].'/'.$dtt[0];
        $memoinfo["Memo"]=$_REQUEST["Id"];
        $memoinfo["Date"]=$date;
        $memoinfo["TotalPrice"]=$data["TotalPrice"];
        $memoinfo["Labor"]=$data["Labor"];
        $memoinfo["Less"]=$data["Less"];
        $memoinfo["CustomerId"]=$data["CustomerId"];
        if($data["CustomerId"]=="0"){
            $dt=$db->selectDbAsArray("memo_log",["CustomerName","Jomataka"],["memoId"=>$_REQUEST["Id"]])[0];
            $memoinfo["CustomerName"]=$dt["CustomerName"];
        }
        else if($data["CustomerId"]!="0"){
            $memoinfo["CustomerName"]=$db->selectDbAsArray("wholesale_customer",["Shop_Name"],["C_id"=>$data["CustomerId"]])[0]["Shop_Name"];
        }
        echo json_encode($memoinfo,JSON_UNESCAPED_UNICODE);

    }
}

function GetWholesaleMemos()
{
    $db=new Database("localhost","root","","test");
        $sql='SELECT `Date`, `M_Id`, `TotalPrice`, `Labor`, `Less` FROM `memo` WHERE `CustomerId`='.$_REQUEST["Id"].' ORDER BY `Date` DESC';
        $data=$db->CustomSelectionAsArray($sql);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);

}
function LoadStock()
{
    $db=new Database("localhost","root","","test");
        $sql='SELECT DATE(`time`) as `time`, `Foot_Id`, `Pices`, `PreviousPice`, `Operation` FROM `stock_log` WHERE `Foot_Id`='.$_REQUEST["fid"].' ORDER BY `time` ASC';
        $data=$db->CustomSelectionAsArray($sql);
        $key=Array();
        $stock=Array();
        $BUYpice=0;
        $BUYprivious=0;
        $SELLpice=0;
        $SELLprivious=0;
        for($i=0;$i<sizeof($data);$i++){
            if(!in_array($data[$i]["time"].$data[$i]["Operation"],$key)){
                if($data[$i]["Operation"]=="BUY"){
                    $BUYpice=intval($data[$i]["Pices"]);
                    $BUYprivious=intval($data[$i]["PreviousPice"]);
                    $stock[]= BuyOperation($i,$data,$BUYpice,$BUYprivious);
                }
                elseif($data[$i]["Operation"]=="SELL"){
                    $SELLpice=intval($data[$i]["Pices"]);
                    $SELLprivious=intval($data[$i]["PreviousPice"]);
                   $stock[]= SellOperation($i,$data,$SELLpice,$SELLprivious);
                }
                $key[]=$data[$i]["time"].$data[$i]["Operation"];
            }
        }
        echo json_encode($stock,JSON_UNESCAPED_UNICODE);

}


function BuyOperation($i,$data,$BUYpice,$BUYprivious)
{
    for($j=$i+1;$j<sizeof($data);$j++){
        if($data[$j]["Operation"]=="BUY" && $data[$i]["time"]==$data[$j]["time"]){
            $BUYpice+=intval($data[$j]["Pices"]);
            if($BUYprivious>intval($data[$j]["PreviousPice"])){
                $BUYprivious=intval($data[$j]["PreviousPice"]);
            }
        }
    }
    return ["time"=>$data[$i]["time"],"Operation"=>$data[$i]["Operation"],"Pices"=>$BUYpice,"PreviousPice"=>$BUYprivious];
}function SellOperation($i,$data,$SELLpice,$SELLprivious)
{
    for($j=$i+1;$j<sizeof($data);$j++){
        if($data[$j]["Operation"]=="SELL" && $data[$i]["time"]==$data[$j]["time"]){
            $SELLpice+=intval($data[$j]["Pices"]);
            if($SELLprivious<intval($data[$j]["PreviousPice"])){
                $SELLprivious=intval($data[$j]["PreviousPice"]);
            }
        }
    }
    return ["time"=>$data[$i]["time"],"Operation"=>$data[$i]["Operation"],"Pices"=>$SELLpice,"PreviousPice"=>$SELLprivious];
}
?>


<?php 
if(isset($_REQUEST["func"]) && isset($_SESSION["Access"]) && $_SESSION["Access"])
{
    switch ($_REQUEST["func"]) {
        case 'srcmemo':
            srcmemo();
            break;
            case 'MemoOverlook':
                MemoOverlook();
            break;
            case 'GetWholesaleMemos':
                GetWholesaleMemos();
            break;
        case 'LoadStock':
            LoadStock();
        break;
        case 'Loadlabor':
            Loadlabor();
            break;
            default:
            # code...
            break;
        }
    }
    else {
        echo "<style>.text-red {display: flex;margin: 0 auto;position: relative;color: #ed1c1c !important;justify-content: center;top: 15vw;}h2 .text-red{font-size: 5rem;}h5 .text-red{font-size: 2rem;}a{text-decoration: none;}</style>";
        echo "<a href='index.city'><h2 class='text-red'>Access Denied</h2><h5 class='text-red'>Unauthorised access</h5></a>";
    }
?>