<?php
require("database.php");
require("Converter.php");
require("Session.php");
require("arrays.php");
require("staticfunction.php");
error_reporting(E_ERROR | E_PARSE);

function incomplitememoload(){
    $db=new Database("localhost","root","","test");
    $draftmemo=$db->selectDbAsArray("draft_memo",["Customer_id"]);
    $customer=null;
    if(!empty($draftmemo)){
        foreach($draftmemo as $customerid){
            $customer=$db->selectDbAsArray("wholesale_customer",["Shop_Name"],["C_id"=>$customerid["Customer_id"]]);
        }
        $count=0;
        foreach($customer as $cs){
            $count++;

            echo "<td class=' d-flex'><span class='mr-2'>".Converter::en2bn($count).".</span>".$cs["Shop_Name"]."</td>";
        }
    }
}
function getdetaillist(){
    $lid=[];
    $db=new Database("localhost","root","","test");
    $memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    //$memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    if(!empty($memo)){
        foreach($memo as $memodetails){
            if(isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] += intval($memodetails["Quantity"]);
            }
            else if(!isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] = intval($memodetails["Quantity"]);
            }
        }
       // print_r($lid);
        foreach($lid as $key=>$val){
            $tid=$db->selectDbAsArray("lenth",["t_id"],["l_id"=>$key])[0]["t_id"];
            $cid=$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$tid])[0]["c_id"];
            $iname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$key])[0]["length"];
            $tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$tid])[0]["mm"];
            $cname=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$cid])[0]["Company_name"];
            $dtl=array(
                "company"=>$cname,
                "thikness"=>$tname,
                "length"=>$iname,
                "Quantity"=>$val
            );
            $dtls[]=$dtl;
        }
        foreach($dtls as $dt){
            echo "<tr><td>".$dt["length"]."x".$dt["thikness"]." ".$dt["company"]."</td><td><span class=''>".$dt["Quantity"]."</span> পিছ</td></tr>";
        }
    }
}
function bokeyalist(){
    $db=new Database("localhost","root","","test");
    $bokeyalst=$db->CustomSelectionAsArray("SELECT `Shop_Name`, `Shop_Address`, `Balance Amount` FROM `wholesale_customer` WHERE `Balance Amount`>0;");
    foreach($bokeyalst as $dt){
        echo "<tr><td>".$dt["Shop_Name"]."</br><span class='address'>".$dt["Shop_Address"]."</span></td><td><span class=' text-red'>".(-1)*intval($dt["Balance Amount"])."</span> টাকা</td></tr>";
    }

}
function todaytin(){
    $lid=[];
    $db=new Database("localhost","root","","test");
    $memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    //$memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    if(!empty($memo)){
        foreach($memo as $memodetails){
            if(isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] += intval($memodetails["Quantity"]);
            }
            else if(!isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] = intval($memodetails["Quantity"]);
            }
        }
        foreach($lid as $key=>$val){
            $tid=$db->selectDbAsArray("lenth",["t_id"],["l_id"=>$key])[0]["t_id"];
            $cid=$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$tid])[0]["c_id"];
            $iname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$key])[0]["length"];
            $tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$tid])[0]["mm"];
            $cname=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$cid])[0]["Company_name"];
            $dtl=array(
                "company"=>$cname,
                "thikness"=>$tname,
                "length"=>$iname,
                "Quantity"=>$val
            );
            $dtls[]=$dtl;
        }
        $quantity=0;
        foreach($dtls as $dt){
            if($dt["company"]!="মটকা"){
                $quantity+=intval($dt["Quantity"]);
            }
        }
        echo $quantity;
    }
}
function todaymotka(){
    $lid=[];
    $db=new Database("localhost","root","","test");
    $memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    //$memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    if(!empty($memo)){
        foreach($memo as $memodetails){
            if(isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] += intval($memodetails["Quantity"]);
            }
            else if(!isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] = intval($memodetails["Quantity"]);
            }
        }
        foreach($lid as $key=>$val){
            $tid=$db->selectDbAsArray("lenth",["t_id"],["l_id"=>$key])[0]["t_id"];
            $cid=$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$tid])[0]["c_id"];
            $iname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$key])[0]["length"];
            $tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$tid])[0]["mm"];
            $cname=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$cid])[0]["Company_name"];
            $dtl=array(
                "company"=>$cname,
                "thikness"=>$tname,
                "length"=>$iname,
                "Quantity"=>$val
            );
            $dtls[]=$dtl;
        }
        $quantity=0;
        foreach($dtls as $dt){
            if($dt["company"]=="মটকা"){
                $quantity+=intval($dt["Quantity"]);
            }
        }
        echo $quantity;
    }
}
function todaytintaka(){
    $db=new Database("localhost","root","","test");
    $total=0;
    $memodtsl=array();
    $memos=$db->CustomSelectionAsArray("SELECT `M_Id`, `Date`, `TotalPrice`, `Labor`, `Less` FROM `memo` WHERE `date`='".date("Y-m-d")."';");
    foreach($memos as $memo){
        $motka=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`=28;");
        $tin=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`!=28;");
        if(empty($motka)){
            if(!empty($tin)){
                $total+=(intval($memo["TotalPrice"]))-intval($memo["Less"]);
            }
        }
        else{
            if(!empty($tin)){
                $totalmotka=0;
            foreach($motka as $m){
                $totalmotka+=intval($m["Quantity"])*intval($m["baseprice"]);
            }
            $total+=((intval($memo["TotalPrice"])-$totalmotka))-intval($memo["Less"]);
            }
        }
    }echo $total;
}
function todaymotkataka(){
    $db=new Database("localhost","root","","test");
    $totalmotka=0;
    $memos=$db->CustomSelectionAsArray("SELECT `M_Id`, `Date`, `TotalPrice`, `Labor`, `Less` FROM `memo` WHERE `date`='".date("Y-m-d")."';");
    foreach($memos as $memo){
        $motka=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`=28;");
        if(!empty($motka)){
            foreach($motka as $m){
                $totalmotka+=intval($m["Quantity"])*intval($m["baseprice"]);
            }
        }
    }echo $totalmotka;
}

function monthtintaka(){
    $db=new Database("localhost","root","","test");
    $total=0;
    $memodtsl=array();
    $memos=$db->CustomSelectionAsArray("SELECT * FROM `memo` WHERE MONTH(`Date`) = '".date('m')."' AND YEAR(`Date`) = '".date("Y")."';");
    foreach($memos as $memo){
        $motka=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`=28;");
        $tin=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`!=28;");
        if(empty($motka)){
            if(!empty($tin)){
                $total+=(intval($memo["TotalPrice"]))-intval($memo["Less"]);
            }
        }
        else{
            if(!empty($tin)){
                $totalmotka=0;
            foreach($motka as $m){
                $totalmotka+=intval($m["Quantity"])*intval($m["baseprice"]);
            }
            $total+=((intval($memo["TotalPrice"])-$totalmotka))-intval($memo["Less"]);
            }
        }
    }echo $total;
}
function monthtin(){
    $lid=[];
    $db=new Database("localhost","root","","test");
    $memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND MONTH(`Date`) = '".date("m")."' AND YEAR(`Date`) = '".date("Y")."';");
    //$memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    if(!empty($memo)){
        foreach($memo as $memodetails){
            if(isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] += intval($memodetails["Quantity"]);
            }
            else if(!isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] = intval($memodetails["Quantity"]);
            }
        }
        foreach($lid as $key=>$val){
            $tid=$db->selectDbAsArray("lenth",["t_id"],["l_id"=>$key])[0]["t_id"];
            $cid=$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$tid])[0]["c_id"];
            $iname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$key])[0]["length"];
            $tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$tid])[0]["mm"];
            $cname=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$cid])[0]["Company_name"];
            $dtl=array(
                "company"=>$cname,
                "thikness"=>$tname,
                "length"=>$iname,
                "Quantity"=>$val
            );
            $dtls[]=$dtl;
        }
        $quantity=0;
        foreach($dtls as $dt){
            if($dt["company"]!="মটকা"){
                $quantity+=intval($dt["Quantity"]);
            }
        }
        echo $quantity;
    }
}
function ajkermemo(){
$db=new Database("localhost","root","","test");
$memodetaile=array();
$memos=$db->CustomSelectionAsArray("SELECT `M_Id`, `TotalPrice`, `Labor`, `Less`, `CustomerId`,`CustomerName` FROM`memo`,`memo_log` WHERE `memo`.`M_Id`=`memo_log`.`memoId` AND `Date`='".date("Y-m-d")."';");
foreach($memos as $memo){
    if($memo["CustomerId"]!=0||$memo["CustomerId"]!="0"){
        $memo["CustomerName"]=$db->selectDbAsArray("wholesale_customer",["Shop_Name"],["C_id"=>$memo["CustomerId"]])[0]["Shop_Name"];
        $memodetaile[]=$memo;
    }
    else{
        $memodetaile[]=$memo;
    }
}
foreach($memodetaile as $m){
    echo '<tr>
    <td>#'.$m["M_Id"].'</td>
    <td>'.$m["CustomerName"].'</td>
    <td>'.$m["TotalPrice"].'
    </td>
    <td>'.$m["Labor"].'</td>
    <td>'.$m["Less"].'</td>
    <td><span class="tag tag-success" onclick=view("'.$m["M_Id"].'")>দেখুন</span></td>
</tr>';
}
}
function todaytinbydate($date){
    $lid=[];
    $quantity=0;
    $db=new Database("localhost","root","","test");
    $memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".$date."'");
    //$memo=$db->CustomSelectionAsArray("SELECT `C_Id`, `T_Id`, `I_Id`, `Quantity` FROM `memo_details`,`memo` WHERE `memo_details`.`M_Id`=`memo`.`M_Id` AND `date`='".date("Y-m-d")."'");
    if(!empty($memo)){
        foreach($memo as $memodetails){
            if(isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] += intval($memodetails["Quantity"]);
            }
            else if(!isset($lid[$memodetails["I_Id"]])){
                $lid[$memodetails["I_Id"]] = intval($memodetails["Quantity"]);
            }
        }
        foreach($lid as $key=>$val){
            $tid=$db->selectDbAsArray("lenth",["t_id"],["l_id"=>$key])[0]["t_id"];
            $cid=$db->selectDbAsArray("thikness",["c_id"],["t_id"=>$tid])[0]["c_id"];
            $iname=$db->selectDbAsArray("lenth",["length"],["l_id"=>$key])[0]["length"];
            $tname=$db->selectDbAsArray("thikness",["mm"],["t_id"=>$tid])[0]["mm"];
            $cname=$db->selectDbAsArray("company",["Company_name"],["c_id"=>$cid])[0]["Company_name"];
            $dtl=array(
                "company"=>$cname,
                "thikness"=>$tname,
                "length"=>$iname,
                "Quantity"=>$val
            );
            $dtls[]=$dtl;
        }
        foreach($dtls as $dt){
            if($dt["company"]!="মটকা"){
                $quantity+=intval($dt["Quantity"]);
            }
        }
        return $quantity;
    }
}
function todaytintakabydate($date){
    $db=new Database("localhost","root","","test");
    $total=0;
    $memodtsl=array();
    $memos=$db->CustomSelectionAsArray("SELECT `M_Id`, `Date`, `TotalPrice`, `Labor`, `Less` FROM `memo` WHERE `date`='".$date."';");
    foreach($memos as $memo){
        $motka=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`=28;");
        $tin=$db->CustomSelectionAsArray("SELECT `M_Id`,`C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice` FROM `memo_details` WHERE `M_Id`='".$memo["M_Id"]."' AND `C_Id`!=28;");
        if(empty($motka)){
            if(!empty($tin)){
                $total+=(intval($memo["TotalPrice"]))-intval($memo["Less"]);
            }
        }
        else{
            if(!empty($tin)){
                $totalmotka=0;
            foreach($motka as $m){
                $totalmotka+=intval($m["Quantity"])*intval($m["baseprice"]);
            }
            $total+=((intval($memo["TotalPrice"])-$totalmotka))-intval($memo["Less"]);
            }
        }
    }return $total;
}

