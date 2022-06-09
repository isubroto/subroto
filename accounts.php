<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["loginstutas"])||$_SESSION["loginstutas"]!=1)
    {
        header("Location:login.city");
    } 
    else{  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>একাউন্ট</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
<body  class="bg_background"">
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>
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
                    <a class="nav-link accountactive" href="">একাউন্ট</a>
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
<div class="d-flex justify-content-center mt-5">
<div class="container justify-content-center">
<div class="col-12">
<div class="card justify-content-center">
<div class=" card-header justify-content-center text-white bg-custom-orange">
<h2 class="d-flex justify-content-center mt-3">
একাউন্ট বিভাগ
</h2>
</div>
<div class="card-body">
<div class="row d-flex justify-content-center">
<div class="col-12">
<div class="card">
<div class="card-header justify-content-center bg-red text-white">
<ul class="nav nav-tabs">
<li class= "nav-item"><a class= "nav-link text-white" id="addwholesaletab" data-toggle="tab" href="#paikarihisab">পাইকারী হিসাব</a></li>
<li class="nav-item"><a class=" nav-link text-white" id="addmilitab" data-toggle="tab" href="#bankerhisab">ব্যাংকের হিসাব</a></li>
<li class="nav-item"><a class=" nav-link text-white" id="addcompanytab" data-toggle="tab" href="#companirhisab">কোম্পানীর হিসাব</a></li>
<li class="nav-item"><a class=" nav-link text-white" id="addShoptab" data-toggle="tab" href="#dokanerhisab">দোকানের হিসাব</a></li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">
<div class="tab-pane in active" id="paikarihisab">
<div class="row">
<div class="col-12">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">দোকানের নাম</span>
</div>
<select name="customershopname" id="customershopname" class=" form-control">
<option selected disabled>দোকানের তালিকা</option>
</select>
<div class="input-group-append">
    <button class="btn btn-custom-orange" id="seeaccount"><i class="fad fa-info-square"></i>&nbsp; দেখুন</button>
</div>
</div>
<p class="h3 d-flex py-2 mt-3 justify-content-center" id="customernalance">
</p>
</div>
<div class="col-12">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">টাকার পরিমান</span>
</div>
<input type="number" name="customermoney" id="customermoney" placeholder="টাকা" class=" form-control" disabled>
<div class="input-group-append">
<button class="btn btn-custom-orange"  id="depositbtn"  disabled><i class="fad fa-check-circle"></i>&nbsp; জমা করুন</button>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="bankerhisab">
<div class="row">
    <div class="col-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">ব্যাংকের নাম</span>
            </div>
            <select name="bankname" id="bankname" class=" form-control">
                <option selected disabled>ব্যাংকের তালিকা</option>
                <option value="#"> ব্যাংক ১</option>
                <option value="#"> ব্যাংক ২</option>
                <option value="#"> ব্যাংক ৩</option>
                <option value="#"> ব্যাংক ৪</option>
            </select>
            <div class="input-group-append"><button id="addbankname" class="btn btn-custom-indigo"><i class="fad fa-pencil-alt mr-1"></i> ব্যাংক যোগ করুন</button></div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mt-4">
        <div class="card">
            <div class="card-header bg-custom-green text-white">
                <h2 class="d-flex justify-content-center">জমা</h2>
            </div>
            <div class="card-body">
                <div class="col-12 mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">একাউন্ট</span>
                        </div>
                        <select name="jomabankaccountname" id="jomabankaccountname" class=" form-control" disabled>
                            <option selected disabled>একাউন্ট নম্বর</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">টাকা</span>
                        </div>
                        <input type="number" name="jomataka" placeholder="টাকা" id="jomataka" class=" form-control" disabled>
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">জমার উৎস</span>
                        </div>
                        <input type="text" name="jomarutshocustom" id="jomarutshocustom" placeholder="জমার উৎস" class=" form-control" disabled>
                        <div class="input-group-append"><select name="jomarutsho" id="jomarutsho" disabled="disabled"><option selected disabled>উৎস</option><option>নিজ</option><option>অন্যান্য</option></select></div>
                    </div>
                    <span class="error-message d-flex justify-content-center" id="bankjomaerrormsg"></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" id="bankjomaclear" class="btn btn-danger"><i class="far fa-trash-alt mr-2"></i>মুছুন</button>
                <button type="button" id="bankaccountjoma" class="btn btn-custom-green mx-3" disabled><i class="far fa-wallet mr-2"></i>জমা করুন</button>
                </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="d-flex justify-content-center">খরচ</h2>
            </div>
            <div class="card-body">
                <div class="col-12 mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">একাউন্ট</span>
                        </div>
                        <select name="khorosbankaccountname" id="khorosbankaccountname" class=" form-control" disabled>
                            <option selected disabled>একাউন্ট নম্বর</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">টাকা</span>
                        </div>
                        <input type="number" name="khorostaka" placeholder="টাকা" id="khorostaka" class=" form-control" disabled>
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">খরচের কারন</span>
                        </div>
                        <input type="text" name="khorostakarkaron" id="khorostakarkaron" placeholder="খরচের কারন" class=" form-control" disabled>
                    </div>
                    <span class="error-message d-flex justify-content-center" id="bankkhoroserrormsg"></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" id="bankkhorosclear" class="btn btn-danger"><i class="far fa-trash-alt mr-2"></i>মুছুন</button>
                <button type="button" id="bankaccountkhoros" class="btn btn-primary mx-3" disabled><i class="far fa-sack-dollar mr-2"></i>খরচ করুন</button>
                </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mt-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h2 class="d-flex justify-content-center">দেখুন</h2>
            </div>
            <div class="card-body">
                <div class="col-12 mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">একাউন্ট</span>
                        </div>
                        <select name="khorosbankaccountname" id="Seebankaccountname" class=" form-control" disabled>
                            <option selected disabled>একাউন্ট নম্বর</option>
                        </select>
                    </div>
                    <span class="error-message d-flex justify-content-center" id="bankkhoroserrormsg"></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" id="bankseeclear" class="btn btn-danger"><i class="far fa-trash-alt mr-2"></i>মুছুন</button>
                <button type="button" id="bankaccountsee" class="btn btn-primary mx-3" disabled><i class="far fa-search-dollar mr-2"></i>টাকা দেখুন</button>
                </div>
        </div>
    </div>
</div>
</div>
<div class="tab-pane" id="dokanerhisab">
<div class="card">
    <div class="card-header bg-custom-indigo text-white"><h2 class="d-flex justify-content-center">খরচের হিসাব</h2></div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header bg-cyan text-white"><h2 class="d-flex justify-content-center"> খরচ লিখুন</h2></div>
                    <div class="card-body"><select name="catagory" id="catagorywrite" class="form-control">
                    <option selected disabled>খরচের ধরন বাছুন</option>
                     </select>
                    <input type="number" name="Damount" id="Damount" placeholder="টাকা" disabled class="form-control mt-3">
                    <input type="text" name="khorocherkaron" id="khorocherkaron" placeholder="খরচের কারন" class="form-control mt-3" disabled>
                    </div>
                    <div class="card-footer d-flex justify-content-center"><button class="btn btn-outline-cyan" id="dokhankhatejaom" disabled><i class="fad fa-wallet mr-1"></i> জমা করুন</button></div>
                </div>
                <span class="error-message d-flex justify-content-center" id="senderrormsg"></span>
            </div>
            <div class="col-sm-12 col-lg-6 mt-sm-4 mt-lg-0">
                <div class="card">
                    <div class="card-header bg-lite-green text-white"><h2 class="d-flex justify-content-center"> খরচ দেখুন</h2></div>
                    <div class="card-body"><select name="catagory" id="catagorysee" class="form-control">
                    <option selected disabled>খরচের ধরন বাছুন</option>
                     </select>
                     <input type="text" readonly class="form-control mt-3"  data-date-end-date="0d" disabled id="datepicker">
                    </div>
                    <div class="card-footer d-flex justify-content-center"><button class="btn btn-outline-lite-green" id="dokhankhatesee" disabled><i class="fad fa-search mr-1"></i>দেখুন</button></div>
                </div>
                <span class="error-message d-flex justify-content-center" id="viewerrormsg"></span>
            </div>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
</div>
<div class="tab-pane" id="companirhisab">
    <div class="row">
        <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark-cyan">
                        <h2 class="text-white d-flex justify-content-center pt-1">
                            তথ্য জমা করুন
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class=" input-group-text">কোম্পানি</span>
                                </div>
                                <select name="companyaccournstore" id="companyaccournstore" class="form-control">
                                    <option selected disabled>কোম্পানি</option>
                                </select>
                            </div>
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        মিলি
                                    </span>
                                </div>
                                <select name="thiknessaccournstore" id="thiknessaccournstore" class="form-control" disabled>
                                    <option selected disabled>মিলি</option>
                                </select>
                            </div>
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ফুট
                                    </span>
                                </div>
                                <select name="lengthaccournstore" id="lengthaccournstore" class="form-control" disabled>
                                    <option selected disabled>ফুট</option>
                                </select>
                            </div>
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        পিছ
                                    </span>
                                </div>
                                <input type="number" name="quantityaccournstore" id="quantityaccournstore" placeholder="পিছ" class="form-control" disabled>
                            </div>
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        দর
                                    </span>
                                </div>
                                <input type="number" name="rateaccournstore" id="rateaccournstore" placeholder="দর" class="form-control" disabled>
                            </div>
                            <span class="error-message d-flex justify-content-center" id="companyjomaerrormsg"></span>
                        </div>
                        <div class="row py-2">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-outline-red mx-2" id="clearaccournstore"><i class="far fa-trash-alt mr-1"></i> মুছুন</button>
                                <button class="btn btn-outline-dark-cyan mx-2" id="createaccournstore" disabled><i class="fad fa-calendar-plus mr-1"></i> লিস্টে যুক্ত করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header bg-custom-blue">
                        <h2 class="text-white d-flex justify-content-center pt-1">
                            তথ্য দেখুন
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend"><div class="input-group-text"><i class="fad fa-calendar-alt"></div></i></div>
                                <input type="text" title="তারিখ বাছুন" data-toggle='tooltip' class="form-control" name="datepickerstock" id="datepickerstock" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-outline-red mx-2" id="clearviewaccountstore"><i class="far fa-trash-alt mr-1"></i> মুছুন</button>
                                <button class="btn btn-outline-custom-blue mx-2" id="viewaccountstore"><i class="fad fa-list-alt mr-1"></i> দেখুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-7 col-md-12 col-sm-12">
            <div class="card" id="move">
                <div class="card-header bg-peru">
                    <h2 class="d-flex justify-content-center text-white">যাচাই করুন</h2>
                </div>
                <div class="card-body" id="cardbodyresult">
                <h3 class="mt-5 d-flex justify-content-center">কোন তথ্য পাওয়া যায় নি।</h3>
                </div>
            </div>
        </div>
        <div class="col-12" id="orderdetails">
            
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
<script src="js/linq.min.js"></script>
<script src="js/notiflix.min.js"></script>
<script src="js/bootbox.all.min.js"></script>
<script src="js/script.js"></script>
<script src="js/datepicker.min.js"></script>
<script>
CompanyOrderList=Array();
$(document).ready(function(){
$("#customershopname").change(function(){
$("#customermoney").prop('disabled',true);
$("#depositbtn").prop('disabled',true);
if($("#customershopname").find(':selected').text()!="দোকানের তালিকা"){
$("#customermoney").prop('disabled',false);
$("#depositbtn").prop('disabled',false);
}
});
$("#customermoney").keypress(function (e) {
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
return false;
}
});
});
$(document).on("click","button#depositbtn",function(){
    Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
if($("#customermoney").val()!=''){
    Notiflix.Confirm.show("নিশ্চিত করুন",'আপনি কি <span class="text-custom-orange h5">&nbsp;'+$("#customershopname").find(":selected").text()+'</span>&nbsp; এর একাউন্টে <span class="text-custom-orange h5">&nbsp;'+$("#customermoney").val().getDigitBanglaFromEnglish()+'</span>&nbsp; টাকা জমা করবেন?','হ্যাঁ','না',function(){
        $.post("accountoperations.php",{func:"updateaccount",CustomerId:$("#customershopname").find(":selected").val(),account:$("#customermoney").val()},"JSON").done(function(data){
        if(data==1){
            $.post("accountoperations.php",{func:"LoadAccountBalance",CustomerId:$("#customershopname").find(":selected").val()},"HTML").done(function(data){
            setTimeout(function() {
                Notiflix.Loading.remove();
                setTimeout(function(){
                    $("#customernalance").html(data);
            Notiflix.Notify.success('হালনাগাদ সম্পন্ন হয়েছে');
                },300)
            }, 3000);
    })
        }
    })
    });
}
else
{
$("#customermoney").focus();
}

});
$(document).ready(function(){
$("#addcompanytab").click(function () {
$("#customershopname").prop("selectedIndex",'0');
$("#customermoney").prop("disabled",true);
$("#depositbtn").prop("disabled",true);
$("#customermoney").val('');


});
});

