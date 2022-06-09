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
    <title>স্টক</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
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
<body  onload="Loaded()">
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
                    <a class="nav-link stockactive" href="">স্টক</a>
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
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-info justify-content-center">
                <h1 class="d-flex justify-content-center text-white pt-2">
                    স্টক 
                </h1>
            </div>
            <div class="card-body py-5">
                <div class="row">
                    <div class="col-xl-7 col-sm-12 mb-2 mt-3 col-lg-7">
                        <div class="card">
                            <div class="card-header bg-violate">
                                <h1 class="d-flex justify-content-center text-white pt-2">
                                    স্টক আপডেট করুন
                                </h1>
                            </div>
                            <div class="card-body">
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            কোম্পানি
                                        </span>
                                    </div>
                                    <select name="company" id="inputcompanyname" class="form-control">
                                    </select>
                                </div>
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            মিলি
                                        </span>
                                    </div>
                                    <select name="productthikness" id="inputproductthikness" class="form-control" disabled>
                                        <option selected disabled>মিলি</option>
                                    </select>
                                </div>
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ফুট
                                        </span>
                                    </div>
                                    <select name="productlength" id="inputproductlength" class="form-control" disabled>
                                    <option selected disabled>ফুট</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            যোগ করুন
                                        </span>
                                    </div>
                                    <input type="number" name="productquantity" id="productquantity" placeholder="পিছ" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-danger ml-3" id="clearstockinput"><i class="far fa-trash-alt"></i>  মুছুন</button>
                                    <button type="button" class="btn btn-outline-violate ml-3" id="updatestock" disabled><i class="fal fa-pen-nib"></i> আপডেট করুন</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-pink btn-block" id="addmodalshowing"><i class="far fa-plus-circle"></i> নতুন যুক্ত করুন</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-custom-green">
                                <h1 class="d-flex justify-content-center text-white pt-2">
                                    বর্তমান স্টক দেখুন
                                </h1>
                            </div>
                            <div class="card-body">
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            কোম্পানি
                                        </span>
                                    </div>
                                    <select name="company" id="srccompanyname" class="form-control">
                                    </select>
                                </div>
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            মিলি
                                        </span>
                                    </div>
                                    <select name="productthikness" id="srcproductthikness" class="form-control" disabled>
                                        <option selected disabled>মিলি</option>
                                    </select>
                                </div>
                                <div class="input-group py-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ফুট
                                        </span>
                                    </div>
                                    <select name="productlength" id="srcproductlength" class="form-control" disabled>
                                        <option selected disabled>ফুট</option>
                                    </select>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10 d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-danger mt-3 mr-2 ml-3" id="clearsrcinput"><i class="far fa-trash-alt "></i>  মুছুন</button>
                                        <button type="button" class="btn btn-outline-custom-green mt-3 mr-2 ml-3" id="srcproductquantity" disabled> <i class="far fa-file "></i> দেখুন</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade animate__zoomIn" id="addmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs">
                        <li class= "nav-item"><a class= "nav-link" id="addcompanytab" data-toggle="tab" href="#addcompany">কোম্পানি যুক্ত করুন</a></li>
                        <li class="nav-item"><a class=" nav-link" id="addmilitab" data-toggle="tab" href="#addmili">মিলি যুক্ত করুন</a></li>
                        <li class="nav-item"><a class=" nav-link" id="addfoottab" data-toggle="tab" href="#addfoot">ফুট যুক্ত করুন</a></li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="tct" class="tab-pane active">
                            <h3 class="d-flex justify-content-center" >বাছাই করুন</h3>
                        </div>
                        <div id="addcompany" class="tab-pane fade animate__zoomIn">
                            <div class="input-group py-2 mb-2">
                                <div class="input-group-prepend"><span class="input-group-text">কোম্পানি নাম</span></div>
                                <input type="text" name="addcompanyname" id="addcompanyname" class="form-control" placeholder="কোম্পানি নাম">
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-violate" id="addcompanyconfirm"><i class="far fa-plus-circle"></i> নতুন যুক্ত করুন</button>
                                </div>
                            </div>
                        </div>
                        <div id="addmili" class="tab-pane fade animate__zoomIn">
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        কোম্পানি
                                    </span>
                                </div>
                                <select name="company" id="srccompanynameforadd" class="form-control">
                                </select>
                            </div>
                            <div class="input-group my-2 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        যোগ করুন
                                    </span>
                                </div>
                                <input type="text" name="productthikness" id="addproductthikness" placeholder="মিলি" class="form-control" disabled>
                            </div>
                            <div class="row">
                                <div class="col-12  d-flex justify-content-end mt-2" >
                                    <button type="button" class="btn btn-violate" id="addmiliconfirm" disabled><i class="far fa-plus-circle"></i> নতুন যুক্ত করুন</button>
                                </div>
                            </div>
                        </div>
                        <div id="addfoot" class="tab-pane fade animate__zoomIn">
                            <div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        কোম্পানি
                                    </span>
                                </div>
                                <select name="company" id="srccompanynameforaddfoot" class="form-control">
                                </select>
                            </div><div class="input-group py-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        মিলি
                                    </span>
                                </div>
                                <select name="company" id="srcmiliforaddfoot" class="form-control" disabled>
                                    
                                </select>
                            </div>
                            <div class="input-group my-2 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        যোগ করুন
                                    </span>
                                </div>
                                <select name="productthikness" id="addproductlength" disabled="disabled" class="form-control">
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12  d-flex justify-content-end mt-2" >
                                    <button type="button" class="btn btn-violate" id="addfootconfirm" disabled><i class="far fa-plus-circle"></i> নতুন যুক্ত করুন</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/bootbox.all.min.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function(){
            $("#productquantity").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                }
            });
            $("#addproductthikness").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                }
            });
            $("#addproductlength").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                }
            });
            
            $("#inputcompanyname").change(function(){
                $("#inputproductlength").prop('disabled', true);
                $("#inputproductlength").prop('selectedIndex',0);
                $("#productquantity").prop('disabled', true);
                $("#updatestock").prop('disabled', true);
                if($("#inputcompanyname").find(":selected").text()!='কোম্পানি'){
                    $("#inputproductthikness").prop('disabled', false)
                    $("#inputproductthikness").prop('selectedIndex',0);
                    $.ajax({
                        url:"stockoperations.php",
                        method:"POST",
                        data:{func:"loadmili",companyid:$("#inputcompanyname").find(":selected").val()},
                        dataType:"HTML",
                        success:function(data){
                            $("#inputproductthikness").html(data);
                        }
                    })
                }
            });
            
            $("#inputproductthikness").change(function(){
                $("#productquantity").prop('disabled', true);
                $("#inputproductlength").prop('disabled', true);
                $("#updatestock").prop('disabled', true);
                $("#productquantity").val('');
                
                if($("#inputproductthikness").find(":selected").text()!='মিলি'){
                    $("#inputproductlength").prop('disabled', false);
                    $.ajax({
                        url:"stockoperations.php",
                        method:"POST",
                        data:{func:"loadfoot",miliid:$("#inputproductthikness").find(":selected").val()},
                        dataType:"HTML",
                        success:function(data){
                            $("#inputproductlength").html(data);
                        }
                    })
                }
            });

            $("#inputproductlength").change(function(){
                $("#productquantity").prop('disabled', true);
                $("#updatestock").prop('disabled', true);
                if($("#inputproductlength").find(":selected").text()!='ফুট'){
                    $("#productquantity").prop('disabled', false);
                    $("#productquantity").val('');
                    $("#updatestock").prop('disabled', false);
                }
            });

        });
        $(document).on("click","button#updatestock",function () { 
            var qtt=0;
            if($("#productquantity").val()!='')
            {
                qtt=parseInt($("#productquantity").val());
                Notiflix.Confirm.show("নিশ্চিত করুন",'<p class="h6"> <strong class="h5 text-violate" >'+$("#inputcompanyname").find(":selected").text()+'</strong> কোম্পানির <strong class="h5 text-violate">'+$("#inputproductthikness").find(":selected").text()+'</strong> মিলির <strong class="h5 text-violate" >'+$("#inputproductlength").find(":selected").text()+'</strong>  ফুটের <strong class="h5 text-violate"  >'+qtt.toString().getDigitBanglaFromEnglish()+'</strong>  পিছ যোগ করা হচ্ছে </p> <p class="h3 d-flex justify-content-center text-pink"> আপনি কি নিশ্চিত? </p>',"হ্যাঁ","না",function(){
                    Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
            $.when($.post("Companyandmili.php",{func:"UpdateStock",footid:$("#inputproductlength").find(":selected").val(),stock:$("#productquantity").val()},"JSON").done(function(data){
                if(data==1){
                        setTimeout(function(){
                            Notiflix.Loading.remove();
                            setTimeout(function(){
                                $("#updatemodal").modal("hide");
                        $("#inputproductlength").prop('disabled', true);
                        $("#inputproductlength").prop('selectedIndex',0);
                        $("#inputcompanyname").prop('selectedIndex',0);
                        $("#productquantity").prop('disabled', true);
                        $("#updatestock").prop('disabled', true);
                        $("#inputproductthikness").prop('disabled', true)
                        $("#inputproductthikness").prop('selectedIndex',0);
                        $("#productquantity").val('');
                        $("#srcproductlength").prop('disabled', true);
                        $("#srcproductlength").prop('selectedIndex',0);
                        $("#srccompanyname").prop('selectedIndex',0);
                        $("#srcproductthikness").prop('disabled', true);
                        $("#srcproductthikness").prop('selectedIndex',0);
                        $("#srcproductquantity").prop('disabled', true);
                        Notiflix.Notify.success("পিছ যোগ হয়েছে");
                            },300)
                        },3000)

                    }
                    else if(data==0){
                        Notiflix.Notify.failure("পিছ যোগ হয়নি");
                    }
                    else{
                        alert(data);
                    }
            })).done(function(){})
                },function(){
                    Notiflix.Notify.failure("পিছ যোগ হয়নি");
                })
            }
            else
            {
                $("#productquantity").focus();
            }
             });
             $(document).on("click","button#clearstockinput",function(){
                $("#inputproductlength").prop('disabled', true);
                $("#inputproductlength").prop('selectedIndex',0);
                $("#inputcompanyname").prop('selectedIndex',0);
                $("#productquantity").prop('disabled', true);
                $("#updatestock").prop('disabled', true);
                $("#inputproductthikness").prop('disabled', true)
                $("#inputproductthikness").prop('selectedIndex',0);
                $("#productquantity").val('');
             });
             $(document).on("click","button#clearsrcinput",function(){
                $("#srcproductlength").prop('disabled', true);
                $("#srcproductlength").prop('selectedIndex',0);
                $("#srccompanyname").prop('selectedIndex',0);
                $("#srcproductthikness").prop('disabled', true);
                $("#srcproductthikness").prop('selectedIndex',0);
                $("#srcproductquantity").prop('disabled', true);
             });
             $(document).ready(function(){
                 $("#srccompanyname").change(function(){
                    $("#srcproductthikness").prop('disabled', true)
                    $("#srcproductthikness").prop('selectedIndex',0);
                    $("#srcproductlength").prop('disabled', true);
                    $("#srcproductquantity").prop('disabled', true);
                    $("#srcproductlength").prop('selectedIndex',0);
                     if($("#srccompanyname").find(":selected").text()!="কোম্পানি"){
                        $("#srcproductthikness").prop('disabled', false);
                        $("#srcproductthikness").prop('selectedIndex',0);
                        $.ajax({
                        url:"stockoperations.php",
                        method:"POST",
                        data:{func:"loadmili",companyid:$("#srccompanyname").find(":selected").val()},
                        dataType:"HTML",
                        success:function(data){
                            $("#srcproductthikness").html(data);
                        }
                    })
                     }
                 });
                 $("#srcproductthikness").change(function(){
                    $("#srcproductlength").prop('disabled', true);
                    $("#srcproductquantity").prop('disabled', true);
                    $("#srcproductlength").prop('selectedIndex',0);
                     if($("#srcproductthikness").find(":selected").text()!="মিলি"){
                        $("#srcproductlength").prop('disabled', false)
                        $("#srcproductlength").prop('selectedIndex',0);
                        $.ajax({
                        url:"stockoperations.php",
                        method:"POST",
                        data:{func:"loadfoot",miliid:$("#srcproductthikness").find(":selected").val()},
                        dataType:"HTML",
                        success:function(data){
                            $("#srcproductlength").html(data);
                        }
                    })
                     }
                 });
                 $("#srcproductlength").change(function(){
                    $("#srcproductquantity").prop('disabled', true);
                     if($("#srcproductlength").find(":selected").text()!="ফুট"){
                        $("#srcproductquantity").prop('disabled', false);
                     }
                 });
                 $("#srccompanynameforadd").change(function(){
                    $("#srcproductquantity").prop('disabled', true);
                     if($("#srcproductlength").find(":selected").text()!="কোম্পানি"){
                        $("#addproductthikness").prop('disabled', false);
                        $("#addmiliconfirm").prop('disabled', false);
                     }
                 });
             });
             $(document).on("click","button#addmiliconfirm",function () { 
            var qtt=0;
            if($("#addproductthikness").val()!='')
            {
                Notiflix.Confirm.show("নিশ্চিত করুন",'<p class="h6"> <strong class="h5 text-violate">'+$("#srccompanynameforadd").find(":selected").text()+'</strong> এর <strong class="h5 text-violate">'+(parseInt($("#addproductthikness").val())).toString().getDigitBanglaFromEnglish()+'</strong> মিলি হিসেবে যোগ করা হচ্ছে </p><p class="h3 d-flex justify-content-center text-pink"> আপনি কি নিশ্চিত? </p>',"হ্যাঁ","না",function(){
                    var company=$("#srccompanynameforadd").find(":selected").val();
            var mili=(parseInt($("#addproductthikness").val())).toString().getDigitBanglaFromEnglish();
            if($("#srccompanynameforadd").find(":selected").text()!="মটকা" &&(parseInt($("#addproductthikness").val())==120 || parseInt($("#addproductthikness").val())==12)){
                r=confirm("এটা কী চেরী ?");
                if(r==true){
                    mili+=" চেরী";
                }
                else if(r==false){
                    mili+=" মোটা";
                }
            }
                $.post("Companyandmili.php",{func:"AddMili",companyid:company,miliinfo:mili},"JSON").done(function(data){
                        if(data==1){
                        $("#addmodal").modal("hide");
                        $("#inputcompanyname").prop('selectedIndex',0);
                        $("#inputproductthikness").html("<option selected disabled>মিলি</option>");
                        $("#inputproductlength").html("<option selected disabled>ফুট</option>");
                        $("#srcproductthikness").prop("disabled",true);
                        $("#inputproductthikness").prop("disabled",true);
                        $("#productquantity").prop("disabled",true);
                        $("#productquantity").val('');
                        Notiflix.Notify.success("মিলি যুক্ত হয়েছে");
                    }
                    else{
                        if(data>1){
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.warning("আগে থেকেই আছে");
                        }
                        else if(data==0){
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.failure("মিলি যুক্ত হয়নি");
                        }
                    }
                    })

                })
            }
            else
            {
                $("#addproductthikness").focus();
            }
             });
             $(document).on("click","button#addcompanyconfirm",function () { 
            if($("#addcompanyname").val()!='')
            {
                Notiflix.Confirm.show("নিশ্চিত করুন",'<p class="h6"> <strong class="h5 text-violate">'+$("#addcompanyname").val().getDigitBanglaFromEnglish()+'</strong> কোম্পানির নাম হিসেবে যোগ করা হচ্ছে </p><p class="h3 d-flex justify-content-center text-pink"> আপনি কি নিশ্চিত? </p>',"হ্যাঁ","না",function(){
                    $.post("Companyandmili.php",{companyname:$("#addcompanyname").val(),func:"AddCompany"},"JSON").done(function(data){
                        if(data==1){
                        $("#addmodal").modal("hide");
                        Notiflix.Notify.success("কোম্পানি যুক্ত হয়েছে");
                        $.post("stockoperations.php",{func:"loadCompany"},"HTML").done(function(data){
                            $("#inputcompanyname").html(data);
                                $("#srccompanyname").html(data);
                                $("#srcproductthikness").html("<option selected disabled>মিলি</option>");
                                $("#inputproductthikness").html("<option selected disabled>মিলি</option>");
                                $("#inputproductlength").html("<option selected disabled>ফুট</option>");
                                $("#srcproductlength").html("<option selected disabled>ফুট</option>");
                                $("#srcproductthikness").prop("disabled",true);
                                $("#inputproductthikness").prop("disabled",true);
                                $("#inputproductlength").prop("disabled",true);
                                $("#srcproductlength").prop("disabled",true);
                                $("#productquantity").prop("disabled",true);
                                $("#productquantity").val('');
                        })
                    }
                    else{
                        if(data==99){
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.warning("আগে থেকেই আছে");

                        }
                        else if(data==0){
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.failure("কোম্পানি যুক্ত হয়নি");
                        }
                    }
                    })
                })
            }
            else
            {
                $("#addcompanyname").focus();
            }
             });
             $(document).on("click","button#addmodalshowing",function () { 
                 $("#addcompanyname").val('');
                 $("#addproductthikness").val('');
                 $("#srccompanynameforadd").prop('selectedIndex',0);
                 $("#addproductthikness").prop('disabled', true);
                 $("#addmiliconfirm").prop('disabled', true);
                 $("#addmodal").modal({show:true});
             });
             $(document).on("click","a#addcompanytab",function () { 
                 $("#addcompanyname").val('');
                 $("#addproductthikness").val('');
                 $("#srccompanynameforadd").prop('selectedIndex',0);
                 $("#addproductthikness").prop('disabled', true);
                 $("#addmiliconfirm").prop('disabled', true);
                 $("#addmodal").modal({show:true});
             });
             $(document).on("click","a#addmilitab",function () { 
                 $("#addcompanyname").val('');
                 $("#addproductthikness").val('');
                 $("#srccompanynameforadd").prop('selectedIndex',0);
                 $("#addproductthikness").prop('disabled', true);
                 $("#addmiliconfirm").prop('disabled', true);
                 $("#addmodal").modal({show:true});
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
        $(document).on("click","button#addmodalshowing",function(){
            $.ajax({
                url:"stockoperations.php",
                method:"POST",
                data:{func:"loadCompany"},
                dataType:"HTML",
                success:function(data){
                    $("#srccompanynameforadd").html(data);
                    $("#srccompanynameforaddfoot").html(data);
                    $("#srcmiliforaddfoot").html("<option selected disabled>মিলি</option>");
                    $("#addproductlength").html("<option selected disabled>ফুট</option>");

                }
            })
        })
        $(document).ready(function(){
            $.ajax({
                url:"stockoperations.php",
                method:"POST",
                data:{func:"loadCompany"},
                dataType:"HTML",
                success:function(data){
                    $("#inputcompanyname").html(data);
                    $("#srccompanyname").html(data);
                }
            })
        })
        $(document).ready(function(){
            $("#srccompanynameforaddfoot").change(function(){
                $("#srcmiliforaddfoot").prop('disabled', true);
                $("#addproductlength").prop('disabled', true);
                $("#addproductlength").val('');
                $("#srcmiliforaddfoot").prop('selectedIndex',0);
                $("#addfootconfirm").prop("disabled",true);
            if($("#srccompanynameforaddfoot").find(":selected").text()!="কোম্পানি"){
                $("#srcmiliforaddfoot").prop('disabled', false);
                $("#srcmiliforaddfoot").prop('selectedIndex',0);
                $("#addproductlength").prop('disabled', true);
                $("#addproductlength").html("<option selected disabled>ফুট</option>");
                $.ajax({
                url:"stockoperations.php",
                method:"POST",
                data:{func:"loadmili",companyid:$("#srccompanynameforaddfoot").find(":selected").val()},
                dataType:"HTML",
                success:function(data){
                    $("#srcmiliforaddfoot").html(data);
                }
            })
                }
            })
        })
        $(document).ready(function(){
            $("#srcmiliforaddfoot").change(function(){
                $("#addproductlength").prop("disabled",true);
                $("#addproductlength").val('');
                $("#addfootconfirm").prop("disabled",true);
                if($("#srcmiliforaddfoot").find(":selected").text()!="মিলি"){
                    $("#addproductlength").prop("disabled",false);
                    var data=null;
                    if($("#srccompanynameforaddfoot").find(":selected").text()=="মটকা")
                    {
                        data="<option selected disabled>ফুট</option><option value='৬'>৬</option><option value='১২'>১২</option>"
                    }
                    else if($("#srccompanynameforaddfoot").find(":selected").text()!="মটকা"){
                        data="<option selected disabled>ফুট</option>";
                        for(i=6;i<11;i++)
                        {
                            data+="<option value='"+i.toString().getDigitBanglaFromEnglish()+"'>"+i.toString().getDigitBanglaFromEnglish()+"</option>";
                        }
                    }
                    $("#addproductlength").html(data);

                }
            })
            $("#addproductlength").change(function(){
                $("#addfootconfirm").prop("disabled",true);
                if($("#addproductlength").find(":selected").text()!="ফুট"){
                    $("#addfootconfirm").prop("disabled",false);
                }
            })
            $(document).on("click","button#addfootconfirm",function(){
                Notiflix.Confirm.show("নিশ্চিত করুন","আপনি কি <span class='text-primary h4'>"+$("#srccompanynameforaddfoot").find(":selected").text()+"</span> কোম্পানির  <span class='text-primary h4'>"+$("#srcmiliforaddfoot").find(":selected").text()+"</span> মিলির  <span class='text-primary h4'>"+$("#addproductlength").find(":selected").text()+"</span> ফুট যোগ করতে চান? ","হ্যাঁ","না",function(){
                    
                    mili=$("#srcmiliforaddfoot").find(":selected").val();
                    foot=$("#addproductlength").find(":selected").text();
                    $.post("Companyandmili.php",{func:"AddFoot",miliid:mili,footinfo:foot},"JSON").done(function(data){
                        if(data==1){
                        $("#footadd").modal("hide");
                        $("#addmodal").modal("hide");
                        $("#inputcompanyname").prop('selectedIndex',0);
                        $("#inputproductthikness").html("<option selected disabled>মিলি</option>");
                        $("#inputproductlength").html("<option selected disabled>ফুট</option>");
                        $("#srcproductthikness").prop("disabled",true);
                        $("#inputproductthikness").prop("disabled",true);
                        $("#productquantity").prop("disabled",true);
                        $("#productquantity").val('');
                        Notiflix.Notify.success("ফুট যুক্ত হয়েছে");
                    }
                    else{
                        if(data>1){
                            $("#footadd").modal("hide");
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.warning("আগে থেকেই আছে");
                        }
                        else if(data==0){
                            $("#footadd").modal("hide");
                        $("#addmodal").modal("hide");
                            Notiflix.Notify.failure("ফুট যুক্ত হয়নি");
                        }
                    }
                    })
                })
            })
        })
        $(document).on("click","button#srcproductquantity",function(){
            Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
            $.post("stockoperations.php",{func:"ViewData",footid:$("#srcproductlength").find(":selected").val()},"JSON").done(function(data){
                if(!data){
                        setTimeout(function(){
                            Notiflix.Loading.remove()
                            setTimeout(function(){
                        Notiflix.Report.info("স্টক বিবরণ","<h4 class='p-5 d-flex justify-content-center'><strong class='h3 text-red'>কোন তথ্য পাওয়া যায় নি</strong></h4>","সম্পন্ন",function(){
                            $("#srcproductlength").prop('disabled', true);
                            $("#srcproductlength").prop('selectedIndex',0);
                            $("#srccompanyname").prop('selectedIndex',0);
                            $("#srcproductthikness").prop('disabled', true);
                            $("#srcproductthikness").prop('selectedIndex',0);
                            $("#srcproductquantity").prop('disabled', true);
                            $("#inputproductlength").prop('disabled', true);
                            $("#inputproductlength").prop('selectedIndex',0);
                            $("#inputcompanyname").prop('selectedIndex',0);
                            $("#productquantity").prop('disabled', true);
                            $("#updatestock").prop('disabled', true);
                            $("#inputproductthikness").prop('disabled', true)
                            $("#inputproductthikness").prop('selectedIndex',0);
                            $("#productquantity").val('');
                        })
                            },300)
                        },3000)
                    }
                    else{
                        setTimeout(function(){
                            Notiflix.Loading.remove()
                            setTimeout(function(){
                                var title=null;
                        if($("#srcproductlength").find(":selected").text()=='৬'){
                        if(parseInt(data)%12==0){
                            title=parseInt(parseInt(data)/12)+" বান";
                        }
                        else{
                            title=parseInt(parseInt(data)/12)+" বান "+ (parseInt(data)%12)+ " পিছ";
                        }
                    }
                    else if($("#srcproductlength").find(":selected").text()=='৭'){
                        if(parseInt(data)%10==0){
                            title=parseInt(parseInt(data)/10)+" বান";
                        }
                        else{
                            title=parseInt(parseInt(data)/10)+" বান "+ (parseInt(data)%10)+ " পিছ";
                        }
                    }
                    else if($("#srcproductlength").find(":selected").text()=='৮'){
                        if(parseInt(data)%9==0){
                            title=parseInt(parseInt(data)/9)+" বান";
                        }
                        else{
                            title=parseInt(parseInt(data)/9)+" বান "+ (parseInt(data)%9)+ " পিছ";
                        }
                    }
                    else if($("#srcproductlength").find(":selected").text()=='৯'){
                        if(parseInt(data)%8==0){
                            title=parseInt(parseInt(data)/8)+" বান";
                        }
                        else{
                            title=parseInt(parseInt(data)/8)+" বান "+ (parseInt(data)%8)+ " পিছ";
                        }
                    }
                    else if($("#srcproductlength").find(":selected").text()=='১০'){
                        if(parseInt(data)%7==0){
                            title=parseInt(parseInt(data)/7)+" বান";
                        }
                        else{
                            title=parseInt(parseInt(data)/7)+" বান "+ (parseInt(data)%7)+ " পিছ";
                        }
                    }
                    if($("#srccompanyname").find(":selected").text()!="মটকা"){
                        val="("+title.getDigitBanglaFromEnglish()+")";
                    }
                    else{
                        val="";
                    }
                        Notiflix.Report.info("স্টক বিবরণ","<h4 class='p-5 d-flex justify-content-center'><strong class='h3 text-custom-green'>"+$("#srccompanyname").find(":selected").text()+"</strong>&nbsp;&nbsp;কোম্পানির&nbsp;&nbsp;<strong class='h3 text-custom-green'>"+$("#srcproductthikness").find(":selected").text()+" </strong>&nbsp;&nbsp;মিলির&nbsp;&nbsp;<strong class='h3 text-custom-green'> "+$("#srcproductlength").find(":selected").text()+"</strong>&nbsp;&nbsp;ফুটের&nbsp;&nbsp;<strong class='h3 text-custom-green'> "+parseInt(data).toString().getDigitBanglaFromEnglish()+val+" </strong>&nbsp;&nbsp;পিছ অবশিষ্ট রয়েছে </h4>","সম্পন্ন",function(){
                            $("#srcproductlength").prop('disabled', true);
                            $("#srcproductlength").prop('selectedIndex',0);
                            $("#srccompanyname").prop('selectedIndex',0);
                            $("#srcproductthikness").prop('disabled', true);
                            $("#srcproductthikness").prop('selectedIndex',0);
                            $("#srcproductquantity").prop('disabled', true);
                            $("#inputproductlength").prop('disabled', true);
                            $("#inputproductlength").prop('selectedIndex',0);
                            $("#inputcompanyname").prop('selectedIndex',0);
                            $("#productquantity").prop('disabled', true);
                            $("#updatestock").prop('disabled', true);
                            $("#inputproductthikness").prop('disabled', true)
                            $("#inputproductthikness").prop('selectedIndex',0);
                            $("#productquantity").val('');
                        })
                        
                            },300)
                        },3000)
                       
                    }
            })
        })
    </script>
</body>
</html>
<?php }?>