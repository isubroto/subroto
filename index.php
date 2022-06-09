
<pre>
<?php
date_default_timezone_set("Asia/Dhaka");
if(!isset($_SESSION['loginstutas']) || $_SESSION['loginstutas']=="0"){
    header("location: login.city");
}
elseif(!isset($_SESSION['loginstutas']) || $_SESSION['loginstutas']=="1"){
    header("location: memo.city");
}
else{
    require("database.php");
$vals=['username'=>'subroto','email'=>'subroto@susa.com','password'=>"QWERTYUIOP"];
print_r($vals);
$valkeys=array_keys($vals);
print_r($valkeys);
$db=new Database('localhost',"root","","test");
print_r($db->selectDbAsArray("test_users",["user_name","password","email"],["test_id"=>"3"]));
print_r($db->selectDbAsJson("test_users",["user_name","password","email"],["test_id"=>"4"]));
}
?>
</pre>