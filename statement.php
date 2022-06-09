<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["loginstutas"])||$_SESSION["loginstutas"]!=1)
    {
        header("Location:login.city");
    } 
    else{  
        require("createstatement.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>একাউন্ট বিবরণ</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/print.min.css">
    <link rel="stylesheet" href="css/print.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
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
<div id="statement" style='font-family: "BenSenHandwriting";'>
            <div class="container mt-5">
            <div class="row">
                <div class="col-6 ">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="col-3"><img src="img/LogoMemo.png" alt=""></div>
                    <div class="col-9" id="CompanyInfo">
                        <h1>মেসার্স সিটি ট্রেডার্স</h1>
                        <h6  class="pl-5">প্রোঃ সুদেব চন্দ্র সাহা</h6>
                        <h6  class="pl-5">শেরে বাংলা রোড (সিনেমা রোড),সৈয়দপুর,নীলফামারী</h6>
                        <h6  class="pl-5">মোবাইল:০১৭১২১০৭২৮৫,০১৯৬২৭২৫৯১১</h6>
                    </div>
                    </div>
                    <div class="col-12 mt-2">
                        <h3 class="pl-5" id="info">গ্রাহক তথ্য</h3>
                        <h4 class="pl-5 mt-3">নামঃ &emsp;<?php echo $OwnerInfo["Shop_Name"] ?></h4>
                        <h6  class="pl-5 ml-1">ঠিকানাঃ &emsp;<?php echo  $OwnerInfo["Shop_Address"]?></h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 "><h2  class="d-flex justify-content-end">একাউন্ট বিবরণ</h2>
                    <h6  class="d-flex justify-content-end">তারিখ: <?php echo Converter::en2bn(date("d/m/Y")); ?></h6>
                    <h6 class="d-flex justify-content-end">সময়: <?php echo Converter::en2bn(date("g:i a")); ?></h6>
                    </div>
                    </div>
                </div>
               </div>
        <div class="container margin mt-3">
            <div class="card">
                <div class="card-header" style="border-bottom: 1px solid black;">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center mt-1">তারিখ</div>
                        <div class="col-4 d-flex justify-content-center mt-1">বিবরন</div>
                        <div class="col-2 d-flex justify-content-center mt-1">জমা</div>
                        <div class="col-2 d-flex justify-content-center mt-1">খরচ</div>
                        <div class="col-2 d-flex justify-content-center mt-1">টাকা</div>
                    </div>
                </div>
                <div class="card-body mb-2" style="min-height: 0;">
                <div class="row">
                        <div class="col-2 d-flex font-weight-bold justify-content-center mt-1">পুর্বের টাকা</div>
                        <div class="col-4 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex font-weight-bold justify-content-center mt-1"><?php echo Converter::en2bn((-1)*intval($accountinfo[0]["Old_Balance"])) ?></div>
                    </div>
                <?php foreach($accountinfo as $account){?>
                    <div class="row">
                        <?php if($account["Payment Status"]=="Debit" &&  intval($account["Amount"])>0){
                            $debit+=intval($account["Amount"]);
                            ?>
                            <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($account["Date"]);?></div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo $account["Referance"];?></div>
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($account["Amount"]);?></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn((-1)*intval($account["Balance"]));?></div>
                            <?php
                        }else if($account["Payment Status"]=="Credit"&& intval($account["Amount"])>0){
                            $cradit+=intval($account["Amount"]);
                            ?>
    <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($account["Date"]);?></div>
                        <div class="col-4 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($account["Amount"]);?></div>
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn((-1)*intval($account["Balance"]));?></div>
    <?php
}?>
                    </div>
                    <?php }?>
                </div>
                <div class="card-footer font-weight-bolder" style="border-top: 2px solid black;">
                        <div class="row">
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        <div class="col-4 d-flex justify-content-center mt-1"></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($cradit)?></div>
                        <div class="col-2 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($debit)?></div>
                        <div class="col-2 d-flex justify-content-center mt-1"></div>
                        </div>
                </div>
            </div>
        </div>
        <div class="container mt-1">
            <footer class="d-flex justify-content-center col-12" style="font-size: 14px; color: darkgray;">
                <div><span>ইহা কম্পিউটার দ্বারা স্বয়ঙ্ক্রিয়ভাবে তৈরিকৃত একাউন্ট বিবরণ</span></div>
            </footer>
        </div>
        </div>
        </div>
<?php

?>
</body>
<script src="js/jquery.min.js"></script>
        <script src="js/print.min.js"></script>
        <script src="js/qrcode.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/notiflix.min.js"></script>
        <script>
            $(document).ready(function(){
                Notiflix.Confirm.show("নিশ্চিত করুন","প্রিন্ট করবেন?","হ্যাঁ","না",function(){
                    cssarray=['css/bootstrap.css',
                'css/style.css','css/all.css','customfonts/font.css','css/print.min.css','css/print.css']
            printJS({ printable: 'statement', type: 'html',css: cssarray,maxWidth:2480,font_size:'',gridHeaderStyle:'',gridStyle:'',headerStyle:'',honorMarginPadding:'',style:'font-family: "BenSenHandwriting";'})
                })
            })
        </script>
</html>
<link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/print.min.css">
<?php }?>