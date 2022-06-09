<?php 
require("database.php");
require("Converter.php");
require("Session.php");
require("arrays.php");
require("staticfunction.php");
error_reporting(E_ERROR | E_PARSE);
$amountbalance="Balance Amount";
//পাইকারি হিসাব
function loadWholesale(){
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("wholesale_customer",["C_id","Shop_Name","Shop_Address"]);
    if(!empty(json_decode($success,true))){
        echo "<option selected disabled>দোকানের তালিকা</option>";
    }
    foreach (json_decode($success,true) as $data){
        if($data["Shop_Name"]!="খুচরা"){
            echo "<option value='".$data["C_id"]."'>".$data["Shop_Name"].",".$data["Shop_Address"]." </option>";
        }
    }
}

function LoadAccountBalance(){
    global $amountbalance;
    $db=new Database("localhost","root","","test");
    $success=$db->selectDbAsJson("wholesale_customer",["Shop_Name",$amountbalance],["C_id"=>$_REQUEST["CustomerId"]]);
    $amount=json_decode($success,true)[0][$amountbalance];
    $shop=json_decode($success,true)[0]["Shop_Name"];
    if($amount>0){
        echo $shop." এর বর্তমানে  &nbsp;&nbsp;<span class='h2'><a href='#' id='seestatement' class='custom-link text-red'>".Converter::en2bn($amount*(-1))."</a> </span>&nbsp;&nbsp; টাকা বাকি রয়েছে।";
    }
    elseif($amount==0){
        echo $shop." এর বর্তমানে সকল টাকা পরিশোধ করা হয়েছে।";
    }
    else if($amount<0){
        echo $shop." বর্তমানে  &nbsp;&nbsp;<span class='h2'><a href='#' class='custom-link text-success'>".Converter::en2bn($amount*(-1))."</a> </span>&nbsp;&nbsp; টাকা ফেরত পাবে।";
    }
}

function LoadShopManagement(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("shop_manage",["Caragory","SM_Id"]);
    echo "<option selected disabled>খরচের ধরন বাছুন</option>";
    foreach($data as $dt){
        echo "<option value='".$dt["SM_Id"]."'>".$dt["Caragory"]."</option> ";
    }
}

function addDailyspend(){
    $db=new Database("localhost","root","","test");
    $success=$db->insertDb("shop_manage_balance",["SM_Id"=>$_REQUEST["catagory"],"Date"=>date("Y-m-d"),"Amount"=>$_REQUEST["amount"],"LoginId"=>$_SESSION["LoginId"],"Reason"=>$_REQUEST["reason"]]);
    if($success=="inserted"){
        $data=[
        "stutas"=>1,
        "catagory"=>$db->selectDbAsArray("shop_manage",["Caragory"],["SM_Id"=>$_REQUEST["catagory"]])[0]["Caragory"],
        "amount"=>$_REQUEST["amount"]." টাকা ".$_REQUEST["reason"]." এর নামে"
   ];
    }
    else{
        $data=[
          "stutas"=>0,
          "catagory"=>$db->selectDbAsArray("shop_manage",["Caragory"],["SM_Id"=>$_REQUEST["catagory"]])[0]["Caragory"],
          "amount"=>$_REQUEST["amount"]
        ];
    }
    
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}

function SeeDokanKhat(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("shop_manage_balance",["Amount","SM_Id"],["Date"=>$_REQUEST["date"]],null,["Amount"=>"SUM"])[0]["Amount"];
    if($data==null || $data=''){
        $data=0;
    }
    echo "আপনার  ".$_REQUEST["date"]." তারিখে ".$db->selectDbAsArray("shop_manage",["Caragory"],["SM_Id"=>$_REQUEST["SM_Id"]])[0]["Caragory"]." খাতে ".Converter::en2bn($data)." টাকা খরচ হয়েছে";
}


