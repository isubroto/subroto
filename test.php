<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
</head>
<body>
    <?php
    require("database.php");
    function Mustitableselect($tables,$collumns,$joiningcondition,$condition,$Wherecolumnformat=null,$selectcolmnformat=null)
    {
        $selecttables=null;
        $selectcollumns=null;
        $selectjoiningcondition=null;
        $selectcondition=null;
        foreach($tables as $table)
        {
            $selecttables.=$table.',';
        }
        $selecttables=substr($selecttables,0,strlen($selecttables)-1);

        foreach($collumns as $collumn=>$collumnvalue){
            $selectcollumns.=$collumn.".".$collumnvalue." as ".$collumnvalue.",";
        }
        $selectcollumns=substr($selectcollumns,0,strlen($selectcollumns)-1);
        foreach ($joiningcondition as $joinconditions) {
            foreach($joinconditions as $join=>$col){
                $selectjoiningcondition.=$join.".".$col." = ";
            }
            $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-3);
            $selectjoiningcondition.=" AND ";
        }
        $selectjoiningcondition=substr($selectjoiningcondition,0,strlen($selectjoiningcondition)-5);

        foreach($condition as $data){
                $selectcondition.=$data[0].".".$data[1]." = '".$data[2]."' AND ";
        }
        $selectcondition=substr( $selectcondition,0,strlen( $selectcondition)-5);
        return "SELECT ".$selectcollumns." FROM ".$selecttables." WHERE ".$selectjoiningcondition ." AND ".$selectcondition;
    }
$db=new Database("localhost","root","","test");
    echo Mustitableselect(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["l_id"]]]);
    print_r($db->selectwithjoiningDbAsArray(["company","thikness","lenth","stock"],["company"=>"Company_name","thikness"=>"mm","lenth"=>"length","stock"=>"pice"],[["company"=>"c_id","thikness"=>"c_id"],["thikness"=>"t_id","lenth"=>"t_id"],["lenth"=>"l_id","stock"=>"l_id"]],[["stock","l_id",$_REQUEST["l_id"]]])[0]);
    ?>




    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/bootbox.all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/linq.min.js"></script>
</body>
</html>