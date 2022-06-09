<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
function loginstutas(){
    if(isset($_SESSION["loginstutas"])&&$_SESSION["loginstutas"]==1)
    {
        echo 1;
    }
    else{
        echo 0;
    }
}
?>
<?php 
if(isset($_REQUEST["func"])&&$_REQUEST["func"]!=null){
    switch ($_REQUEST["func"]) {
        case 'loginstutas':
            loginstutas();
            break;
        default:
            # code...
            break;
    }
}
?>