<?php
error_reporting(E_ERROR | E_PARSE);
require("creatememo.php"); 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(isset($_REQUEST['m']) && ($_REQUEST['m']!='' || $_REQUEST['m']!=null)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/print.min.css">
    <link rel="stylesheet" href="css/print.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
</head>
<body><?php if(isset($_SESSION["loginstutas"]) && $_SESSION["loginstutas"]==1){?>
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
                    <a href="Khucramemo.city" class="dropdown-item">খুচরা ম্যামো</a>
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
        <?php }?>
    <div id="memo" style='font-family: "BenSenHandwriting";'>
            <div class="container mt-5">
            <div class="row">
               <div class="col-12 d-flex justify-content-between"></div>
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
                    <div class="col-12 mt-4">
                        <h3 class="pl-5" id="info">গ্রাহক তথ্য</h3>
                        <h4 class="pl-5 mt-3">নামঃ &emsp;<?php echo  $customerName; ?></h4>
                        <?php if($customerId!=0||$customerId!="0"){?>
                        <h6  class="pl-5 ml-1">ঠিকানাঃ &emsp;<?php echo  $customerAddress;?></h6>
                        <?php }?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 "><h1  class="d-flex justify-content-end">ম্যামো</h1>
                    <h6  class="d-flex justify-content-end">ম্যামো নং # <?php echo $Memo;?></h6>
                    <h6  class="d-flex justify-content-end">তারিখ: <?php echo Converter::en2bn($date); ?></h6>
                    <?php if($customerId!=0||$customerId!="0"){?>
                    <h6  class="d-flex justify-content-end">গ্রাহক নং: <?php echo Converter::en2bn($customerId);?></h6>
                    <?php }?>
                    </div>
                    <div class="col-12 mt-5" id="Qrcode">
                    </div>
                </div>
               </div>
            </div>
        <div class="container margin">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <?php if($customerId!=0||$customerId!="0"){?>
                        <div class="col-3 d-flex justify-content-center mt-1">পরিমান</div>
                        <div class="col-3 d-flex justify-content-center mt-1">বিবরন</div>
                        <div class="col-3 d-flex justify-content-center mt-1"> দর</div>
                        <div class="col-3 d-flex justify-content-center mt-1">টাকা</div>
                        <?php }else{?>
                            <div class="col-4 d-flex justify-content-center mt-1">পরিমান</div>
                        <div class="col-4 d-flex justify-content-center mt-1">বিবরন</div>
                        <div class="col-4 d-flex justify-content-center mt-1">টাকা</div>
                        <?php }?>
                    </div>
                </div>
                <div class="card-body">
                <?php foreach($memoInformotion as $info){?>
                    <div class="row">
                    <?php if($customerId!=0||$customerId!="0"){?>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($info["Quantity"]); ?></div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo $info["lenth"]."x".$info["thikness"]." ".$info["company"]; ?></div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($info["baseprice"]);?></div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($info["Totalprice"]);?></div>
                        <?php }else{?>
                            <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($info["Quantity"]); ?></div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo $info["lenth"]."x".$info["thikness"]." ".$info["company"]; ?></div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($info["Totalprice"]);?></div>
                            <?php }?>
                    </div>
                    <?php }
                    if(intval($labor)>0){
                    ?>
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center mt-1"></div>
                        <div class="col-4 d-flex justify-content-center mt-1">লেবার</div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($labor);?></div></div>
                    <?php }?>
                </div>
                <div class="card-footer">
                <?php if($customerId!=0||$customerId!="0"){?>
                    <div class="row d-flex justify-content-end">
                    <div class="col-4 d-flex justify-content-end mt-1" class="kothay"></div>
                        <div class="col-3 d-flex justify-content-end mt-1">মোট : </div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($TotalPrice);?></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end mt-1">পূর্বের বকেয়া :</div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($oldbalabce);?></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end mt-1">সর্বমোট টাকা :</div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn(intval($TotalPrice)+intval($oldbalabce))?></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end mt-1">জমা :</div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn(intval($jomataka))?></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                    <div class="col-2 d-flex justify-content-end mt-1"></div>
                    <div class="col-2 d-flex justify-content-center mt-1 sign">বিক্রেতার স্বাক্ষর:</div>
                    <div class="col-2 d-flex justify-content-end mt-1"></div>
                        <div class="col-3 d-flex justify-content-end mt-1">বর্তমান বকেয়া:</div>
                        <div class="col-3 d-flex justify-content-center mt-1"><?php echo Converter::en2bn((intval($TotalPrice)+intval($oldbalabce))-intval($jomataka))?></div>
                    </div>
                    <?php } else{?>
                        <div class="row d-flex justify-content-end">
                        <div class="col-4 d-flex justify-content-end mt-1">মোট : </div>
                        <div class="col-4 d-flex justify-content-end mt-1">মোট : </div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($TotalPrice);?></div>
                    </div>
                        <div class="row d-flex justify-content-end">
                        <div class="col-4 d-flex justify-content-end mt-1">ছাড় :</div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn($less);?></div>
                    </div>
                    <div class="row d-flex justify-content-end">
                    <div class="col-1 d-flex justify-content-end mt-1"></div>
                    <div class="col-2 d-flex justify-content-center mt-1 sign">বিক্রেতার স্বাক্ষর:</div>
                    <div class="col-1 d-flex justify-content-end mt-1"></div>
                        <div class="col-4 d-flex justify-content-end mt-1">বর্তমান টাকা:</div>
                        <div class="col-4 d-flex justify-content-center mt-1"><?php echo Converter::en2bn(intval($TotalPrice)-intval($less))?></div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="container mt-1">
            <footer class="d-flex justify-content-center col-12">
                <div><span>ইহা কম্পিউটার দ্বারা স্বয়ঙ্ক্রিয়ভাবে তৈরিকৃত ম্যামো</span></div>
            </footer>
        </div>
        </div>
        <div class="container d-flex justify-content-center"><button class="btn btn-success" id="print">Print</button></div>
        <script src="js/jquery.min.js"></script>
        <script src="js/print.min.js"></script>
        <script src="js/qrcode.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/notiflix.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/index.js"></script>
        <script>
            $(document).ready(function(){
                bengaliWordRepresentation = numberToBengliWords.toBengaliWords(3.14);
                $(".kothay").html("কথায় : "+bengaliWordRepresentation+"মাত্র")
            })
            <?php if(isset($_SESSION["loginstutas"]) && $_SESSION["loginstutas"]==1){?>
            $(document).ready(function(){
                Notiflix.Confirm.show("নিশ্চিত করুন","প্রিন্ট করবেন?","হ্যাঁ","না",function(){
                    cssarray=['css/bootstrap.css',
                'css/style.css','css/all.css','customfonts/font.css','css/print.min.css','css/print.css']
            printJS({ printable: 'memo', type: 'html',css: cssarray,maxWidth:2480,font_size:'',gridHeaderStyle:'',gridStyle:'',headerStyle:'',honorMarginPadding:'',style:'font-family: "BenSenHandwriting";'})
                })
            })
            <?php }?>
        $(document).on("click","button#print",function(){
            
            cssarray=['css/bootstrap.css',
                'css/style.css','css/all.css','customfonts/font.css','css/print.min.css','css/print.css']
            printJS({ printable: 'memo', type: 'html',css: cssarray,maxWidth:2480,font_size:'',gridHeaderStyle:'',gridStyle:'',headerStyle:'',honorMarginPadding:'',style:'font-family: "BenSenHandwriting";'})
        })
        $(document).on("click","button#printbolck",function(){
            
            cssarray=['css/bootstrap.css',
                'css/style.css','css/all.css','customfonts/font.css','css/print.min.css','css/print.css']
            printJS({ printable: 'memo', type: 'html',css: cssarray,maxWidth:2480,font_size:'',gridHeaderStyle:'',gridStyle:'',headerStyle:'',honorMarginPadding:'',style:'font-family: "BenSenHandwriting";'})
        })
        $(document).ready(function(){
            var qrcode = new QRCode("Qrcode", {
                text: "<?php echo $Memo?>",
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        })
        </script>
</body>
</html>
<link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/print.min.css">
    <?php }else{?>
        <h1 style="display:flex; justify-content: center; margin-top:45vh;color:red;">কোন ম্যামো পাওয়া যায় নি।</h1>
        <?php }?>