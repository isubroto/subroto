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
    <title>খুচরা ম্যামো</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
    <link rel="stylesheet" href="css/print.css">
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
    <<div class="page-loader-wrapper">
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
                    <a href="#" class="dropdown-item text-custom-indigo">খুচরা ম্যামো</a>
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
                                <div class="card-header justify-content-center bg-custom-indigo ">
                                    <h2 class="d-flex text-white justify-content-center mt-1">খুচরা ম্যামো তৈরি করুন</h2>
                                </div>
                                <form action="#" class="col-md-10 col-sm-12 m-auto mt-2">
                                    <input type="text" name="localname" id="localname" class="form-control mt-5" placeholder="কাস্টমারের নাম">
                                </form>
                                <form action="#" class=" form-inline justify-content-center">
                                    <div class="form-group my-4 mx-2">
                                        <input id="itemquantity" class="form-control" type="number" name="itemquantity" placeholder="পিছ">
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
                                        <input id="baseprice" class="form-control" type="number" name="baseprice" placeholder="দর">
                                    </div>
                                    <br>
                                    <div class="d-flex col-12 justify-content-center ">
                                        <button type="button" id="clear" class="btn btn-danger mt-3 mx-2"><i class="far fa-trash-alt"></i>  মুছুন</button>
                                    <div id="cng"><button type="button" id="addcard" class="btn btn-success mt-3 mx-2"><i class="far fa-check-circle"></i>  যুক্ত করুন</button></div>
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
                                        <div class="col-6 d-flex justify-content-center">
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
    <script src="js/counterup.js"></script>
    <script src="js/linq.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/bootbox.all.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/script.js"></script>
    <script src="js/print.min.js"></script>
    <script src="js/jspdf.min.js"></script>
    <script src="js/qrcode.min.js"></script>
    <script>
        var orderlist=Array();
        $(document).ready(function(){
            $("#clear").click(function(){
                $("#itemquantity").val(null);
                $("#itemlength").prop('selectedIndex',0);
                $("#localname").val('');
                $("#itemthikness").prop('selectedIndex',0);
                $("#company").prop('selectedIndex',0);
                $("#baseprice").val(null);
                $("#itemthikness").removeClass("error-message-report");
                $("#company").removeClass("error-message-report");
                $("#itemlength").removeClass("error-message-report");
                $("#itemquantity").removeClass("error-message-report");
                $("#localname").removeClass("error-message-report");
                $("#errormsg").html("");

            });
            $("#clearlst").click(function(){
                $("#incomplitememo").prop('selectedIndex',0);
            });
            $(document).on("change","#company",function(){
                $.post("memoservice.php",{func:"LoadMili",companyid:$("#company").find(":selected").val()},"HTML").done(function(data){
                    $("#itemthikness").html(data);
                })
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
$(document).ready(function(){
    $("#addcard").click(function(){
         verifybeforeadd();

    });
});
$(document).ready(function(){
    $.post("memoservice.php",{func:"LoadCompany"},"HTML").done(function(data){
        $("#company").html(data);
    })
})
$(document).on("change","#itemthikness",function(){
    $.post("memoservice.php",{func:"LoadFoot",miliid:$("#itemthikness").find(":selected").val()},"HTML").done(function(data){
        $("#itemlength").html(data);
    })
})
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
    var enumerable = Enumerable.From(orderlist);
    var dictionary = enumerable.ToDictionary();
    dictionary.Remove(enumerable.Single(s=>s.Id === id ));
    orderlist=dictionary.ToEnumerable().Select(s => s.Key).ToArray();
    addToDetails(orderlist);
    if(orderlist.length<=0){
        $("#buttonvisible").html('<button type="button" id="complitememo" class=" btn btn-primary mx-3" disabled><i class="fad fa-check-double mr-1"></i> সম্পন্ন</button>')
    }
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
            Notiflix.Notify.Failure("Server Problem");
        }
    });
    $.post("memoservice.php",{func:"LoadMili",companyid:datajson.CompanyId,miliid:datajson.ThiknessId},"HTML").done(function(data){
            if(data!=null){
                $("#itemthikness").html(data);
            }
            else {
                Notiflix.Notify.Failure("Server Problem");
            }
            });
    $.post("memoservice.php",{func:"LoadFoot",miliid:datajson.ThiknessId,footid:datajson.LengthId},"HTML").done(function(data){
    if(data!=null){
        $("#itemlength").html(data);
    }
    else {
        Notiflix.Notify.Failure("Server Problem");
    }
    });
    $("#itemquantity").val(datajson.Quantity);
    $("#baseprice").val(datajson.Baseprice);
            $("#cng").html('<button type="button" onclick="Update('+"'"+datajson.Id+"'"+')" class="btn btn-custom-blue mt-3 mx-2"><i class="fad fa-cloud-upload-alt"></i> পরিবর্তন করুন</button>')
            $("#clear").prop("disabled",true);
    
}
function Update(id){
    var enumerable = Enumerable.From(orderlist);
    var dictionary = enumerable.ToDictionary();
    dictionary.Remove(enumerable.Single(s=>s.Id === id ));
    orderlist=dictionary.ToEnumerable().Select(s => s.Key).ToArray();
    if(verifybeforeadd()){
        $("#cng").html('<button type="button" id="addcard" class="btn btn-success mt-3 mx-2"><i class="fad fa-check-circle"></i>  যুক্ত করুন</button>');
        $("#clear").prop("disabled",false);
    }
}

