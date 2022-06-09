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
    <title>অসমাপ্ত ম্যামো</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="#" class="dropdown-item draftactive">অসমাপ্ত ম্যামো</a>
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
    <div class="d-flex justify-content-center">
        <div class="row">
                <div class="container justify-content-center mt-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mx-auto bg-white justify-content-center">
                            <div class="card" id="formdiv">
                                <div class="card-header justify-content-center bg-warning ">
                                    <h2 class="d-flex text-white justify-content-center mt-1">অসমাপ্ত ম্যামো দেখুন</h2>
                                </div>
                                <div class="col-md-10 col-sm-12 m-auto mt-2">
                                    <div class="input-group mt-5 mb-3">
                                        <select name="newmemo" id="newmemo" class="form-control">
                                            <option selected disabled>দোকানের তালিকা</option>
                                        </select>
                                        <div class="input-group-append" id="securebtn">
                                            <button class="btn btn-custom-orange " id="seedraftlist">ম্যামো দেখুন</button>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" class=" form-inline justify-content-center">
                                    <div class="form-group my-4 mx-2">
                                        <input id="itemquantity" class="form-control" type="text" name="itemquantity" placeholder="পিছ">
                                    </div>
                                    <div class="form-group my-4 mx-2">
                                        <select name="company" id="company" class="form-control"> 
                                            <option selected disabled>কোম্পানি</option>
                                    </select>
                                    </div>
                                    <div class="form-group my-4 mx-2">
                                        <select name="itemthikness" id="itemthikness" class="form-control"> 
                                            <option selected disabled>মিলি</option>
                                    </select>
                                    </div>
                                    <div class="form-group my-4 mx-2">
                                        <select name="itemlength" id="itemlength" class="form-control"> 
                                            <option selected disabled>ফুট</option>
                                    </select>
                                    </div>
                                    <div class="form-group my-4 mx-2">
                                        <input id="baseprice" class="form-control" type="text" name="baseprice" placeholder="দর">
                                    </div>
                                    <br>
                                    <div class="d-flex col-12 justify-content-center ">
                                        <button type="button" id="clear" class="btn btn-danger mt-3 mx-2" disabled><i class="far fa-trash-alt"></i>  মুছুন</button>
                                    <div id="cng"><button type="button" id="addcard" class="btn btn-success mt-3 mx-2" disabled><i class="far fa-check-circle"></i>  যুক্ত করুন</button></div>
                                    </div>
                                    <span class="error-message d-flex justify-content-center mt-5" id="errormsg"></span>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="container justify-content-center mt-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mx-auto bg-white justify-content-center">
                            <div class="card">
                                <div class="card-header text-white bg-success">
                                    <h2 class="d-flex justify-content-center">ম্যামো বিবরণ
                                    </h2>
                                </div>
                                <div class="card-body" id="memodetails"> 
                                    <h3 class='mt-5 d-flex justify-content-center'>কোন বিবরণ পাওয়া যায় নি।</h3>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="col-6 d-flex justify-content-center" id="buttonvisible">
                                            <button type="button" id="draftmemo" class=" btn btn-lite-red text-white mx-5" disabled><i class="far fa-save"></i> অসমাপ্ত রাখুন</button>
                                            <button type="button" id="complitememo" class=" btn btn-primary mx-5" disabled><i class="fas fa-check-double"></i> সম্পন্ন</button>
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
    <script src="js/all.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/bootbox.all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/linq.min.js"></script>
    <script>
        var orderlist=Array();
        $(document).ready(function(){
            $("#localname").hide();
            $("#newmemo").change(function(){
                if($(this).find(":selected").text()=='লোকাল')
                {
                    $("#localname").show();
                }
                if($(this).find(":selected").text()!='লোকাল')
                {
                    $("#localname").hide();
                }
            });
            $("#clear").click(function(){
                $("#itemquantity").val(null);
                $("#itemlength").prop('selectedIndex',0);
                $("#newmemo").prop('selectedIndex',0);
                $("#itemthikness").prop('selectedIndex',0);
                $("#company").prop('selectedIndex',0);
                $("#baseprice").val(null);
                $("#itemthikness").removeClass("error-message-report");
                $("#company").removeClass("error-message-report");
                $("#itemlength").removeClass("error-message-report");
                $("#itemquantity").removeClass("error-message-report");
                $("#newmemo").removeClass("error-message-report");
                $("#errormsg").html("");

            });
            $("#clearlst").click(function(){
                $("#incomplitememo").prop('selectedIndex',0);
            });
            $("#company").change(function(){
                $.post("memoservice.php",{func:"LoadMili",companyid:$("#company").find(":selected").val()},"HTML").done(function(data){
                    if(data!=null){
                        $("#itemthikness").html(data);
                    }
                    else {
                        Notiflix.Notify.failure("Server Problem");
                    }
                 });
            })
            $("#itemthikness").change(function(){
                $.post("memoservice.php",{func:"LoadFoot",miliid:$("#itemthikness").find(":selected").val()},"HTML").done(function(data){
                    if(data!=null){
                        $("#itemlength").html(data);
                    }
                    else {
                        Notiflix.Notify.failure("Server Problem");
                    }
                 });
            })
        });
