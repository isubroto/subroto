<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require("database.php");
require("staticfunction.php");
require("arrays.php");
error_reporting(E_ERROR | E_PARSE);

function addcustomerdraftmemo(){
    $_SESSION["Creation_Date"]=Datenow();
    $db=new Database("localhost","root","","test");
    $success=$db->insertDb("draft_memo",["Customer_id"=>$_REQUEST["customerId"],"Creation_Date"=>$_SESSION["Creation_Date"]]);
    if($success=="inserted"){
        echo 1;
    }
    else
    {
        echo 0;
    }
}

function addcustomerdraftmemodetails(){
    $db=new Database("localhost","root","","test");
    $success=$db->insertDb("draft_memo_details",["DM_Id"=>$_REQUEST["DM_Id"],"C_Id"=>$_REQUEST["C_Id"],"T_Id"=>$_REQUEST["T_Id"],"I_Id"=>$_REQUEST["I_Id"],"Quantity"=>$_REQUEST["Quantity"],"baseprice"=>$_REQUEST["baseprice"]]);
    if($success=="inserted"){
        echo 1;
    }
    else
    {
        echo 0;
    }
}



function getcustomerdraftmemo(){
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("draft_memo",["DM_Id"],["Customer_id"=>$_REQUEST["customerId"]]);
    echo json_decode($success,true)[0]["DM_Id"];
}


function findcustomerdraftmemo(){
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("draft_memo",["DM_Id"],["Customer_id"=>$_REQUEST["customerId"]]);
    if(empty(json_decode($success,true))){
        echo 1;
    }
    else {
        echo 0;
    }
}

function getcustomerdraftmemoinfo(){
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("draft_memo",["DM_Id"],["Customer_id"=>$_REQUEST["customerId"]]);
    if(empty(json_decode($success,true))){
        echo 0;
    }
    else {
        getcustomerdraftmemodetails(json_decode($success,true)[0]["DM_Id"]);
    }
}

