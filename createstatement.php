<?php
require("database.php");
require("Converter.php");
require("Session.php");
require("arrays.php");
require("staticfunction.php");
error_reporting(E_ERROR | E_PARSE);
$debit=0;
$cradit=0;
$db=new Database('localhost','root','','test');
$accountinfo=$db->CustomSelectionAsArray("SELECT `AL_Id`, `Date`, `C_id`, `Amount`, `Payment Status`, `Balance`, `Old_Balance`, `Referance` FROM `account_log` WHERE `C_id`='".$_REQUEST["Id"]."' AND `Date` BETWEEN '".$_REQUEST["date"]."' AND '".date("Y-m-d")."'");
$OwnerInfo=$db->selectDbAsArray('wholesale_customer',["Shop_Name","Shop_Address"],["C_id"=>$_REQUEST["Id"]])[0];
?>