$(document).on("change","select#bankname",function(){
    $("#jomabankaccountname").prop("disabled",true);
    $("#khorosbankaccountname").prop("disabled",true);
    $("#jomataka").prop("disabled",true);
    $("#khorostaka").prop("disabled",true);
    $("#khorostakarkaron").prop("disabled",true);
    if($("#bankname").find(":selected").text()!="ব্যাংকের তালিকা")
    {
        $.when($.post("accountoperations.php",{func:"LoadBankAccount",B_Id:$("#bankname").find(":selected").val()},"HTML").done(function(data){
            $("#jomabankaccountname").html(data);
            $("#khorosbankaccountname").html(data);
            $("#Seebankaccountname").html(data);
        })).done(function(){$("#jomabankaccountname").prop("disabled",false);
        $("#khorosbankaccountname").prop("disabled",false);
        $("#Seebankaccountname").prop("disabled",false);
        $("#bankaccountkhoros").prop("disabled",true);
        $("#bankaccountjoma").prop("disabled",true);
        $("#bankaccountkhoros").prop("disabled",true);
        $("#jomataka").prop("disabled",true);
        $("#jomarutshocustom").prop("disabled",true);
        $("#khorostaka").prop("disabled",true);
        $("#khorostakarkaron").prop("disabled",true);
        $("#jomabankaccountname").prop("selectedIndex",0);
        $("#Seebankaccountname").prop("selectedIndex",0);
        $("#khorosbankaccountname").prop("selectedIndex",0);})

    }
});
$(document).on("change","select#Seebankaccountname",function(){
    $("#bankaccountsee").prop('disabled',false);
})
$(document).on("click","button#bankseeclear",function(){
    $("#bankaccountsee").prop('disabled',true);
    $("#Seebankaccountname").prop("selectedIndex",0);
})
$(document).on("click","button#bankaccountsee",function(){
    Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
    $.post("accountoperations.php",{func:"SeeAccountbalabce",acc:$("#Seebankaccountname").find(":selected").val()},"HTML").done(function(data){
        setTimeout(() => {
            Notiflix.Loading.remove();
            setTimeout(() => {
              Notiflix.Report.info("",data);  
            }, 300);
        }, 3000);
    })
})
$(document).on("change","select#jomabankaccountname",function(){
    $("#jomataka").prop("disabled",true);
    $("#bankaccountjoma").prop("disabled",true);
    $("#jomarutsho").prop("disabled",true);
    if($("#jomabankaccountname").find(":selected").text()!="একাউন্ট নম্বর")
    {
        $("#jomataka").prop("disabled",false);
        $("#bankaccountjoma").prop("disabled",false);
        $("#jomarutsho").prop("disabled",false);
    }
});
$(document).on("change","select#khorosbankaccountname",function(){
    $("#khorostaka").prop("disabled",true);
    $("#khorostakarkaron").prop("disabled",true);
    $("#bankaccountkhoros").prop("disabled",true);
    if($("#khorosbankaccountname").find(":selected").text()!="একাউন্ট নম্বর")
    {
        $("#khorostaka").prop("disabled",false);
        $("#khorostakarkaron").prop("disabled",false);
        $("#bankaccountkhoros").prop("disabled",false);
    }
});
$(document).on("change","select#companyaccournstore",function(){
    $("#thiknessaccournstore").prop("disabled",true);
    $("#thiknessaccournstore").prop("selectedIndex",0);
    $("#lengthaccournstore").prop("disabled",true);
    $("#lengthaccournstore").prop("selectedIndex",0);
    $("#quantityaccournstore").prop("disabled",true);
    $("#rateaccournstore").prop("disabled",true);
    $("#createaccournstore").prop("disabled",true);
    if($("#companyaccournstore").find(":selected").text()!="কোম্পানি বাছুন")
    {
        $("#thiknessaccournstore").prop("disabled",false);
        $("#thiknessaccournstore").prop("selectedIndex",0);
        $.post("stockoperations.php",{func:"loadmili",companyid:$("#companyaccournstore").find(":selected").val()},"HTML").done(function(data){
            $("#thiknessaccournstore").html(data);
        })
    }
});
$(document).on("change","select#thiknessaccournstore",function(){
    $("#lengthaccournstore").prop("disabled",true);
    $("#lengthaccournstore").prop("selectedIndex",0);
    $("#quantityaccournstore").prop("disabled",true);
    $("#rateaccournstore").prop("disabled",true);
    $("#createaccournstore").prop("disabled",true);
    if($("#thiknessaccournstore").find(":selected").text()!="মিলি")
    {
        $("#lengthaccournstore").prop("disabled",false);
        $("#lengthaccournstore").prop("selectedIndex",0);
        $.post("stockoperations.php",{func:"loadfoot",miliid:$("#thiknessaccournstore").find(":selected").val()},"HTML").done(function(data){
            $("#lengthaccournstore").html(data);
        })
    }
});
$(document).on("change","select#lengthaccournstore",function(){
    $("#quantityaccournstore").prop("disabled",true);
    $("#rateaccournstore").prop("disabled",true);
    $("#createaccournstore").prop("disabled",true);
    if($("#lengthaccournstore").find(":selected").text()!="মিলি")
    {
        $("#quantityaccournstore").prop("disabled",false);
        $("#createaccournstore").prop("disabled",false);
    $("#rateaccournstore").prop("disabled",false);
    }
});
$(document).ready(function()
{
    $("#quantityaccournstore").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                }
            });
    $("#rateaccournstore").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
        }
    });
});
$(document).on("click","button#clearaccournstore",function(){
    $("#thiknessaccournstore").prop("disabled",true);
    $("#thiknessaccournstore").prop("selectedIndex",0);
    $("#companyaccournstore").prop("selectedIndex",0);
    $("#lengthaccournstore").prop("disabled",true);
    $("#lengthaccournstore").prop("selectedIndex",0);
    $("#quantityaccournstore").prop("disabled",true);
    $("#rateaccournstore").prop("disabled",true);
    $("#createaccournstore").prop("disabled",true);
    $("#rateaccournstore").val('');
    $("#quantityaccournstore").val('');
});
$("#datepickerstock").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekDisabled: "5",
    daysOfWeekHighlighted:"5"
});
$("#datepickerstatement").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekDisabled: "5",
    daysOfWeekHighlighted:"5"
});