function getcustomerdraftmemodetails($id){
    $newdata=array();
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("draft_memo_details",["D_id","C_Id","T_Id","I_Id","Quantity","baseprice"],["DM_Id"=>$id]);
    $data=json_decode($success,true);
    for($i=0;$i<count($data);$i++){
        $newarray["LengthId"]=$data[$i]["I_Id"];
        $newarray["Id"]=$data[$i]["D_id"];
        $newarray["Quantity"]=$data[$i]["Quantity"];
        $newarray["Length"]=json_decode($db->selectDbAsJson("lenth",["length"],["l_id"=>$data[$i]["I_Id"]]),true)[0]["length"];
        $newarray["Company"]=json_decode($db->selectDbAsJson("company",["Company_name"],["c_id"=>$data[$i]["C_Id"]]),true)[0]["Company_name"];
        $newarray["Thikness"]=json_decode($db->selectDbAsJson("thikness",["mm"],["t_id"=>$data[$i]["T_Id"]]),true)[0]["mm"];

        $newarray["Title"]=title($newarray["Length"],$newarray["Quantity"],$newarray["Company"]);
        $newarray["CompanyId"]=$data[$i]["C_Id"];
        $newarray["ThiknessId"]=$data[$i]["T_Id"];
        if(intval($data[$i]["baseprice"])!=0){
            $newarray["Baseprice"]=$data[$i]["baseprice"];
            $newarray["Totalprice"]=(string)Totalprise($newarray["Length"],$newarray["Baseprice"],$newarray["Company"],$newarray["Quantity"]);
        }
        $newdata[]=$newarray;

    }
    print_r(json_encode($newdata,JSON_UNESCAPED_UNICODE));

}
function title($lenth,$quantity,$company){
    global $lenths;
    if($company!='মটকা'){
        if((Int)($quantity)%$lenths[$lenth]==0){
            $title=(Int)((Int)($quantity)/$lenths[$lenth])." বান";
        }
        else if((Int)($quantity)<$lenths[$lenth]){
            $title=((Int)($quantity))." পিছ";
        }
        else{
            $title=(Int)((Int)($quantity)/$lenths[$lenth])." বান ". ((Int)($quantity)%$lenths[$lenth]). " পিছ";
        }
}
    else{  
        if((Int)($quantity)%25==0){
                $title=(Int)((Int)($quantity)/25)." বান";
            }
            else if((Int)($quantity)<25){
                $title=((Int)($quantity)). " পিছ";
            }
            else{
                $title=(Int)((Int)($quantity)/25)." বান ". ((Int)($quantity)%25). " পিছ";
            }
        }
        return $title;
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

function CheckMemoDetails(){
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("draft_memo_details",["D_id","DM_Id"],["D_id"=>$_REQUEST["id"]]);
    if(empty(json_decode($success,true))){
        echo 0;
    }
    else {
        echo 1;
    }
}

function updatecustomerdraftmemodetails(){
    $db=new Database("localhost","root","","test");
    $success=$db->updateDB("draft_memo_details",["DM_Id"=>$_REQUEST["DM_Id"],"C_Id"=>$_REQUEST["C_Id"],"T_Id"=>$_REQUEST["T_Id"],"I_Id"=>$_REQUEST["I_Id"],"Quantity"=>$_REQUEST["Quantity"],"baseprice"=>$_REQUEST["baseprice"]],["D_id"=>$_REQUEST["D_id"]]);
    if($success=="updated"){
        echo 1;
    }
    else{
        echo 0;
    }
}
function Deletecustomerdraftmemodetails(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("draft_memo_details",["DM_Id"],["D_id"=>$_REQUEST["Id"]])[0]["DM_Id"];
    $success=$db->deleteDb("draft_memo_details",["D_id"=>$_REQUEST["Id"]]);
    if($success=="deleted"){
        $dt=$db->selectDbAsArray("draft_memo_details",["D_Id"],["DM_Id"=>$data]);
    if(!empty($dt)){
            echo 1;
    }
    else if(empty($dt)){
        $success=$db->deleteDb("draft_memo",["DM_Id"=>$data]);
        if($success=="deleted"){
            echo 1;
        }else{
            echo 99;
        }
    }
    }else{
        echo 0;
    }
}
function LoadMemoForCustomar()
{
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("draft_memo",["DM_Id"],["Customer_id"=>$_REQUEST["customerId"]])[0];
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}

function CreateMemoDetailsFromDraft()
{
    $db=new Database('localhost',"root","","test");
    $success=$db->insertDb("memo_details",["M_Id"=>$_REQUEST["M_Id"], "C_Id"=>$_REQUEST["C_Id"], "T_Id"=>$_REQUEST["T_Id"], "I_Id"=>$_REQUEST["I_Id"], "Quantity"=>$_REQUEST["Quantity"], "baseprice"=>$_REQUEST["baseprice"]])  ;
   if($success=="inserted"){
       $scc=$db->deleteDb("draft_memo_details",["D_id"=>$_REQUEST["D_Id"]]);
       if($scc=="deleted"){
           echo 1;
       }
       else{
           echo 0;
       }
   }else{ echo 0;}
}
function CheckForDelete()
{
    $db=new Database("localhost","root","","test");
        $scc=$db->deleteDb("draft_memo_details",["DM_Id"=>$_REQUEST["memoId"]]);
        if($scc=="deleted"){
            $st=$db->deleteDb("draft_memo",["DM_Id"=>$_REQUEST["memoId"]]);
        if($st=="deleted"){
            echo 1;
        }
        else {
            echo 0;
        }
        }
        else{
            echo 0;
        }
}
if(isset($_REQUEST["func"]) && $_SESSION["loginstutas"] && isset($_SESSION["Access"]) && $_SESSION["Access"]){
    switch ($_REQUEST["func"]) {
        case 'addcustomerdraftmemo':
            addcustomerdraftmemo();
            break;
        case 'getcustomerdraftmemo':
            getcustomerdraftmemo();
            break;
            case 'addcustomerdraftmemodetails':
            addcustomerdraftmemodetails();
            break;
            case 'findcustomerdraftmemo':
            findcustomerdraftmemo();
            break;
            case 'getcustomerdraftmemoinfo':
                getcustomerdraftmemoinfo();
            break;
            case 'CheckMemoDetails':
                CheckMemoDetails();
            break;
            case 'updatecustomerdraftmemodetails':
                updatecustomerdraftmemodetails();
            break;
            case 'Deletecustomerdraftmemodetails':
                Deletecustomerdraftmemodetails();
            break;
            case 'LoadMemoForCustomar':
                LoadMemoForCustomar();
            break;
            case 'CreateMemoDetailsFromDraft':
                CreateMemoDetailsFromDraft();
            break;
            case 'CheckForDelete':
                CheckForDelete();
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