function montpicebydate(){
    $datapice=array();
    for( $i=30;$i>=0;$i--){
        $datapice[30-$i]["x"]=date("d M",strtotime('today - '.$i.' days'));
        $datapice[30-$i]["y"]=intval(todaytinbydate(date("Y-m-d",strtotime('today - '.$i.' days'))));

    }
    echo json_encode($datapice,JSON_UNESCAPED_UNICODE);
}
function monttakabydate(){
    $datapice=array();
    for( $i=30;$i>=0;$i--){
        $datapice[30-$i]["x"]=date("d M",strtotime('today - '.$i.' days'));
        $datapice[30-$i]["y"]=intval(todaytintakabydate(date("Y-m-d",strtotime('today - '.$i.' days'))));
    }
    //$datapice[]=todaytinbydate(date("Y-m-d",strtotime('today - 0 days')));
    echo json_encode($datapice,JSON_UNESCAPED_UNICODE);
}
function datelist(){
    $date=array();
    for($i=30;$i>=0;$i--){
    }
    echo json_encode($date,JSON_UNESCAPED_UNICODE);
}
?>


<?php 
if(isset($_REQUEST["func"]) && isset($_SESSION["Access"]) && $_SESSION["Access"])
{
    switch ($_REQUEST["func"]) {
        case 'incomplitememoload':
            incomplitememoload();
            break;
        case 'getdetaillist':
            getdetaillist();
            break;
        case 'bokeyalist':
            bokeyalist();
            break;
        case 'todaytin':
            todaytin();
            break;
        case 'todaymotka':
            todaymotka();
            break;
        case 'todaytintaka':
            todaytintaka();
            break;
        case 'todaymotkataka':
            todaymotkataka();
            break;
        case 'monthtintaka':
            monthtintaka();
            break;
        case 'monthtin':
            monthtin();
            break;
        case 'ajkermemo':
            ajkermemo();
            break;
        case 'montpicebydate':
            montpicebydate();
            break;
        case 'monttakabydate':
            monttakabydate();
            break;
        case 'datelist':
            datelist();
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