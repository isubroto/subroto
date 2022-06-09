<?php
require("database.php");
require("Converter.php");
require("Session.php");
require("arrays.php");
require("staticfunction.php");
//error_reporting(E_ERROR | E_PARSE);
function complite(){
    $ret=true;
    $db=new Database("localhost","root","","test");
    $meno=$db->CustomSelectionAsArray('SELECT * FROM `memo` WHERE `Date` BETWEEN "'.$_REQUEST["date"].'" AND "'.date("Y-m-d").'" AND `Status`="Not Checked";');
   foreach($meno as $mn){
    $assige=$db->insertDb("hisab",["Date"=>date("Y-m-d"),"Memo Number"=>$mn["M_Id"],"BanglaDate"=>$_REQUEST["bddate"],"WeekDate"=>$_REQUEST["Weekday"]]);
    if($assige=="inserted"){
        $success=$db->updateDB("memo",["Status"=>"Checked"],["M_Id"=>$mn["M_Id"]]);
        if($success=="updated"){
        }
        else{
            $ret=false;
        }
    }
   }
   if($ret){
       echo 1;
   }
   else{
       echo 0;
   }
}
if(isset($_REQUEST["func"])){
    switch ($_REQUEST["func"]) {
        case 'complite':
            complite();
            break;
        
        default:
            # code...
            break;
    }
}
?>