function updateaccount(){
    global $amountbalance;
    $db=new Database("localhost","root","","test");
    $balance=$db->selectDbAsArray("wholesale_customer",[$amountbalance],["C_id"=>$_REQUEST["CustomerId"]])[0][$amountbalance];
    if($balance!='' || $balance!=null){
        $newbalance=intval($balance) - intval($_REQUEST["account"]);
    $success=$db->insertDb("account_log",["Date"=>date("Y-m-d"),"C_id"=>$_REQUEST["CustomerId"],"Amount"=>$_REQUEST["account"],"Payment Status"=>"Credit","Balance"=>$newbalance]);
    if($success=="inserted"){
        $upadte=$db->updateDB("wholesale_customer",[$amountbalance=>intval($newbalance)],["C_id"=>$_REQUEST["CustomerId"]]);
        if($upadte=="updated"){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    }
}
/* Bank Hisab*/
function LoadBankName(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("bank_manage",["B_Id","Bank_Name"]);
    echo '<option selected="" disabled="">ব্যাংকের তালিকা</option>';
    foreach($data as $dt){
        echo '<option value="'.$dt["B_Id"].'">'.$dt["Bank_Name"].'</option>';
    }
}
function CreateBankName(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("bank_manage",["B_Id","Bank_Name"],["Bank_Name"=>trim($_REQUEST["bank"])]);
    if(!empty($data)){
        echo 99;
    }
    else{
        $success=$db->insertDb("bank_manage",["Bank_Name"=>trim($_REQUEST["bank"])]);
        if($success=="inserted"){
            CreateBankAccount();
        }
        else{
            echo 0;
        }
    }
}
function CreateBankAccount(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("bank_account",["BA_Id","Account_Number"],["Account_Number"=>$_REQUEST["account"],"B_Id"=>$db->selectDbAsArray("bank_manage",["B_Id"],["Bank_Name"=>trim($_REQUEST["bank"])])[0]["B_Id"]]);
    if(!empty($data))
    {
        echo 99;
    }
    else{
        $success=$db->insertDb("bank_account",["B_Id"=>$db->selectDbAsArray("bank_manage",["B_Id"],["Bank_Name"=>trim($_REQUEST["bank"])])[0]["B_Id"],"Account_Number"=>$_REQUEST["account"],"Amount"=>"0"]);
    if($success=="inserted"){
        echo 1;
    }
    else {
        echo 0;
    }
    }
}

function LoadBankAccount(){
    $db=new Database("localhost","root","","test");
$data=$db->selectDbAsArray("bank_account",["BA_Id","Account_Number"],["B_Id"=>$_REQUEST["B_Id"]]);
echo '<option selected="" disabled="">একাউন্ট নম্বর</option>';
foreach($data as $dt){
    echo '<option value="'.$dt["BA_Id"].'">'.$dt["Account_Number"].'</option>';
}
}

function CreditAccountBalance()
{
    $db=new Database("localhost","root","","test");
    $amount=intval($db->selectDbAsArray("bank_account",["Amount"],["BA_Id"=>$_REQUEST["account"]])[0]["Amount"]);
    $data=$db->insertDb("bank_account_manage",["BA_Id"=>$_REQUEST["account"],"Operation"=>"credit","Source"=>$_REQUEST["source"],"Amount"=>$_REQUEST["amount"],"Previous_Amount"=>$amount,"Login_Id"=>$_SESSION["LoginId"]]);
    if($data=="inserted"){
        $NewAmount=$amount+intval($_REQUEST["amount"]);
        $success=$db->updateDB("bank_account",["Amount"=>$NewAmount],["BA_Id"=>$_REQUEST["account"]]);
        if($success=="updated"){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    else {
        echo 0;
    }
}

function DebitAccountBalance(){
    $db=new Database("localhost","root","","test");
    $amount=intval($db->selectDbAsArray("bank_account",["Amount"],["BA_Id"=>$_REQUEST["account"]])[0]["Amount"]);
    $data=$db->insertDb("bank_account_manage",["BA_Id"=>$_REQUEST["account"],"Operation"=>"debit","Source"=>$_REQUEST["source"],"Amount"=>$_REQUEST["amount"],"Previous_Amount"=>$amount,"Login_Id"=>$_SESSION["LoginId"]]);
    if($data=="inserted"){
        $NewAmount=$amount-intval($_REQUEST["amount"]);
        $success=$db->updateDB("bank_account",["Amount"=>$NewAmount],["BA_Id"=>$_REQUEST["account"]]);
        if($success=="updated"){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    else {
        echo 0;
    }
}

function SeeAccountbalabce(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("bank_account",["Amount","Account_Number"],["BA_Id"=>$_REQUEST["acc"]])[0];
    if(intval($data["Amount"])>0){
        echo " আপনার ".$data["Account_Number"]." একাউন্টে  ".Converter::en2bn($data["Amount"])." টাকা জমা আছে";
    }elseif(intval($data["Amount"])<0){
        echo "আপনার ".$data["Account_Number"]." একাউন্টে ".Converter::en2bn($data["Amount"]*(-1))." টাকা বাকি আছে";
    }elseif(intval($data["Amount"])==0){
        echo "আপনার ".$data["Account_Number"]." একাউন্টে কোনা টাকা জমা নেই";
    }
}
/* Company Hiasb */
function getTinTon($mili,$foot){
global $Tintons;
echo $Tintons[$mili][$foot];
}

function CteateNewCompanyMemo(){
    $db=new Database("localhost","root","","test");
    $newid=date("m").randString(4).date("d");
    $data=Array();
    while(true){
       $existingId=$db->selectDbAsArray('company_manage',["CM_Id"],["CM_Id"=>$newid]);
       if(empty($existingId)){
          $success=$db->insertDb("company_manage",["CM_Id"=>$newid,"Date"=>date("Y-m-d"),"TotalPrice"=>$_REQUEST["TotalPrice"],"QuanititinPice"=>$_REQUEST["TotalPice"],"QuantityInTon"=>$_REQUEST["TotalTon"]]);
          if($success=="inserted"){
            $data=["Id"=>$newid,"Stusas"=>1];
          }
          else{
            $data=["Stusas"=>0];
          }
           break;
       }
       else{
        $newid=date("m").randString(4).date("d");
       }
    }
    echo json_encode($data);
}

function AddNewCompanyMemoDetails(){
    $db=new Database("localhost","root","","test");
    $success=$db->insertDb("company_details_manage",["CM_Id"=>$_REQUEST["CM_Id"],"CompanyId"=>$_REQUEST["CompanyId"],"ThiknessId"=>$_REQUEST["ThiknessId"],"LengthId"=>$_REQUEST["LengthId"],"Quantity"=>$_REQUEST["Quantity"],"Rate"=>$_REQUEST["Rate"]]);
    if($success=="inserted"){
        echo 1;
    }
    else{
        echo 0;
    }
}

function SeeCompanyMemo(){
    $db=new Database("localhost","root","","test");
    echo json_encode($db->CustomSelectionAsArray("SELECT `CM_Id`, `Date`, `TotalPrice`, `QuanititinPice`, `QuantityInTon` FROM `company_manage` WHERE `Date` BETWEEN '".$_REQUEST["date"]."' And '".date("Y-m-d")."'"),JSON_UNESCAPED_UNICODE);
}

function companyorderdetails(){
    $db=new Database("localhost","root","","test");
    $data=$db->selectDbAsArray("company_details_manage",["CDM_Id", "CM_Id", "CompanyId", "ThiknessId", "LengthId", "Quantity", "Rate"],["CM_Id"=>$_REQUEST["Id"]]);
    CreateDetails($data);
}
function CreateDetails($data){
    $db=new Database("localhost","root","","test");
    $newdata=array();
    global $Tintons;
    for($i=0;$i<count($data);$i++){
        $newarray["Company"]=json_decode($db->selectDbAsJson("company",["Company_name"],["c_id"=>$data[$i]["CompanyId"]]),true)[0]["Company_name"];
        $newarray["CompanyId"]=intval($data[$i]["CompanyId"]);
        $newarray["Length"]=json_decode($db->selectDbAsJson("lenth",["length"],["l_id"=>$data[$i]["LengthId"]]),true)[0]["length"];
        $newarray["LengthId"]=intval($data[$i]["LengthId"]);
        $newarray["Quantity"]=intval($data[$i]["Quantity"]);
        $newarray["Rate"]=intval($data[$i]["Rate"]);
        $newarray["Thikness"]=json_decode($db->selectDbAsJson("thikness",["mm"],["t_id"=>$data[$i]["ThiknessId"]]),true)[0]["mm"];
        $newarray["ThiknessId"]=intval($data[$i]["ThiknessId"]);
        if($newarray["Company"]=="মটকা"){
            $newarray["Ton"]="0";
        $newarray["Total"]=round($newarray["Quantity"]*$newarray["Rate"]);
        }
        else{
            $newarray["Ton"]=intval($newarray["Quantity"]/ $Tintons[$newarray["Thikness"]][$newarray["Length"]]);
            $newarray["Ton"]=number_format($newarray["Ton"],3,".",'');
        $newarray["Total"]=round(($newarray["Rate"]/$Tintons[$newarray["Thikness"]][$newarray["Length"]])*$newarray["Quantity"]);
        }
        $newarray["id"]=intval($data[$i]["CDM_Id"]);
        $newdata[]=$newarray;
    }
    print_r(json_encode($newdata,JSON_UNESCAPED_UNICODE));
}
?>



<?php 
if(isset($_REQUEST["func"]) && isset($_SESSION["Access"]) && $_SESSION["Access"])
{
    switch ($_REQUEST["func"]) {
        case 'loadWholesale':
            loadWholesale();
            break;
            case 'LoadAccountBalance':
                LoadAccountBalance();
            break;
            case 'updateaccount':
                updateaccount();
            break;
            case 'LoadShopManagement':
                LoadShopManagement();
            break;
            case 'addDailyspend':
                addDailyspend();
            break;
            case 'SeeDokanKhat':
                SeeDokanKhat();
            break;
            case 'LoadBankName':
                LoadBankName();
            break;
            case 'CreateBankName':
                CreateBankName();
            break;
            case 'CreateBankAccount':
                CreateBankAccount();
            break;
            case 'LoadBankAccount':
                LoadBankAccount();
            break;
            case 'CreditAccountBalance':
                CreditAccountBalance();
            break;
            case 'DebitAccountBalance':
                DebitAccountBalance();
            break;
            case 'CteateNewCompanyMemo':
                CteateNewCompanyMemo();
            break;
            case 'AddNewCompanyMemoDetails':
                AddNewCompanyMemoDetails();
            break;
            case 'SeeCompanyMemo':
                SeeCompanyMemo();
            break;
            case 'companyorderdetails':
                companyorderdetails();
            break;
            case 'SeeAccountbalabce':
                SeeAccountbalabce();
            break;
            case 'getTinTon':
                getTinTon($_REQUEST["mili"],$_REQUEST["foot"]);
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
