<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["loginstutas"])||$_SESSION["loginstutas"]!=1)
    {
        header("Location:login.city");
    } 
    else{  
        require("createoldhisab.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <title>পূর্বের হিসাব</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <noscript>
    <style>
        div,nav,header{
            display: none;
        }
        h2{
            position: fixed;
            color: red;
            font-size: 2.5rem;
            top:50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 1px solid red;
            padding: 0 3rem;
            background-color: rgb(247, 165, 165);
            border-radius: 5px;
            box-shadow: 0 0 0 0.2rem rgb(250, 131, 131);
        }
    </style>
       <h2>enable java script to do operation</h2>
</noscript>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="menubar">
            
            <a href="home.city" disabled class="navbar-brand"><img class="brand-logo" src="img/logo.png" alt="মেসার্স সিটি ট্রেডার্স"> মেসার্স সিটি ট্রেডার্স</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav mr-auto">
                      
                  </ul>
                <ul class="navbar-nav mr-auto menu">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ম্যামো</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="memo.city" class="dropdown-item">নতুন ম্যামো</a>
                        <a href="draftmemo.city" class="dropdown-item">অসমাপ্ত ম্যামো</a>
                        <a href="Khucramemo.city" class="dropdown-item ">খুচরা ম্যামো</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="stock.city">স্টক</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="accounts.city">একাউন্ট</a>
                  </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item">
                    <?php 
                    if(isset($_SESSION["loginstutas"])&&$_SESSION["loginstutas"]==1){
                        ?><a href="#" id="logout" class="nav-link lnk"><i class="fad fa-sign-out-alt mr-1"></i>
                        লগআউট</a>
                        <?php
                    }
                    else{
                        ?><a href="#" id="login" class="nav-link lnk"><i class="fad fa-user-alt"></i>
                        লগইন</a>
                        <?php
                    }
                    ?>
                    </li>
                    <li class="nav-item">
                        <a href="History.city" class="nav-link lnk">
                            <i class="fad fa-history"></i>
                        ইতিহাস
                        </a>
                    </li>
                </ul>
              </div>
    </nav>
    </header>
    <div class="row mt-2">
        <div class="col-12 h3 d-flex justify-content-center"><button class="btn btn-info" id="print">প্রিন্ট করুন</button></div>
    </div>
    <div class="container" id="create">
    <div class="row rowmapping">
        <div class="col-12 d-flex justify-content-center">
            <p><h5>শ্রী শ্রী গনেশায় নমঃ</h5></p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <p><h6>বাংলাঃ <?php echo $bddate?><span id="bangladate"></span></h6></p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <p><h6>ইংঃ <span id="engdate"> <?php echo Dateconverter::en2bn(date("d F,Y" ,strtotime($date)))?> সাল</span></h6></p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <p><h6>রোজঃ <span id="engbar"><?php echo $weekdate?></span></h6></p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-4"><div <?php  if(!empty($tins)){ echo 'class="borderbotom"';}?> >
        <?php
        if(!empty($tins)){
        echo '<div class="row d-block w-100 borderbotom"><div class="col-12 d-flex justify-content-center h4">টিন বিক্রি</div></div>';
            $totaloftin=0;
            $quantitytin=0;
            $tincount=0;
            foreach($tins as $tin1){
                echo'<div class="row mb-2"><div class="col-12">';
                foreach($tin1 as $tin2){
                    if(is_array($tin2)){
                 echo '<div class="col-10 float-left borderright" >'.Converter::en2bn($tin2["quantity"]).' পিছ '.$tin2["length"].'x'.$tin2["thikness"].' '.$tin2["company"].' </div>';
                 $quantitytin+=intval($tin2["quantity"]);
                 $tincount++;
                }
                else{
                    echo '<div class="col-2 float-right">'.Converter::en2bn($tin2).'</div>';
                    $totaloftin+=intval($tin2);
                }
                }
                echo '</div></div>';
            }
        }
        ?>
        </div>
        <?php  if(!empty($tins)){ echo '
        <div class="row mb-5"><div class="col-12">
        <div class="col-9 float-left">'.Converter::en2bn($quantitytin).' পিছ</div><div class="col-3 float-right">'.Converter::en2bn($totaloftin).'</div></div></div>';}?>
        
        <div <?php  if(!empty($tins)){ echo 'class="borderbotom"';}?> >
        <?php
        if(!empty($tins)){
        echo '<div class="row d-block w-100 borderbotom"><div class="col-12 d-flex justify-content-center h4">মটকা বিক্রি</div></div>';
            $totalofmotka=0;
            $quantitymotka=0;
            $motkacount=0;
            foreach($motkas as $motka1){
                echo'<div class="row mb-2"><div class="col-12">';
                foreach($motka1 as $motka2){
                    if(is_array($motka2)){
                 echo '<div class="col-10 float-left borderright" >'.Converter::en2bn($motka2["quantity"]).' পিছ '.$motka2["length"].'x'.$motka2["thikness"].'  </div>';
                 $quantitymotka+=intval($motka2["quantity"]);
                 $motkacount++;
                }
                else{
                    echo '<div class="col-2 float-right">'.Converter::en2bn($motka2).'</div>';
                    $totalofmotka+=intval($motka2);
                }
                }
                echo '</div></div>';
            }
        }
        ?>
        </div>
        <?php  if(!empty($tins)){ echo '
        <div class="row mb-5"><div class="col-12">
        <div class="col-9 float-left">'.Converter::en2bn($quantitymotka).' পিছ</div><div class="col-3 float-right">'.Converter::en2bn($totalofmotka).'</div></div></div>';}?>
    </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
    </div>
    </div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/apexcharts.min.js"></script>
<script src="js/counterup.js"></script>
<script src="js/print.min.js"></script>
<script src="js/all.js"></script>
<script src="js/script.js"></script>
<script src="js/notiflix.min.js"></script>
<script src="js/bootbox.all.min.js"></script>
<script src="js/buetDateTime.js"></script>
<script>
    $(document).on("click","button#print",function(){
        Notiflix.Loading.hourglass('প্রসেসিং...');
                    setTimeout(() => {
                        Notiflix.Loading.remove();
                        cssarray=['css/bootstrap.css',
                'css/style.css','css/all.css','customfonts/font.css','css/print.min.css','css/print.css']
            printJS({ printable: 'create', type: 'html',css: cssarray,maxWidth:2480,font_size:'',gridHeaderStyle:'',gridStyle:'',headerStyle:'',honorMarginPadding:'',style:'font-family: "BenSenHandwriting";'})
                    }, 2000);
        })
</script>
</body>
</html>
<?php }?>