$(document).ready(function () {
  $("#itemquantity").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  return false;
    }
   });
  $("#baseprice").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  return false;
    }
   });
});
$(document).on("keypress","input[type='text']#laberinput",function(e){
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  return false;
    }
});
$(document).on("click","button#labercost",function(){
    totalWithLaber(orderlist);
});
$(document).on("click","button#addcard",function(){
        verifybeforeadd(Math.random().toString(36));   
});
$(document).on("click","a#logout",function(){
    $.ajax({
                url:"logincheck.php",
                method:"POST",
                data:{func:"logout"},
                dataType:"JSON",
                success:function(data){
                        if(!data){
                            $.redirect("login.city");
                        }
                }
            });
})
function Delete(id){
    var confirm;
    var enumerable = Enumerable.From(orderlist);
    var dictionary = enumerable.ToDictionary();
    var datajson=dictionary.Get(enumerable.Single(s=>s.Id === id));
    var msg="আপনি কি "+datajson.Quantity+" "+datajson.Length+"x"+datajson.Thikness+" "+datajson.Company+" "+datajson.Baseprice +" মুছে ফেলবেন?";
    Notiflix.Confirm.show("নিশ্চিত করন",msg,"হ্যাঁ","না",function(){
            $.post("draftmemooperation.php",{func:"Deletecustomerdraftmemodetails",Id:id},"JSON").done(function(data){
        if(data==1){
            $.post("draftmemooperation.php",{func:"getcustomerdraftmemoinfo",customerId:$("#newmemo").find(":selected").val()},"JSON").done(function(data){
            if(data!=0){
                let dt=data;
            orderlist=JSON.parse(dt)
            addToDetails(orderlist);
            $("#addcard").prop("disabled",false);
            $("#clear").prop("disabled",false);
            }
            else if(data==0){
                Notiflix.Notify.failure("ম্যামো পাওয়া যায় নি");
                orderlist=Array();
                addToDetails(orderlist);
                $("#addcard").prop("disabled",true);
                $("#clear").prop("disabled",true);
            }
    })
        }
        else if(data==0)
        {
            Notiflix.Notify.failure("<div class='text-red'>মুছা সম্ভব হয় নি</div>");
        }
    })
    });
    /*if(){
        
    }*/
}
function Edit(id){
    var enumerable = Enumerable.From(orderlist);
    var dictionary = enumerable.ToDictionary();
    var datajson=dictionary.Get(enumerable.Single(s=>s.Id === id));
    $.post("memoservice.php",{func:"LoadCompany",companyid:datajson.CompanyId},"HTML").done(function(data){
        if(data!=null){
            $("#company").html(data);
        }
        else {
            Notiflix.Notify.failure("Server Problem");
        }
    });
    $.post("memoservice.php",{func:"LoadMili",companyid:datajson.CompanyId,miliid:datajson.ThiknessId},"HTML").done(function(data){
            if(data!=null){
                $("#itemthikness").html(data);
            }
            else {
                Notiflix.Notify.failure("Server Problem");
            }
            });
    $.post("memoservice.php",{func:"LoadFoot",miliid:datajson.ThiknessId,footid:datajson.LengthId},"HTML").done(function(data){
    if(data!=null){
        $("#itemlength").html(data);
    }
    else {
        Notiflix.Notify.failure("Server Problem");
    }
    });
    $("#itemquantity").val(datajson.Quantity);
    $("#baseprice").val(datajson.Baseprice);
            $("#cng").html('<button type="button" onclick="Update('+"'"+datajson.Id+"'"+')" class="btn btn-custom-blue mt-3 mx-2"><i class="far fa-cloud-upload-alt"></i> পরিবর্তন করুন</button>')
    
}
$(document).on("click","button#newdokan",function(){
    $("#dokanname").val('');
    $("#dokanaddress").val('');
})
$(document).ready(function(){
    $.post("memoservice.php",{func:"loadWholesaleCustomer"},"HTML").done(function(data){
        if(data!=null){
            $("#newmemo").html(data);
        }
        else {
            Notiflix.Notify.failure("Server Problem");
        }
    });
});
$(document).ready(function(){
    $.post("memoservice.php",{func:"LoadCompany"},"HTML").done(function(data){
        if(data!=null){
            $("#company").html(data);
        }
        else {
            Notiflix.Notify.failure("Server Problem");
        }
    });
});
function Update(id){
    var enumerable = Enumerable.From(orderlist);
    var dictionary = enumerable.ToDictionary();
    dictionary.Remove(enumerable.Single(s=>s.Id === id ));
    orderlist=dictionary.ToEnumerable().Select(s => s.Key).ToArray();
    if(verifybeforeadd(id)){
        $("#cng").html('<button type="button" id="addcard" class="btn btn-success mt-3 mx-2"><i class="far fa-check-circle"></i>  যুক্ত করুন</button>');
    }
}