$(document).on("click","a#logout",function(){
    $.ajax({
                url:"logincheck.php",
                method:"POST",
                data:{func:"logout"},
                dataType:"JSON",
                success:function(data){
                        if(!data){
                            $.redirect("login.city")
                        }
                }
            });
})

$(document).ready(function(){
    $.post("accountoperations.php",{func:"loadWholesale"},"HTML").done(function(data){
        $("#customershopname").html(data);
        
    })
})
$(document).on("click","button#seeaccount",function(){
    if($("#customershopname").find(":selected").text()=="দোকানের তালিকা"){
        $("#customershopname").focus();
    }
    else{
        $.post("accountoperations.php",{func:"LoadAccountBalance",CustomerId:$("#customershopname").find(":selected").val()},"HTML").done(function(data){
        $("#customernalance").html(data);
    })
    }
})
$(document).on("click","#addwholesaletab",function(){
    $("#customernalance").html('');
})
$(document).on("click","button#dokhankhatejaom",function(){
    if($("#Damount").val()=='' || $("#Damount").val()==null){
        $("#senderrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> যত টাকা খরচ করেছেন লিখুন");
            $("#Damount").addClass("error-message-report");
            $("#Damount").focus();
            setTimeout(function(){ 
                $("#senderrormsg").html('');
                $("#senderrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else if($("#khorocherkaron").val()=='' || $("#khorocherkaron").val()==null){
        $("#senderrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> খরচের কারন লিখুন");
            $("#khorocherkaron").addClass("error-message-report");
            $("#khorocherkaron").focus();
            setTimeout(function(){ 
                $("#senderrormsg").html('');
                $("#senderrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else{
        $("#Damount").removeClass("error-message-report");
        $("#khorocherkaron").removeClass("error-message-report");
        Notiflix.Confirm.show("নিশ্চিত করন","আপনি কি &nbsp;<span class='text-cyan'>"+$("#catagorywrite").find(":selected").text()+" </span>&nbsp; খাতে &nbsp;<span class='text-red'>"+$("#Damount").val().getDigitBanglaFromEnglish()+"</span>&nbsp; খরচ করেছেন?",'হ্যাঁ','না',function(){
            $.post("accountoperations.php",{func:"addDailyspend",catagory:$("#catagorywrite").find(":selected").val(),amount:$("#Damount").val(),reason:$("#khorocherkaron").val()},"JSON").done(function(data1){
                    dt=JSON.parse(data1)
                    if(dt.stutas==1){
                        Notiflix.Notify.success("<span class='text-cyan'>"+dt.catagory+"&nbsp;</span> খাতে <span class='text-red'>"+(dt.amount).getDigitBanglaFromEnglish()+"&nbsp; </span>জমা হয়েছে।");
                        $("#catagorywrite").prop("selectedIndex",0);
                        $("#Damount").val('');
                        $("#Damount").prop("disabled",true);
                    }
                    else if(dt.stutas==0){
                        Notiflix.Notify.failure("<span class='text-cyan'>"+dt.catagory+"&nbsp;</span> খাতে <span class='text-red'>"+(dt.amount).getDigitBanglaFromEnglish()+"&nbsp; টাকা  </span>জমা হয়নি");
                    }
                })
        },function(){
            Notiflix.Notify.failure("প্রক্রিয়া বাতিল করা হয়েছে");
        })
    }
});
$(document).on("click","#addShoptab",function(){
    $.post("accountoperations.php",{func:"LoadShopManagement"},"HTML").done(function(data){
        $("#catagorywrite").html(data);
        $("#catagorysee").html(data);
        $("Damount").prop("disabled",true);
    })
})
$(document).on("change","select#catagorywrite",function(){
    if($("#catagorywrite").find(":selected").text()=="খরচের ধরন বাছুন"){
        $("Damount").prop("disabled",true);
        $("khorocherkaron").prop("disabled",true);
        $("dokhankhatejaom").prop("disabled",true);
    }
    else{
        $("#Damount").prop("disabled",false);
        $("#khorocherkaron").prop("disabled",false);
        $("#dokhankhatejaom").prop("disabled",false);
    }
})
$(document).on("change","select#catagorysee",function(){
    if($("#catagorysee").find(":selected").text()=="খরচের ধরন বাছুন"){
        $("#dokhankhatesee").prop("disabled",true);
        $("#datepicker").prop("disabled",true);
    }
    else{
        $("#datepicker").prop("disabled",false);
        $("#dokhankhatesee").prop("disabled",false);
    }
})
$(document).on("click","button#dokhankhatesee",function(){
    if($("#datepicker").val()=='' || $("#datepicker").val()==null){
        $("#viewerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> নির্দিষ্ট তারিখ বাছুন");
            $("#datepicker").addClass("error-message-report");
            $("#datepicker").focus();
            setTimeout(function(){ 
                $("#viewerrormsg").html('');
                $("#viewerrormsg").removeClass('error-message-report');
            }, 5000);
    }
        else{
            $("#datepicker").removeClass("error-message-report");
            $.post("accountoperations.php",{func:"SeeDokanKhat",SM_Id:$("#catagorysee").find(":selected").val(),date:$("#datepicker").val()},"HTML").done(function(data){
                Notiflix.Report.info("তথ্য দেখুন",data,"ঠিক আছে");
    })
        }
});
$(document).on("click","button#bankaccountjoma",function(){
    if($("#jomabankaccountname").find(":selected").text()=="একাউন্ট নম্বর"){
        $("#bankjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> নির্দিষ্ট একাউন্ট বাছুন");
            $("#jomabankaccountname").addClass("error-message-report");
            $("#jomabankaccountname").focus();
            setTimeout(function(){ 
                $("#bankjomaerrormsg").html('');
                $("#bankjomaerrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else if($("#jomataka").val()=='' || $("#jomataka").val()==null){
        $("#bankjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> নির্দিষ্ট টাকা লিখুন");
            $("#jomataka").addClass("error-message-report");
            $("#jomataka").focus();
            setTimeout(function(){ 
                $("#bankjomaerrormsg").html('');
                $("#bankjomaerrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else if($("#jomarutshocustom").val()=='' || $("#jomarutshocustom").val()==null){
        $("#bankjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> নির্দিষ্ট উৎস বাছুন");
            $("#jomarutshocustom").addClass("error-message-report");
            $("#jomarutshocustom").focus();
            setTimeout(function(){ 
                $("#bankjomaerrormsg").html('');
                $("#bankjomaerrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else{
        $("#bankjomaerrormsg").removeClass("error-message-report");
        $("#jomataka").removeClass("error-message-report");
        $("#jomarutshocustom").removeClass("error-message-report");
        Notiflix.Confirm.show("নিশ্চিত করুন","আপনি কি"+$("#bankname").find(":selected").text()+" ব্যাংকের "+$("#jomabankaccountname").find(":selected").text()+"  একাউন্টে "+($("#jomataka").val()).getDigitBanglaFromEnglish()+" টাকা জমা করবেন?",'হ্যাঁ','না',function(){
        $.when($.post("accountoperations.php",{func:"CreditAccountBalance",account:$("#jomabankaccountname").find(":selected").val(),amount:$("#jomataka").val(),source:$("#jomarutshocustom").val()},"JSON")).done(function(dt){
            Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
            if(dt==1){
                    setTimeout(function(){
                        Notiflix.Loading.remove()
                        setTimeout(function(){ Notiflix.Notify.success("প্রক্রিয়া সম্পন্ন হয়েছে");},300);
                    },3000);
                    $("#jomabankaccountname").prop('selectedIndex',0);
                    $("#jomataka").val('');
                    $("#jomataka").prop("disabled",true);
                    $("#jomarutshocustom").val('');
                    $("#jomarutshocustom").prop("disabled",true);
                    $("#jomarutsho").prop('selectedIndex',0);
                    $("#jomarutsho").prop("disabled",true);
                    $("#bankaccountjoma").prop("disabled",true);
                }
                else if(dt==0){
                    setTimeout(function(){
                        Notiflix.Loading.remove()
                        setTimeout(function(){ Notiflix.Notify.failure("প্রক্রিয়া সম্পন্ন হয়নি");},300);
                    },3000);
                    $("#jomabankaccountname").prop('selectedIndex',0);
                    $("#jomataka").val('');
                    $("#jomataka").prop("disabled",true);
                    $("#jomarutshocustom").val('');
                    $("#jomarutshocustom").prop("disabled",true);
                    $("#jomarutsho").prop('selectedIndex',0);
                    $("#jomarutsho").prop("disabled",true);
                    $("#bankaccountjoma").prop("disabled",true);
                }
        })
    },function(){
        Notiflix.Notify.failure("প্রক্রিয়া বাতিল করা হয়েছে");
    })
    }
});
$(document).on("change","#jomarutsho",function(){
    if($("#jomarutsho").find(":selected").text()=="নিজ"){
        $("#jomarutshocustom").val('নিজ');
        $("#jomarutshocustom").prop("disabled",true);
    }
    else if($("#jomarutsho").find(":selected").text()=="অন্যান্য"){
        $("#jomarutshocustom").val('');
        $("#jomarutshocustom").prop("disabled",false);
    }
});
$(document).on("click","button#addbankname",function(){
    $.when($.post("accountoperations.php",{func:"LoadBankName"},"HTML").done(function(dt){
        data=dt;
    })).done(function(){
    bootbox.dialog({
        title:"<h2 class='text-custom-indigo'>ব্যাংকের বিবরন যুক্ত করুন<h2>",
        message:'<div class="input-group" id="Changecondition"><select name="ondbank" id="oldbank" class="form-control">'+data+'</select><div class="input-group-append"><div class="form-check form-switch ml-2 mt-1"><input type="checkbox" name="allownew" id="allownew" class="form-check-input"><label for="allownew" class="form-check-label">নতুন ব্যাংক</label></div></div></div><div class="input-group mt-3"><input type="text" name="bankAccountnumber" placeholder="একাউন্ট নম্বর" id="bankAccountnumber" class="form-control"><div class="input-input-group-append"><span class="input-group-text px-4">একাউন্ট নম্বর</span></div></div>',
        onEscape:true,
        backdrop:true,
        buttons:{
            done:{
                label:"<i class='fad fa-check-circle mr-2'></i>সম্পন্ন",
                className:"btn-outline-custom-indigo",
                callback:function(){
                    if($("#allownew").is(":checked")){
                        if($("#newbank").val()=='' || $("#newbank").val()==null){
                            $("#newbank").addClass("error-message-report");
                            $("#newbank").focus();
                            return false;
                        }
                        else if($("#bankAccountnumber").val()=='' || $("#bankAccountnumber").val()==null){
                            $("#newbank").removeClass("error-message-report");
                            $("#bankAccountnumber").addClass("error-message-report");
                            $("#bankAccountnumber").focus();
                            return false;
                        }
                        else{
                            $("#newbank").removeClass("error-message-report");
                            $("#bankAccountnumber").removeClass("error-message-report");
                            Notiflix.Confirm.show("নিশ্চিত করুন",'আপনি কি <span class="text-custom-orange h5">&nbsp;'+$("#newbank").val()+'</span>&nbsp; নামের ব্যাংক এবং এর মধ্যে <span class="text-custom-orange h5">&nbsp;'+$("#bankAccountnumber").val().getDigitBanglaFromEnglish()+'</span>&nbsp; একাউন্ট যোগ করবেন?','হ্যাঁ','না',function(){
                                $.post("accountoperations.php",{func:"CreateBankName",bank:$("#newbank").val(),account:$("#bankAccountnumber").val()},"JSON").done(function(dt){
                                    Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
                                    if(dt==1){
                                        setTimeout(function(){
                                            $.post("accountoperations.php",{func:"LoadBankName"},"HTML").done(function(dt){
                                                        $("#bankname").html(dt);
                                                        $("#jomabankaccountname").prop('selectedIndex',0);
                                                        $("#khorosbankaccountname").prop('selectedIndex',0);
                                                        $("#bankname").prop('selectedIndex',0);
                                                        $("#jomarutsho").prop('selectedIndex',0);
                                                        $("#jomataka").val('');
                                                        $("#jomarutshocustom").val('');
                                                        $("#khorostaka").val('');
                                                        $("#khorostakarkaron").val('');
                                                        $("#jomabankaccountname").prop("disabled",true);
                                                        $("#khorosbankaccountname").prop("disabled",true);
                                                        $("#jomataka").prop("disabled",true);
                                                        $("#jomarutshocustom").prop("disabled",true);
                                                        $("#jomarutsho").prop("disabled",true);
                                                        $("#khorostaka").prop("disabled",true);
                                                        $("#khorostakarkaron").prop("disabled",true);
                                                        $("#bankaccountjoma").prop("disabled",true);
                                                        $("#bankaccountkhoros").prop("disabled",true);
                                                    })
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.success("ব্যাংক একাউন্ট যোগ হয়েছে")                    
                                                ;},300);
                                        },3000);
                                    }
                                    else if(dt>1){
                                        setTimeout(function(){
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.warning("ব্যাংকের নাম ইতিমদ্ধ্বে রয়েছে একাউন্ট নতুন হলে পুর্বে ব্যাংক বাছাই করে একাউন্ট যোগ করুন");},300);
                                        },3000);
                                    }
                                    else if(dt<1){
                                        setTimeout(function(){
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.failure("ব্যাংক একাউন্ট যোগ হয়নি");},300);
                                        },3000);
                                    }
                                    bootbox.hideAll();
                                })
                            })
                            return false;
                        }
                    }
                    else{
                        if($("#oldbank").find(":selected").text()=="ব্যাংকের তালিকা"){
                            $("#olbank").addClass("error-message-report");
                            $("#oldbank").focus();
                            return false;
                        }
                        else if($("#bankAccountnumber").val()=='' || $("#bankAccountnumber").val()==null){
                            $("#bankAccountnumber").addClass("error-message-report");
                            $("#oldbank").removeClass("error-message-report");
                            $("#bankAccountnumber").focus();
                            return false;
                        }
                        else{
                            $("#oldbank").removeClass("error-message-report");
                            $("#bankAccountnumber").removeClass("error-message-report");
                            Notiflix.Confirm.show("নিশ্চিত করুন",'আপনি কি <span class="text-custom-orange h5">&nbsp;'+$("#oldbank").find(":selected").text()+'</span>&nbsp; নামের ব্যাংক এবং এর মধ্যে <span class="text-custom-orange h5">&nbsp;'+$("#bankAccountnumber").val().getDigitBanglaFromEnglish()+'</span>&nbsp; একাউন্ট যোগ করবেন?','হ্যাঁ','না',function(){
                                $.post("accountoperations.php",{func:"CreateBankAccount",bank:$("#oldbank").find(":selected").text(),account:$("#bankAccountnumber").val()},"HTML").done(function(dt){
                                    Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
                                    if(dt==1){
                                        setTimeout(function(){
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.success("একাউন্ট যোগ হয়েছে");},300);
                                        },3000);
                                    }
                                    else if(dt>1){
                                        setTimeout(function(){
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.warning("একাউন্ট ইতিমদ্ধ্বে রয়েছে");},300);
                                        },3000);
                                    }
                                    else if(dt<1){
                                        setTimeout(function(){
                                            Notiflix.Loading.remove()
                                            setTimeout(function(){Notiflix.Notify.failure("একাউন্ট যোগ হয়নি");},300);
                                        },3000);
                                    }
                                    bootbox.hideAll();
                                
                            })
                            })
                            return false;
                        }
                    }
                }
            },
            notdone:{
                label:"<i class='fad fa-times-octagon mr-2'></i>বাতিল",
                className:"btn-outline-red",
                callback:function(){
                    
                }
                
            }
        },
    });
});
});
$('#datepicker').datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekDisabled: "5",
    daysOfWeekHighlighted:"5"
});
$(document).on("change","#allownew",function(){
    if($("#allownew").is(":checked")){
    $("#Changecondition").html('<input type="text" name="newbank" placeholder="নতুন ব্যাংক" id="newbank" class=" form-control"><div class="input-group-append"><div class="form-check form-switch ml-2 mt-1"><input type="checkbox" name="allownew" id="allownew" class="form-check-input" checked><label for="allownew" class="form-check-label">নতুন ব্যাংক</label></div></div>');
    }
    else{
        $.when($.post("accountoperations.php",{func:"LoadBankName"},"HTML").done(function(dt){
        data=dt;
    })).done(function(){
        $("#Changecondition").html('<select name="ondbank" id="oldbank" class="form-control">'+data+'</select><div class="input-group-append"><div class="form-check form-switch ml-2 mt-1"><input type="checkbox" name="allownew" id="allownew" class="form-check-input"><label for="allownew" class="form-check-label">নতুন ব্যাংক</label></div></div>')});
    }
})
$(document).on("click","#addmilitab",function(){
    $.post("accountoperations.php",{func:"LoadBankName"},"HTML").done(function(dt){
        $("#bankname").html(dt);
        $("#jomabankaccountname").prop('selectedIndex',0);
        $("#khorosbankaccountname").prop('selectedIndex',0);
        $("#jomarutsho").prop('selectedIndex',0);
        $("#jomataka").val('');
        $("#jomarutshocustom").val('');
        $("#khorostaka").val('');
        $("#khorostakarkaron").val('');
        $("#jomabankaccountname").prop("disabled",true);
        $("#khorosbankaccountname").prop("disabled",true);
        $("#jomataka").prop("disabled",true);
        $("#jomarutshocustom").prop("disabled",true);
        $("#jomarutsho").prop("disabled",true);
        $("#khorostaka").prop("disabled",true);
        $("#khorostakarkaron").prop("disabled",true);
        $("#bankaccountjoma").prop("disabled",true);
        $("#bankaccountkhoros").prop("disabled",true);
    })
})
$(document).on("click","button#bankjomaclear",function(){
    $("#jomabankaccountname").prop('selectedIndex',0);
    $("#jomataka").val('');
    $("#jomataka").prop("disabled",true);
    $("#jomarutshocustom").val('');
    $("#jomarutshocustom").prop("disabled",true);
    $("#jomarutsho").prop('selectedIndex',0);
    $("#jomarutsho").prop("disabled",true);
    $("#bankaccountjoma").prop("disabled",true);
});
$(document).on("click","button#bankkhorosclear",function(){
    $("#khorosbankaccountname").prop('selectedIndex',0);
    $("#khorostaka").val('');
    $("#khorostaka").prop("disabled",true);
    $("#khorostakarkaron").val('');
    $("#khorostakarkaron").prop("disabled",true);
    $("#bankaccountkhoros").prop("disabled",true);
})
$(document).on("click","button#bankaccountkhoros",function(){

    if($("#khorosbankaccountname").find(":selected").text()=="একাউন্ট নম্বর"){
        $("#khorosbankaccountname").addClass("error-message-report");
        $("#khorosbankaccountname").focus();
        $("#bankkhoroserrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> একাউন্ট নম্বর বাছুন");
            setTimeout(function(){ 
                $("#bankkhoroserrormsg").html('');
                $("#bankkhoroserrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else if($("#khorostaka").val()=='' || $("#khorostaka").val()==null){
        $("#khorostaka").addClass("error-message-report");
        $("#khorosbankaccountname").removeClass("error-message-report");
        $("#khorostaka").focus();
        $("#bankkhoroserrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> টাকার পরিমাণ লিখুন");
            setTimeout(function(){ 
                $("#bankkhoroserrormsg").html('');
                $("#bankkhoroserrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else if($("#khorostakarkaron").val()=='' || $("#khorostakarkaron").val()==null){
        $("#khorostakarkaron").addClass("error-message-report");
        $("#khorostaka").removeClass("error-message-report");
        $("#khorostakarkaron").focus();
        $("#bankkhoroserrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> খরছের কারন লিখুন");
            setTimeout(function(){ 
                $("#bankkhoroserrormsg").html('');
                $("#bankkhoroserrormsg").removeClass('error-message-report');
            }, 5000);
    }
    else {
        $("#khorosbankaccountname").removeClass("error-message-report");
        $("#khorostaka").removeClass("error-message-report");
        $("#khorostakarkaron").removeClass("error-message-report");
        Notiflix.Confirm.show("নিশ্চিত করুন","আপনি কি"+$("#bankname").find(":selected").text()+" ব্যাংকের "+$("#khorosbankaccountname").find(":selected").text()+"  একাউন্ট থেকে "+($("#khorostaka").val()).getDigitBanglaFromEnglish()+" টাকা খরচ করবেন?",'হ্যাঁ','না',function(){
            $.post("accountoperations.php",{func:"DebitAccountBalance",account:$("#khorosbankaccountname").find(":selected").val(),amount:$("#khorostaka").val(),source:$("#khorostakarkaron").val()},"JSON").done(function(dt){
                Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
            if(dt==1){
                    setTimeout(function(){
                        Notiflix.Loading.remove()
                        setTimeout(function(){ Notiflix.Notify.success("প্রক্রিয়া সম্পন্ন হয়েছে");},300);
                    },3000);
                    $("#khorosbankaccountname").prop('selectedIndex',0);
                    $("#khorostaka").val('');
                    $("#khorostaka").prop("disabled",true);
                    $("#khorostakarkaron").val('');
                    $("#khorostakarkaron").prop("disabled",true);
                    $("#bankaccountkhoros").prop("disabled",true);
                }
                else if(dt==0){
                    setTimeout(function(){
                        Notiflix.Loading.remove()
                        setTimeout(function(){ Notiflix.Notify.failure("প্রক্রিয়া সম্পন্ন হয়নি");},300);
                    },3000);
                    $("#khorosbankaccountname").prop('selectedIndex',0);
                    $("#khorostaka").val('');
                    $("#khorostaka").prop("disabled",true);
                    $("#khorostakarkaron").val('');
                    $("#khorostakarkaron").prop("disabled",true);
                    $("#bankaccountkhoros").prop("disabled",true);
                }
            })
        })
    }
})
$(document).on("click","#addcompanytab",function(){
    $.post("stockoperations.php",{func:"loadCompany"},"HTML").done(function(data){
        $("#companyaccournstore").html(data);
        $("#datepickerstock").tooltip({
            placement : 'right'
        })
    })
})
$(document).on("click","button#createaccournstore",function(){
    if(checkCompany()){
        Notiflix.Block.hourglass('#cardbodyresult', 'প্রসেসিং...');
        cartData();
    }
});
function checkCompany(){
    if($("#companyaccournstore").find(":selected").val()=="কোম্পানি"){
        $("#companyjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> কোম্পানি বাছুন");
            $("#companyaccournstore").addClass("error-message-report");
            $("#companyaccournstore").focus();
            setTimeout(function(){ 
                $("#companyjomaerrormsg").html('');
                $("#companyjomaerrormsg").removeClass('error-message-report');
            }, 5000);
            return false;
    }
    else if($("#thiknessaccournstore").find(":selected").val()=="মিলি"){
        $("#companyjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> মিলি বাছুন");
            $("#thiknessaccournstore").addClass("error-message-report");
            $("#thiknessaccournstore").focus();
            setTimeout(function(){ 
                $("#companyjomaerrormsg").html('');
                $("#companyjomaerrormsg").removeClass('error-message-report');
            }, 5000);
            return false;
    }
    else if($("#lengthaccournstore").find(":selected").val()=="ফুট"){
        $("#companyjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> ফুট বাছুন");
            $("#lengthaccournstore").addClass("error-message-report");
            $("#lengthaccournstore").focus();
            setTimeout(function(){ 
                $("#companyjomaerrormsg").html('');
                $("#companyjomaerrormsg").removeClass('error-message-report');
            }, 5000);
            return false;
    }
    else if($("#quantityaccournstore").val()==''){
        $("#companyjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> পিছ লিখুন");
            $("#quantityaccournstore").addClass("error-message-report");
            $("#quantityaccournstore").focus();
            setTimeout(function(){ 
                $("#companyjomaerrormsg").html('');
                $("#companyjomaerrormsg").removeClass('error-message-report');
            }, 5000);
            return false;
    }
    else if($("#rateaccournstore").val()==''){
        $("#companyjomaerrormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> দর লিখুন");
            $("#rateaccournstore").addClass("error-message-report");
            $("#rateaccournstore").focus();
            setTimeout(function(){ 
                $("#companyjomaerrormsg").html('');
                $("#companyjomaerrormsg").removeClass('error-message-report');
            }, 5000);
            return false;
    }
    else {
        $("#companyaccournstore").removeClass("error-message-report");
        $("#thiknessaccournstore").removeClass("error-message-report");
        $("#lengthaccournstore").removeClass("error-message-report");
        $("#quantityaccournstore").removeClass("error-message-report");
        $("#rateaccournstore").removeClass("error-message-report");
        return true;

    }
}
function cartData(){
    if($("#companyaccournstore").find(":selected").text()=="মটকা"){
        TotalPrice=(parseFloat($("#rateaccournstore").val())*parseFloat($("#quantityaccournstore").val()));
        TotalPrice=Math.round(TotalPrice);
        value={id:Math.random().toString(36),Company:$("#companyaccournstore").find(":selected").text(),CompanyId:$("#companyaccournstore").find(":selected").val(),Thikness:$("#thiknessaccournstore").find(":selected").text(),ThiknessId:$("#thiknessaccournstore").find(":selected").val(),Length:$("#lengthaccournstore").find(":selected").text(),LengthId:$("#lengthaccournstore").find(":selected").val(),Quantity:$("#quantityaccournstore").val(),Rate:$("#rateaccournstore").val(),Ton:"0",Total:TotalPrice};
        CompanyOrderList.push(value);
        createview(CompanyOrderList);
        $("#thiknessaccournstore").prop("disabled",true);
        $("#thiknessaccournstore").prop("selectedIndex",0);
        $("#companyaccournstore").prop("selectedIndex",0);
        $("#lengthaccournstore").prop("disabled",true);
        $("#lengthaccournstore").prop("selectedIndex",0);
        $("#quantityaccournstore").prop("disabled",true);
        $("#rateaccournstore").prop("disabled",true);
        $("#createaccournstore").prop("disabled",true);
        $("#rateaccournstore").val('');
        $("#quantityaccournstore").val('');
    }
    else if($("#companyaccournstore").find(":selected").text()!="মটকা"){
        $.when($.post("accountoperations.php",{func:"getTinTon",mili:$("#thiknessaccournstore").find(":selected").text(),foot:$("#lengthaccournstore").find(":selected").text()},"JSON").done(function(data){
        TotalPrice=(parseFloat($("#rateaccournstore").val())/parseFloat(data))*parseFloat($("#quantityaccournstore").val());
        TotalPrice=Math.round(TotalPrice);
        PiceToTon=parseFloat(parseFloat($("#quantityaccournstore").val())/parseFloat(data)).toFixed(3)
        value={id:Math.random().toString(36),Company:$("#companyaccournstore").find(":selected").text(),CompanyId:$("#companyaccournstore").find(":selected").val(),Thikness:$("#thiknessaccournstore").find(":selected").text(),ThiknessId:$("#thiknessaccournstore").find(":selected").val(),Length:$("#lengthaccournstore").find(":selected").text(),LengthId:$("#lengthaccournstore").find(":selected").val(),Quantity:$("#quantityaccournstore").val(),Rate:$("#rateaccournstore").val(),Ton:PiceToTon,Total:TotalPrice};
        CompanyOrderList.push(value);
    })).done(function(){
        createview(CompanyOrderList);
        $("#thiknessaccournstore").prop("disabled",true);
        $("#thiknessaccournstore").prop("selectedIndex",0);
        $("#companyaccournstore").prop("selectedIndex",0);
        $("#lengthaccournstore").prop("disabled",true);
        $("#lengthaccournstore").prop("selectedIndex",0);
        $("#quantityaccournstore").prop("disabled",true);
        $("#rateaccournstore").prop("disabled",true);
        $("#createaccournstore").prop("disabled",true);
        $("#rateaccournstore").val('');
        $("#quantityaccournstore").val('');
    })
    }
}
function createview(data){
    if(data.length<=0){
        $("#cardbodyresult").html(" <h3 class='mt-5 d-flex justify-content-center'>কোন তথ্য পাওয়া যায় নি।</h3>");
    }
    else{
        setTimeout(function(){
        Notiflix.Block.remove('#cardbodyresult');
        setTimeout(function(){
            body='';
            totalton=0;
            totaltaka=0;
            totlapice=0;
            header='<div class="card mt-2"><div class="card-header bg-dark-cyan text-white"><div class="row"><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>কোম্পানি</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>মিলি</strong></h6></div><div class="col-1 pt-1 d-flex justify-content-center"><h6><strong>ফুট</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>পিছ(টন)</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>দর</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>টাকা</strong></h6></div></div></div><div class="card-body">';
            for(var i=0;i<data.length;i++){
                body+='<div class="row mt-1"><div class="col-2 d-flex justify-content-center"><h6><strong>'+data[i].Company+'</strong></h6></div> <div class="col-2  d-flex justify-content-center"><h6><strong>'+data[i].Thikness+'</strong></h6></div><div class="col-1  d-flex justify-content-center"><h6><strong>'+data[i].Length+'</strong></h6></div><div class="col-2 d-flex justify-content-center"><h6><strong>'+data[i].Quantity.getDigitBanglaFromEnglish()+'('+data[i].Ton.getDigitBanglaFromEnglish()+')'+'</strong></h6></div><div class="col-2 d-flex justify-content-center"><h6><strong>'+(data[i].Rate).toString().getDigitBanglaFromEnglish()+'</strong></h6></div><div class="col-2  d-flex justify-content-center"><h6><strong>'+(data[i].Total).toString().getDigitBanglaFromEnglish()+'</strong></h6></div><div class="col-1 d-flex justify-content-center"><button class="btn btn-sm btn-outline-red" onclick="DeleteFormList('+"'"+data[i].id+"'"+')"><i class="fad fa-trash-alt"></i></button></div></div>';
            }
            for(var i=0;i<data.length;i++){
                totalton+=parseFloat(data[i].Ton);
                totaltaka+=parseInt(data[i].Total);
                totlapice+=parseInt(data[i].Quantity);
            }
            totlapicewithton=(totlapice+'('+totalton+')');
            footer='<div class="row alert-custom-blue py-1 pt-2 my-1"><div class="col-1 pt-1 d-flex justify-content-center my-1"><h6><strong></strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong></strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>মোট</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+totlapicewithton.getDigitBanglaFromEnglish()+'</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>মোট</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+totaltaka.toString().getDigitBanglaFromEnglish()+'</strong></h6></div></div></div><div class="card-footer"><div class="row"><div class="col-12 d-flex justify-content-center"><button id="addcompanystock" class="btn btn-outline-dark-cyan"> <i class="fad fa-check mr-1"></i> সম্পন্ন</button></div></div></div></div>';
            $("#cardbodyresult").html(header+body+footer);
        },200)
    }, 3000);
    }
}
function DeleteFormList(id){
    data=CompanyOrderList.find(s=>s.id === id )
    Notiflix.Confirm.show("নিশ্চিত করুন",'আপনি কি <span class="text-custom-orange h5">&nbsp;'+data.Company+'</span>&nbsp; কোম্পানির '+data.Thikness+' মিলির '+data.Length+' ফুট এর '+data.Quantity.getDigitBanglaFromEnglish()+'('+data.Ton.getDigitBanglaFromEnglish()+')'+' বিবরন মুছবেন?','হ্যাঁ','না',function(){
        Notiflix.Block.hourglass('#cardbodyresult', 'প্রসেসিং...');
        var enumerable = Enumerable.From(CompanyOrderList);
        var dictionary = enumerable.ToDictionary();
        dictionary.remove(enumerable.Single(s=>s.id === id ));
        CompanyOrderList=dictionary.ToEnumerable().Select(s => s.Key).ToArray();
        createview(CompanyOrderList);
      })
}
$(document).on("click","button#addcompanystock",function(){
    Notiflix.Loading.hourglass('প্রসেসিং...');
    totaltaka=0;
    totlapice=0;
    totalton=0;
    for(var i=0;i<CompanyOrderList.length;i++){
        totaltaka+=parseInt(CompanyOrderList[i].Total);
        totlapice+=parseInt(CompanyOrderList[i].Quantity);
        totalton+=parseFloat(CompanyOrderList[i].Ton);
    }
    $.post("accountoperations.php",{func:"CteateNewCompanyMemo",TotalPrice:totaltaka,TotalPice:totlapice,TotalTon:totalton},"JSON").done(function(data){
        dt=JSON.parse(data);
        if(dt.Stusas<1){
            Notiflix.Notify.failure("অনুরোধ অসম্পুর্ন")
        }
        else if(dt.Stusas==1){
            submittodatabase(CompanyOrderList,dt.Id);
        }

    })
})

function submittodatabase(data,id){
    $.when($.each(data,function(){
        var data1=this;
        $.post("accountoperations.php",{func:"AddNewCompanyMemoDetails",CM_Id:id,CompanyId:data1.CompanyId,ThiknessId:data1.ThiknessId,LengthId:data1.LengthId,Quantity:data1.Quantity,Rate:data1.Rate},"JSON").done(function(dt){
            if(dt>=1){
                $.post("Companyandmili.php",{func:"UpdateStock",footid:data1.LengthId,stock:data1.Quantity},"JSON").done(function(data){
                    if(data==0){
                        Notiflix.Notify.failure("পিছ স্টকে যোগ হয়নি");
                    }
                })
            }
            else if(dt<1){
                Notiflix.Notify.failure("অনুরোধ অসম্পুর্ন");
            }
        })
    })).done(function(){
        setTimeout(function(){
            Notiflix.Loading.remove();
            $("#thiknessaccournstore").prop("disabled",true);
            $("#thiknessaccournstore").prop("selectedIndex",0);
            $("#companyaccournstore").prop("selectedIndex",0);
            $("#lengthaccournstore").prop("disabled",true);
            $("#lengthaccournstore").prop("selectedIndex",0);
            $("#quantityaccournstore").prop("disabled",true);
            $("#rateaccournstore").prop("disabled",true);
            $("#createaccournstore").prop("disabled",true);
            $("#rateaccournstore").val('');
            $("#quantityaccournstore").val('');
            setTimeout(function(){
                Notiflix.Notify.success("অনুরোধ সম্পুর্ন");
                CompanyOrderList=Array();
                createview(CompanyOrderList);
            },300)
        },3000)
    })
}
$(document).on("click","a#seestatement",function(){
    bootbox.dialog({
        title:"<h2 class='text-custom-indigo'>শুরুর তারিখ<h2>",
        message:'<div class="col-12"><div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><i class="fad fa-calendar-alt"></div></i></div><input type="text" title="তারিখ বাছুন" data-toggle="tooltip" class="form-control" name="datepickerstatement" id="datepickerstatement" readonly></div></div>',
        onEscape:true,
        backdrop:true,
        onShow:function(){
            $("#datepickerstatement").tooltip(function(){
                placement : 'right'
                    })
            $("#datepickerstatement").datepicker({
                format: "yyyy-mm-dd",
                endDate: "+today",
                todayHighlight: true,
                autoclose: true,
                daysOfWeekDisabled: "5",
                daysOfWeekHighlighted:"5"
            });
        },
        buttons:{
            done:{
                label:"<i class='fad fa-check-circle mr-2'></i>সম্পন্ন",
                className:"btn-outline-custom-indigo",
                callback:function(){
                    if($("#datepickerstatement").val()!=''|| $("#datepickerstatement").val()!=null){
                        $.redirect("statement.city",{date:$("#datepickerstatement").val(),Id:$("#customershopname").val()})
                    }
                    else{
                        $("#datepickerstatement").focus();
                    }
                }
            },
            notdone:{
                label:"<i class='fad fa-times-octagon mr-2'></i>বাতিল",
                className:"btn-outline-red",
                callback:function(){
                    
                }
                
            }
        },
    });
})
$(document).on("click","button#clearviewaccountstore",function(){
    $("#datepickerstock").val('');
})
$(document).on("click","button#viewaccountstore",function(){
    if($("#datepickerstock").val()=='' || $("#datepickerstock").val()==null){
        $("#datepickerstock").addClass("error-message-report");
        $("#datepickerstock").focus();
        setTimeout(function(){
            $("#datepickerstock").removeClass("error-message-report");
        },5000)
    }
    else {
        $("#datepickerstock").removeClass("error-message-report");
        Notiflix.Block.hourglass('#cardbodyresult', 'প্রসেসিং...');
        $.when($.post("accountoperations.php",{func:"SeeCompanyMemo",date:$("#datepickerstock").val()}).done(function(data){
            dt=JSON.parse(data);
            if(dt.length===0){
                setTimeout(function(){
        $("#cardbodyresult").html('');
        Notiflix.Block.remove('#cardbodyresult');
        setTimeout(function(){
            $("#cardbodyresult").html('<h3 class="mt-5 d-flex justify-content-center">কোন তথ্য পাওয়া যায় নি।</h3>');
        },300)
    },3000)
            }else{
                DisplayMemos(dt);
            }
        })).done(function(){})
    }
})
function DisplayMemos(data){
    header='<div class="card mt-2"><div class="card-header bg-custom-blue text-white"><div class="row"><div class="col-3 pt-1 d-flex justify-content-center">তারিখ</div><div class="col-3 pt-1 d-flex justify-content-center">পিছ(টন)</div><div class="col-3 pt-1 d-flex justify-content-center">টাকা</div><div class="col-3 pt-1 d-flex justify-content-center"></div></div></div><div class="card-body">';
    body='';
    $.each(data,function(){
        dt=this;
        splite=(dt.Date).toString().split("-");
        formatdate=splite[2]+'/'+splite[1]+'/'+splite[0]
        body+='<div class="row my-1"><div class="col-3 pt-1 d-flex justify-content-center">'+formatdate.getDigitBanglaFromEnglish()+'</div><div class="col-3 pt-1 d-flex justify-content-center">'+(dt.QuanititinPice).toString().getDigitBanglaFromEnglish()+'('+(dt.QuantityInTon).toString().getDigitBanglaFromEnglish()+')</div><div class="col-3 pt-1 d-flex justify-content-center">'+(dt.TotalPrice).toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center"><button class="btn btn-outline-custom-blue" onclick="companyorderdetails('+"'"+dt.CM_Id+"'"+')"><i class=""></i> বিবরন</button></div></div>'
    })
    footer='</div></div>';
    setTimeout(function(){
        $("#cardbodyresult").html('');
        Notiflix.Block.remove('#cardbodyresult');
        setTimeout(function(){
            $("#cardbodyresult").html(header+body+footer);
        },300)
    },3000)
}
function companyorderdetails(id){
    Notiflix.Loading.hourglass('প্রসেসিং...');
    $.when($.post("accountoperations.php",{func:"companyorderdetails",Id:id}).done(function(data){
        dt=JSON.parse(data);
        CompanyOrderList=dt;
    })).done(function(){
        setTimeout(function(){
            Notiflix.Loading.remove();
            setTimeout(function(){
                header='<div class="card mt-2"><div class="card-header bg-dark-cyan text-white"><div class="row"><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>কোম্পানি</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>মিলি</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>ফুট</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>পিছ(টন)</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>দর</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>টাকা</strong></h6></div></div></div><div class="card-body">';
                body='';
                $.each(CompanyOrderList,function(){
                    list=this;
                    body+='<div class="row"><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+list.Company+'</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+list.Thikness.getDigitBanglaFromEnglish()+'</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+list.Length+'</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+list.Quantity.toString().getDigitBanglaFromEnglish()+'('+list.Ton.getDigitBanglaFromEnglish()+')</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+list.Rate.toString().getDigitBanglaFromEnglish()+'</strong></h6></div><div class="col-2 pt-1 d-flex justify-content-center"><h6><strong>'+(list.Total).toString().getDigitBanglaFromEnglish()+'</strong></h6></div></div>'
                })
                footer='</div></div>';
                $("#orderdetails").html(header+body+footer);
            },300)
        },3000)
    })
}
/*


*/
</script>
</body>
</html>
<?php }?>

