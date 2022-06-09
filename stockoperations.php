<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require("database.php");
error_reporting(E_ERROR | E_PARSE);
function loadCompany(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("company",["c_id","Company_name"]);
    $data=json_decode($data,true);
    echo "<option selected disabled>কোম্পানি</option>";
     foreach($data as $array){
         echo " <option value=".$array["c_id"].">". $array["Company_name"]."</option> ";
     }
}
function loadmili(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("thikness",["t_id","mm"],["c_id"=>$_REQUEST["companyid"]]);
    $data=json_decode($data,true);
    echo "<option selected disabled>মিলি</option>";
     foreach($data as $array){
         echo "<option value=".$array["t_id"].">". $array["mm"]."</option>";
     }
}
function loadfoot(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("lenth",["l_id","length"],["t_id"=>$_REQUEST["miliid"]]);
    $data=json_decode($data,true);
    echo "<option selected disabled>ফুট</option>";
     foreach($data as $array){
         echo "<option value=".$array["l_id"].">". $array["length"]."</option>";
     }
}


function ViewData(){
    $db=new Database('localhost',"root","","test");
    $data=$db->selectDbAsJson("stock",["pice"],["l_id"=>$_REQUEST["footid"]]);
    if(!empty(json_decode($data,true))){
        echo json_decode($data,true)[0]["pice"];
    }
    else {
        echo 0;
    }
    
}
?>

<?php 
if(isset($_REQUEST["func"]) && $_SESSION["loginstutas"] && isset($_SESSION["Access"]) && $_SESSION["Access"])
{
    switch ($_REQUEST["func"]) {
    case 'loadCompany':
        loadCompany();
        break;
        case 'loadmili':
        loadmili();
        break;
        case 'loadfoot':
        loadfoot();
        break;
        case 'ViewData':
        ViewData();
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