function memo(id){
    if($("#baseprice").val()=='')
            { var title=null;
                if($("#company").find(":selected").text()!='মটকা'){
                    if($("#itemlength").find(":selected").text()=='৬'){
                        if(parseInt($("#itemquantity").val())%12==0){
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান "+ (parseInt($("#itemquantity").val())%12)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৭'){
                        if(parseInt($("#itemquantity").val())%10==0){
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান "+ (parseInt($("#itemquantity").val())%10)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৮'){
                        if(parseInt($("#itemquantity").val())%9==0){
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান "+ (parseInt($("#itemquantity").val())%9)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৯'){
                        if(parseInt($("#itemquantity").val())%8==0){
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান "+ (parseInt($("#itemquantity").val())%8)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='১০'){
                        if(parseInt($("#itemquantity").val())%7==0){
                            title=parseInt(parseInt($("#itemquantity").val())/7)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/7)+" বান "+ (parseInt($("#itemquantity").val())%7)+ " পিছ";
                        }
                    }
                
                var value={LengthId:$("#itemlength").find(":selected").val(),Id:id, Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(), Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
            }
                if($("#company").find(":selected").text()=='মটকা'){
                    if(parseInt($("#itemquantity").val())%25==0){
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<25){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান "+ (parseInt($("#itemquantity").val())%25)+ " পিছ";
                        }      
                var value={LengthId:$("#itemlength").find(":selected").val(),Id:id, Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(), Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
            }
                orderlist.push(value);
                addToDetails(orderlist);
                $("#itemquantity").val(null);
                $("#company").prop('selectedIndex',0);
                $("#itemthikness").html('<option selected disabled>মিলি</option>');
                $("#itemlength").html('<option selected disabled>ফুট</option>');
                $("#baseprice").val(null);

            }
            if($("#baseprice").val()!='')
            {
                var total=null;
                var title=null;
                if($("#company").find(":selected").text()=='মটকা'){
                    total=(parseFloat($("#baseprice").val())*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                    if(parseInt($("#itemquantity").val())%25==0){
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<25){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান "+ (parseInt($("#itemquantity").val())%25)+ " পিছ";
                        }
                    var value={LengthId:$("#itemlength").find(":selected").val(),Id:id,Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(),Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
                }
                else if($("#company").find(":selected").text()!='মটকা'){
                    if($("#itemlength").find(":selected").text()=='৬'){
                        if(parseInt($("#itemquantity").val())%12==0){
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান "+ (parseInt($("#itemquantity").val())%12)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৭'){
                        if(parseInt($("#itemquantity").val())%10==0){
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান "+ (parseInt($("#itemquantity").val())%10)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৮'){
                        if(parseInt($("#itemquantity").val())%9==0){
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান "+ (parseInt($("#itemquantity").val())%9)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৯'){
                        if(parseInt($("#itemquantity").val())%8==0){
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান "+ (parseInt($("#itemquantity").val())%8)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='১০'){
                        if(parseInt($("#itemquantity").val())%7==0){
                            title=parseInt(parseInt($("#itemquantity").val())/7)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/7)+" বান "+ (parseInt($("#itemquantity").val())%7)+ " পিছ";
                        }
                    }


                    if($("#itemlength").find(":selected").text()=='৬')
                {
                    total=((parseFloat($("#baseprice").val())/12)*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                }
                else if($("#itemlength").find(":selected").text()=='৭'){
                    total=((parseFloat($("#baseprice").val())/10)*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                }
                else if($("#itemlength").find(":selected").text()=='৮'){
                    total=((parseFloat($("#baseprice").val())/9)*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                }
                else if($("#itemlength").find(":selected").text()=='৯'){
                    total=((parseFloat($("#baseprice").val())/8)*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                }
                else if($("#itemlength").find(":selected").text()=='১০'){
                    total=((parseFloat($("#baseprice").val())/7)*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                }
                var value={LengthId:$("#itemlength").find(":selected").val(),Id:id,Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(),Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
                }

               
                orderlist.push(value);
                console.log(orderlist);
                addToDetails(orderlist);
                $("#itemquantity").val(null);
                $("#itemlength").prop('selectedIndex',0);
                $("#itemthikness").prop('selectedIndex',0);
                $("#company").prop('selectedIndex',0);
                $("#baseprice").val(null);
                $("#newmemo").removeClass("error-message-report");
                $("#itemquantity").removeClass("error-message-report");
                $("#company").removeClass("error-message-report");
                $("#itemthikness").removeClass("error-message-report");
                $("#itemlength").removeClass("error-message-report");
                $("#baseprice").removeClass("error-message-report");
                $("#localname").removeClass("error-message-report");
                $("#itemthikness").html('<option selected disabled>মিলি</option>');
                $("#itemlength").html('<option selected disabled>ফুট</option>');

            }
}
function verifybeforeadd(id){
    var verified=false;
    if($("#newmemo").find(":selected").text()=='দোকানের তালিকা'){
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> দোকানের তালিকা হতে দোকান বাছাই করুন";
            $("#newmemo").addClass("error-message-report");
            $("#newmemo").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#newmemo").find(":selected").text()!='সমূহের দোকানের তালিকা' && $("#newmemo").find(":selected").text()=='লোকাল' && $("#localname").val()==''){

                    document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  কাস্টমারের নাম লিখুন";
                    $("#localname").addClass("error-message-report");
                    $("#newmemo").removeClass("error-message-report");
                    $("#localname").focus();
                    setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#itemquantity").val()=='' || parseInt($("#itemquantity").val())<1)
        {
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  পিছ সংখ্যা উল্লেখ করুন";
            $("#itemquantity").addClass("error-message-report");
            $("#newmemo").removeClass("error-message-report");
            $("#itemquantity").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#company").find(":selected").text()=='কোম্পানি')
        {
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> কোম্পানি উল্লেখ করুন";
            $("#company").addClass("error-message-report");
            $("#itemlength").removeClass("error-message-report");
            $("#itemquantity").removeClass("error-message-report");
            $("#newmemo").removeClass("error-message-report");
            $("#company").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#itemthikness").find(":selected").text()=='মিলি')
        {
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> মিলি সংখ্যা উল্লেখ করুন";
            $("#itemthikness").addClass("error-message-report");
            $("#company").removeClass("error-message-report");
            $("#itemlength").removeClass("error-message-report");
            $("#itemquantity").removeClass("error-message-report");
            $("#newmemo").removeClass("error-message-report");
            $("#itemthikness").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#itemlength").find(":selected").text()=='ফুট')
        {
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> ফুট উল্লেখ করুন";
            $("#itemlength").addClass("error-message-report");
            $("#itemquantity").removeClass("error-message-report");
            $("#newmemo").removeClass("error-message-report");
            $("#itemlength").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else if($("#baseprice").val()!='' && parseInt($("#baseprice").val())<1)
        {
            document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  সঠিক দর উল্লেখ করুন";
            $("#baseprice").focus();
            $("#baseprice").addClass("error-message-report");
            $("#itemquantity").removeClass("error-message-report");
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
        }
        else{
            $("#baseprice").removeClass("error-message-report");
            if(orderlist.length<30){
                memo(id);
            }
            else{
                addToDetails(orderlist);
                Notiflix.Report.failure("সতর্কীকরন","সর্বোচ্চ সীমা অতিক্রম হয়েছে");
            }
            verified=true;
        }
        return verified;
}
$(document).on("click","button#seedraftlist",function(){
    if($("#newmemo").find(":selected").text()=="দোকানের তালিকা"){
        $("#errormsg").html("<i class='fad fa-exclamation-circle ml-3 mr-1'></i> দোকানের তালিকা হতে দোকান বাছাই করুন");
            $("#newmemo").addClass("error-message-report");
            $("#newmemo").focus();
            setTimeout(function(){ 
                $("#errormsg").html('');
            }, 5000);
    }
    else{
        $("#newmemo").removeClass("error-message-report");
        $.post("draftmemooperation.php",{func:"getcustomerdraftmemoinfo",customerId:$("#newmemo").find(":selected").val()},"JSON").done(function(data){
            if(data!=0){
                let dt=data;
            orderlist=JSON.parse(dt)
            addToDetails(orderlist);
            $("#addcard").prop("disabled",false);
            $("#clear").prop("disabled",false); 
            $("#newmemo").prop("disabled",true); 
            $("#securebtn").html(' <button class="btn btn-custom-indigo " id="chabgememo">অন্য ম্যামো দেখুন</button>');
            }
            else if(data==0){
                Notiflix.Notify.failure("ম্যামো পাওয়া যায় নি");
                orderlist=Array();
                addToDetails(orderlist);
                $("#addcard").prop("disabled",true);
                $("#clear").prop("disabled",true);
            }
    })
    }
})
$(document).on("click","button#draftmemo",function(){
    Notiflix.Confirm.show("নিশ্চিত করুন","ম্যামো অসমাপ্ত হিসেবে হালনাগাদ করবেন?","হ্যাঁ","না",function(){
        async_call(UpdateDetailstodb($("#newmemo").find(":selected").val(),orderlist));
    Notiflix.Notify.success("ম্যামো অসমাপ্ত হিসেবে হালনাগাদ হয়েছে");
    orderlist=Array();
    addToDetails(orderlist);
    $("#clear").prop("disabled",true);
    $("#addcard").prop("disabled",true);
    $("#newmemo").prop("disabled",false); 
    $("#newmemo").prop("selectedIndex",0);
    $("#securebtn").html('<button class="btn btn-custom-orange " id="seedraftlist">ম্যামো দেখুন</button>');
    })
});
$(document).on("click","button#chabgememo",function(){
    $("#newmemo").prop("selectedIndex",0);
    $("#newmemo").prop("disabled",false); 
    orderlist=Array();
    $("#securebtn").html('<button class="btn btn-custom-orange " id="seedraftlist">ম্যামো দেখুন</button>');
    addToDetails(orderlist);
})
$(document).on("click","button#Advancedmemo",function(){
    var option='<option selected disabled>মিলি বাছুন</option>';
    var temparray=Array();
    $.each(orderlist,function(){getmili=this; if(getmili.Company!="মটকা"){ if(temparray.indexOf(getmili.ThiknessId)===-1){ temparray.push(getmili.ThiknessId);option+='<option value='+"'"+getmili.ThiknessId+"'"+' >'+getmili.Thikness+' '+getmili.Company+'</option>';}}})
    bootbox.dialog({title:"<h2 class='text-custom-indigo'>দ্রুত দর বসান</h2>",
    message:'<div class="row"><div class="col-4"><select name="datamili" id="datamili" class="form-control">'+option+'</select></div><div class="col-4"><input type="number" name="maxprice" placeholder="সর্বোচ্চ দর" id="maxprice" class="form-control"></div><div class="col-4"><input type="number" name="minprice" placeholder="সর্বোনিম্ন দর" id="minprice" class="form-control"></div></div>',
    buttons: {
        fee: {
            label: '<i class="fad fa-save mr-1"></i>সম্পন্ন',
            className: 'btn-custom-indigo',
            callback: function(){
                if($("#datamili").find(":selected").text()=="মিলি বাছুন"){
                    $("#datamili").focus();
                    return false;
                }
                else if($("#maxprice").val()=='' || $("#maxprice").val()==null){
                    $("#maxprice").focus();
                    return false;
                }
                else if($("#minprice").val()=='' || $("#minprice").val()==null){
                    $("#minprice").focus();
                    return false;
                }
                else if(parseInt($("#minprice").val())>=parseInt($("#maxprice").val())){
                    $("#minprice").focus();
                    Notiflix.Report.failure("অসমাপ্ত","সর্বোনিম্ন দর সর্বোচ্চ দর অপেক্ষা বেশি অথবা সমান")
                    return false;
                }
                else{
                    for(var i=0; i<orderlist.length;i++){
                        if(orderlist[i].ThiknessId==$("#datamili").find(":selected").val()){
                            if(orderlist[i].Length=="৬" || orderlist[i].Length=="৮" || orderlist[i].Length=="৯"){
                        orderlist[i].Baseprice=$("#maxprice").val();
                        switch(orderlist[i].Length){
                            case "৬":
                                total=((parseFloat(orderlist[i].Baseprice)/12)*parseFloat(orderlist[i].Quantity));
                                orderlist[i].Totalprice=(Math.round(total)).toString();
                                break;
                            case "৮":
                                total=((parseFloat(orderlist[i].Baseprice)/9)*parseFloat(orderlist[i].Quantity));
                                orderlist[i].Totalprice=(Math.round(total)).toString();
                                break;
                            case "৯":
                                total=((parseFloat(orderlist[i].Baseprice)/8)*parseFloat(orderlist[i].Quantity));
                                orderlist[i].Totalprice=(Math.round(total)).toString();
                                break;
                            default:
                                break;
                        }
                    }
                    else if(orderlist[i].Length=="৭" || orderlist[i].Length=="১০"){
                        orderlist[i].Baseprice=$("#minprice").val();
                        switch(orderlist[i].Length){
                            case "৭":
                                total=((parseFloat(orderlist[i].Baseprice)/10)*parseFloat(orderlist[i].Quantity));
                                orderlist[i].Totalprice=(Math.round(total)).toString();
                                break;
                            case "১০":
                                total=((parseFloat(orderlist[i].Baseprice)/7)*parseFloat(orderlist[i].Quantity));
                                orderlist[i].Totalprice=(Math.round(total)).toString();
                                break;
                            default:
                                break;
                        }
                    }
                        }
                    }
                    addToDetails(orderlist);
                }             
            }
        },
        fi: {
            label: '<i class="fad fa-times-circle mr-1"></i>বাদ দিন',
            className: 'btn-red',
            callback: function(){
                                
            }
        }
    }
    })
})
$(document).on("click","button#complitememo",function(){
    var memo;
    var drafmemoid;
    var tk="0";
    var laber="0";
    Notiflix.Confirm.show("নিশ্চিত করুন","আপনি কি অসমাপ্ত ম্যামো সম্পন্ন করবেন?","হ্যাঁ","না",function(){
        bootbox.dialog({
            title:"জমা করছেন",
            message:'<div class="input-group"><div class="input-input-group-prepend"><span class="input-group-text">জমা করুন</span></div><input type="number" name="name" placeholder="টাকা" id="memojomataka" class="form-control"></div>',
            onEscape:true,
            backdrop:true,
            buttons:{
                fee:{
                    label:'ঠিক আছে',
                    className:'btn-success',
                    callback:function(){
                        Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
        $.when($.post("draftmemooperation.php",{func:"LoadMemoForCustomar",customerId:$("#newmemo").find(":selected").val()}).done(function(data){
            dt1=JSON.parse(data)
            drafmemoid=dt1.DM_Id;
            total=0;
            details=true;
                $.each(orderlist,function(){
                    list=this;
                    total+=parseFloat(list.Totalprice);
                    total=Math.round(total);
                })
                if($("#laberinput").val()!=''||$("#laberinput").val()!=null){
                    laber=$("#laberinput").val();
                }
                $.post("memoservice.php",{func:"CreateMemo",TotalPrice:parseInt(total),Labor:parseInt(laber),CustomerId:$("#newmemo").find(":selected").val()},"JSON").done(function(data1){
                    dt=JSON.parse(data1);
                    memo=dt.Id;
                    if(dt.Stusas==1){
                        if($("#memojomataka").val()!=''||$("#memojomataka").val()!=null){
                            tk=$("#memojomataka").val();
                        }
                        $.post("memoservice.php",{func:"CreateMemoLog",memoId:dt.Id,CustomerId:$("#newmemo").find(":selected").val(),Jomataka:tk},"JSON").done(function(ddtt){
                if(ddtt==0){
                    Notiflix.Notify.failure("ম্যামো তথ্য জমা হয়নি")
                }
            })
                        $.when($.each(orderlist,function(){
                            setTimeout(() => {
                                list=this;
                                $.post("draftmemooperation.php",{func:"CreateMemoDetailsFromDraft",M_Id:memo,C_Id:list.CompanyId,T_Id:list.ThiknessId,I_Id:list.LengthId,Quantity:list.Quantity,baseprice:list.Baseprice,D_Id:list.Id},"JSON").done(function(data2){
                                if(data2==0){
                                    Notiflix.Notify.failure("ম্যামো সম্পন্ন হয়নি");
                                    details=false;
                                    }
                            })
                            $.post("memoservice.php",{func:"SellFormMemo",l_id:list.LengthId,pice:list.Quantity}).done(function(data3){
                                    if(data3==0){
                                        Notiflix.Notify.failure("ম্যামো সম্পন্ন হয়নি");
                        }
                    })
                            }, 200);
                        })
                        
                        ).done(function(){
                                if(details){
                                        $.post("draftmemooperation.php",{func:"CheckForDelete",memoId:drafmemoid,},"JSON").done(function(data){
                            })
                                }
                            $.post("memoservice.php",{func:"updateaccount",TotalPrice:total.toString(),CustomerId:$("#newmemo").find(":selected").val(),labor:laber,Referance:dt.Id},"JSON").done(function(data4){
                                if(data4==0){
                                    Notiflix.Notify.failure("ম্যামো সম্পন্ন হয়নি");
                                }else{
                                        if($("#memojomataka").val()!='' || $("#memojomataka").val()!=null){
                                            $.post("memoservice.php",{func:"AddJoma",taka:tk,CustomerId:$("#newmemo").find(":selected").val(),Referance:memo}).done(function(data5){
                                                if(data5==0){
                                        Notiflix.Notify.failure("ম্যামো সম্পন্ন হয়নি");
                                    }
                            })
                        }
                        
                    }
        })
                        })

                    }
                })
        })).done(function(){
            setTimeout(function(){
                Notiflix.Loading.remove();
                orderlist=Array();
                setTimeout(function(){
                    addToDetails(orderlist);
                    $("#clear").prop("disabled",true);
                    $("#addcard").prop("disabled",true);
                    $("#itemquantity").val(null);
                    $("#itemlength").prop('selectedIndex',0);
                    $("#newmemo").prop('selectedIndex',0);
                    $("#itemthikness").prop('selectedIndex',0);
                    $("#company").prop('selectedIndex',0);
                    $("#baseprice").val(null);
                    $("#itemthikness").removeClass("error-message-report");
                    $("#company").removeClass("error-message-report");
                    $("#itemlength").removeClass("error-message-report");
                    $("#itemquantity").removeClass("error-message-report");
                    $("#newmemo").removeClass("error-message-report");
                    $("#errormsg").html("");
                    Notiflix.Notify.success("অসমাপ্ত ম্যামো সমাপ্ত হয়েছে");
                    $.redirect("Invoice.city",{m:memo});
                })
            },3000)
        })
                    }
                }
            }
        })
    })
})
    </script>
</body>
</html>
<?php }?>