function verifybeforeadd(){
    var verified=false;
    if($("#localname").val()==''){

document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  কাস্টমারের নাম লিখুন";
$("#localname").addClass("error-message-report");
$("#localname").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else if($("#itemquantity").val()=='')
{
document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  পিছ সংখ্যা উল্লেখ করুন";
$("#itemquantity").addClass("error-message-report");
$("#localname").removeClass("error-message-report");
$("#itemquantity").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else if($("#company").find(":selected").text()=='কোম্পানি')
{
document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> কোম্পানি উল্লেখ করুন";
$("#company").addClass("error-message-report");
$("#itemlength").removeClass("error-message-report");
$("#itemquantity").removeClass("error-message-report");
$("#localname").removeClass("error-message-report");
$("#company").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else if($("#itemthikness").find(":selected").text()=='মিলি')
{
document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> মিলি সংখ্যা উল্লেখ করুন";
$("#itemthikness").addClass("error-message-report");
$("#company").removeClass("error-message-report");
$("#itemlength").removeClass("error-message-report");
$("#itemquantity").removeClass("error-message-report");
$("#localname").removeClass("error-message-report");
$("#itemthikness").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else if($("#itemlength").find(":selected").text()=='ফুট')
{
document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i> ফুট উল্লেখ করুন";
$("#itemlength").addClass("error-message-report");
$("#itemquantity").removeClass("error-message-report");
$("#localname").removeClass("error-message-report");
$("#itemlength").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else if($("#baseprice").val()=='' || $("#baseprice").val()==null)
{
document.getElementById("errormsg").innerHTML = "<i class='fad fa-exclamation-circle ml-3 mr-1'></i>  দর উল্লেখ করুন";
$("#baseprice").addClass("error-message-report");
$("#itemthikness").removeClass("error-message-report");
$("#company").removeClass("error-message-report");
$("#itemlength").removeClass("error-message-report");
$("#itemquantity").removeClass("error-message-report");
$("#localname").removeClass("error-message-report");
$("#itemthikness").focus();
setTimeout(function(){ 
document.getElementById("errormsg").innerHTML = "";
}, 5000);
}
else{
    memo();
    verified=true;
}
return verified;
}
function memo(){
    var total=null;
                    
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
                    total=(parseFloat($("#baseprice").val())*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                    var value={Id:Math.random().toString(36),Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),LengthId : $("#itemlength").find(":selected").val(),Company : $("#company").find(":selected").text(),CompanyId : $("#company").find(":selected").val(), Thikness: $("#itemthikness").find(":selected").text(), ThiknessId: $("#itemthikness").find(":selected").val(),Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title};
                }
                else if($("#company").find(":selected").text()!='মটকা'){
                    if($("#itemlength").find(":selected").text()=='৬'){
                        if(parseInt($("#itemquantity").val())%12==0){
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<12){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান "+ (parseInt($("#itemquantity").val())%12)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৭'){
                        if(parseInt($("#itemquantity").val())%10==0){
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<10){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/10)+" বান "+ (parseInt($("#itemquantity").val())%10)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৮'){
                        if(parseInt($("#itemquantity").val())%9==0){
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<9){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/9)+" বান "+ (parseInt($("#itemquantity").val())%9)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='৯'){
                        if(parseInt($("#itemquantity").val())%8==0){
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<8){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/8)+" বান "+ (parseInt($("#itemquantity").val())%8)+ " পিছ";
                        }
                    }
                    else if($("#itemlength").find(":selected").text()=='১০'){
                        if(parseInt($("#itemquantity").val())%7==0){
                            title=parseInt(parseInt($("#itemquantity").val())/7)+" বান";
                        }
                        else if(parseInt($("#itemquantity").val())<7){
                            title=parseInt(parseInt($("#itemquantity").val()))+" পিছ";
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
                var value={Id:Math.random().toString(36),Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),LengthId : $("#itemlength").find(":selected").val(),Company : $("#company").find(":selected").text(),CompanyId : $("#company").find(":selected").val(), Thikness: $("#itemthikness").find(":selected").text(),ThiknessId: $("#itemthikness").find(":selected").val(),Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title};
                }

               
                orderlist.push(value);
                addToDetails(orderlist);
                $("#itemquantity").val(null);
                $("#itemlength").prop('selectedIndex',0);
                $("#itemthikness").prop('selectedIndex',0);
                $("#company").prop('selectedIndex',0);
                $("#baseprice").val(null);
}
$(document).on("click","button#complitememo",function(){
    var memo;
    Notiflix.Confirm.show("নিশ্চিত করুন","ম্যামো সম্পুর্ন করবেন?","হ্যাঁ","না",function(){
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
                        total=0;
                        $.each(orderlist,function(){
                            list=this;
                            total+=parseFloat(list.Totalprice);
                        })
                        alert("total: "+total);
                        alert($("#laberinput").val());
                        if(($.trim($("#laberinput").val())!='' || $.trim($("#laberinput").val())!=null)&&$.isNumeric(parseFloat($("#laberinput").val()))){
                            total+=parseFloat($("#laberinput").val());
                        }
                        total=Math.round(total);
                        if($("#memojomataka").val()=='' ||$("#memojomataka").val()==null){
                            $("#memojomataka").focus();
                            return false;
                        }
                        else if(parseFloat($("#memojomataka").val())>parseFloat(total)){
                            $("#memojomataka").focus();
                            return false;
                        }
                        else{
                            Notiflix.Loading.hourglass('প্রসেসিং চলছে...');
                        total=0;
                        $.each(orderlist,function(){
                            list=this;
                            total+=parseFloat(list.Totalprice);
                        })
                        total=Math.round(total);
                        if($("#laberinput").val()!=''||$("#laberinput").val()!=null){
                            laber=$("#laberinput").val();
                        }
                        if($("#laberinput").val()==''||$("#laberinput").val()==null){
                            laber="0";
                        }
                        $.when($.post("memoservice.php",{func:"CreateMemo",TotalPrice:parseInt(total),Labor:parseInt(laber),CustomerId:0,Less:$("#memojomataka").val()},"JSON").done(function(data){
                            dt=JSON.parse(data)
                            memo=dt.Id;
                            if(dt.Stusas==1){
                                $.post("memoservice.php",{func:"CreateMemoLog",memoId:dt.Id,CustomerId:$("#localname").val(),Jomataka:"0"},"JSON").done(function(ddtt){
                                if(ddtt==0){
                                    Notiflix.Notify.failure("ম্যামো তথ্য জমা হয়নি")
                                }
                            })
                            $.when(
                                    $.each(orderlist,function(){
                                list=this;
                                $.post("memoservice.php",{func:"CreateMemoDetails",M_Id:dt.Id,C_Id:list.CompanyId,T_Id:list.ThiknessId,I_Id:list.LengthId,Quantity:list.Quantity,baseprice:list.Baseprice},"JSON").done(function(data1){
                                    if(data1==1){
                                        alert(list.Quantity);
                                        $.post("memoservice.php",{func:"SellFormMemo",l_id:list.LengthId,pice:list.Quantity}).done(function(data2){
                                            alert(data2);
                                            if(data2==0){
                                                Notiflix.Notify.failure("ম্যামো সম্পন্ন হয়নি");
                                            }
                                        })
                                    }
                                })
                            })
                                )
                            }
                        })).done(function(){
                            setTimeout(function(){
                            Notiflix.Loading.remove();
                            setTimeout(function(){
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
                                orderlist=Array();
                                addToDetails(orderlist);
                                Notiflix.Notify.success("ম্যামো সম্পন্ন হয়েছে");
                                Notiflix.Confirm.show("নিশ্চিত করুন","ম্যামো বের করুন","হ্যাঁ","না",function(){
                                    $.redirect("Invoice.city",{m:memo});
                                })
                            },300)
                        },3000)
                        })
                        }
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