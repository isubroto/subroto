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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ইতিহাস</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/notiflix.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="customfonts/font.css">
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
                        <a href="#" class="nav-link lnk">
                            <i class="fad fa-history"></i>
                        ইতিহাস
                        </a>
                    </li>
                </ul>
              </div>
    </nav>
    </header>
    <div class="container mt-5"><div class="card">
        <div class="card-header bg-dark-cyan text-white"><h2 class="d-flex justify-content-center">ইতিহাস</h2></div>
        <div class="card-body">
        <div class="card">
            <div class="card-header justify-content-center bg-lite-green text-white">
            <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#srcmemobyid" data-toggle="tab" id="loadsrcmemobyid"  class="nav-link text-white">ম্যামো খুঁজুন</a></li>
            <li class="nav-item"><a href="#WholesellMemo" data-toggle="tab" id="loadWholesellMemo"  class="nav-link text-white">পাইকারি ম্যামো দেখুন</a></li>
            <li class="nav-item"><a href="#stockdetails" data-toggle="tab" id="loadstockdetails"  class="nav-link text-white">স্টক বিবরন দেখুন</a></li>
            </ul>
            </div>
            <div class="card-body">
            <div class="tab-content"
            ><div class="tab-pane in active" id="srcmemobyid">
            <div class="row"><div class="col-12">
            <div class="card">
                <div class="card-header"><div class="input-group"><div class="input-group-append"><span class="input-group-text"><i class="fad fa-file-search"></i></span></div>
            <input type="text" name="nn" placeholder="ম্যামো নম্বর" id="MemoNumber" class="form-control">
            <div class="input-group-append"><button class="btn btn-lite-red" id="srcmemo"><i class="fad fa-search mr-1"></i>খুঁজুন</button></div>
            </div></div>
                <div class="card-body" id="srcmemobyidbody">
                
                </div>
                <div class="row" id="showbtntosrcmemoprint">
                    
                </div>
            </div>
            </div>
            </div>
            </div>
            
            <div class="tab-pane" id="WholesellMemo">
            <div class="row">
                <div class="col-12">
                <div class="card">
                <div class="card-header d-flex"><div class="input-group"><div class="input-group-append"><span class="input-group-text"><i class="fad fa-file-search"></i></span></div>
            <select name="frrrr" id="Wholsellmemo" class="form-control"></select>
            <div class="input-group-append"></div>
            <div class="input-group-append"><button class="btn btn-block btn-lite-red" id="seewholecelllist"><i class="fad fa-search mr-1"></i>দেখুন</button></div></div>
            </div>
                <div class="card-body" id="WholesellMemobody">
                </div>
                <div class="card-footer" id="WholesellMemofooter"></div>
            </div>
            </div>
            </div>
            </div>
            <div class="tab-pane" id="stockdetails">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header"><div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="col-3"><select name="" id="Cname" class="form-control"><option selected disabled>কোম্পানি</option></select></div>
                            <div class="col-3"><select name="" id="Mname" class="form-control"><option selected disabled>মিলি</option></select></div>
                            <div class="col-3"><select name="" id="Fname" class="form-control"><option selected disabled>ফুট</option></select></div>
                            <div class="col-2"><button class="btn btn-block btn-custom-green" id="seestockdetails"><i class="fad fa-list-alt mr-1"></i>দেখুন</button></div>
                        </div>
                    </div></div>
                    <div class="card-body" id="stockdetailsbody">
                    </div>
                </div>
                </div>
            </div>
            </div>
            
            </div>
        </div></div>
    </div></div>

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
$(document).on("click","button#srcmemo",function(){
    if($("#MemoNumber").val()=='' || $("#MemoNumber").val()==null){
        $("#MemoNumber").focus();
    }
    else{
        $("#showbtntosrcmemoprint").html('');
        $("#srcmemobyidbody").html('');
        Notiflix.Block.hourglass('#srcmemobyidbody', 'প্রসেসিং...');
        $.post("HistoryManage.php",{func:"srcmemo",Id:$("#MemoNumber").val()},"JSON").done(function(data){
            lb=0;
            $.post("HistoryManage.php",{func:"Loadlabor",Id:$("#MemoNumber").val()},"JSON").done(function(d){
                lb=d;
            })
            if(data!=''|| data!=null){
                dt=JSON.parse(data);
                total=0;
                header='';
                footer='';
                body='';
                $.post("HistoryManage.php",{func:"MemoOverlook",Id:$("#MemoNumber").val()},"JSON").done(function(data1){
                  dt1=JSON.parse(data1);
                  $.each(dt,function(){
                      row=this;
                      total+=parseInt(row.Totalprice);
                  })
                  total+=parseInt(lb);
                  if(dt1.CustomerId!="0" || dt1.CustomerId!=0 ){
                    header='<div class="row bg-primary text-white py-2"><div class="col-12 d-flex justify-content-between"><div class="col-6 justify-content-start pt-2 h3">'+dt1.CustomerName+'</div><div class="col-2 d-flex justify-content-end"><div class="flex-column"><div class="col-12">'+dt1.Date.getDigitBanglaFromEnglish()+'</div><div class="col-12">#'+dt1.Memo+'</div></div></div></div></div><div class="row"><div class="col-12 d-flex justify-content-center bg-custom-orange text-white"><div class="col-3 d-flex justify-content-center py-1">পরিমাণ</div><div class="col-3 d-flex justify-content-center py-1">বিবরণ</div><div class="col-3 d-flex justify-content-center py-1">দর</div><div class="col-3 d-flex justify-content-center py-1">মোট</div></div></div>';
                    footer='<div class="mt-1 alert-custom-orange text-custom-orange"> <div class="row"><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1">সর্বমোট</div><div class="col-3 d-flex justify-content-center py-1">'+total.toString().getDigitBanglaFromEnglish()+'</div></div></div>';
                    $.each(dt,function(){
                        row=this;
                        body+='<div class="row mt-1"><div class="col-3 d-flex justify-content-center py-1">'+row.Quantity.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.lenth+'x'+row.thikness+' '+row.company+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.baseprice.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.Totalprice.toString().getDigitBanglaFromEnglish()+'</div></div>';
                    })
                    body+='<div class="row mt-1"><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1">লেবার</div><div class="col-3 d-flex justify-content-center py-1">'+lb.toString().getDigitBanglaFromEnglish()+'</div></div>';
                  }
                  else{
                    header='<div class="row bg-primary text-white py-2"><div class="col-12 d-flex justify-content-between"><div class="col-6 justify-content-start pt-2 h3">'+dt1.CustomerName+'</div><div class="col-2 d-flex justify-content-end"><div class="flex-column"><div class="col-12">'+dt1.Date.getDigitBanglaFromEnglish()+'</div><div class="col-12">#'+dt1.Memo+'</div></div></div></div></div><div class="row"><div class="col-12 d-flex justify-content-center bg-custom-orange text-white"><div class="col-4 d-flex justify-content-center py-1">পরিমাণ</div><div class="col-4 d-flex justify-content-center py-1">বিবরণ</div><div class="col-4 d-flex justify-content-center py-1">মোট</div></div></div>';
                    footer='<div class="mt-1 alert-custom-orange text-custom-orange"> <div class="row"><div class="col-4 d-flex justify-content-center py-1"></div><div class="col-4 d-flex justify-content-center py-1">সর্বমোট</div><div class="col-4 d-flex justify-content-center py-1">'+total.toString().getDigitBanglaFromEnglish()+'</div></div></div>';
                    $.each(dt,function(){
                        row=this;
                        body+='<div class="row mt-1"><div class="col-4 d-flex justify-content-center py-1">'+row.Quantity.toString().getDigitBanglaFromEnglish()+'</div><div class="col-4 d-flex justify-content-center py-1">'+row.lenth+'x'+row.thikness+' '+row.company+'</div><div class="col-4 d-flex justify-content-center py-1">'+row.Totalprice.toString().getDigitBanglaFromEnglish()+'</div></div>';
                    })
                    body+='<div class="row mt-1"><div class="col-4 d-flex justify-content-center py-1"></div><div class="col-4 d-flex justify-content-center py-1">লেবার</div><div class="col-4 d-flex justify-content-center py-1">'+lb.getDigitBanglaFromEnglish()+'</div></div>';
                  }
                  setTimeout(function(){
                    Notiflix.Block.remove('#srcmemobyidbody');
                      setTimeout(function(){
                        $("#srcmemobyidbody").html(header+body+footer);
                        $("#showbtntosrcmemoprint").html('<div class="col-12 d-flex justify-content-center mb-4"><button class="btn btn-custom-orange" onclick="Print('+"'"+dt1.Memo+"'"+')"><i class="fad fa-print mr-1"></i>প্রিন্ট করুন</button></div>')
                      }, 300);
                  },3000)
                })
            }
        })
    }
})
function Print(id){
   // Notiflix.Confirm.Show("নিশ্চিত করুন","আপনি কি প্রিন্ট করবেন","হ্যাঁ","না",function(){
        $.redirect("Invoice.city",{m:id})

}
$(document).ready(function(){
    $.post("accountoperations.php",{func:"loadWholesale"},"HTML").done(function(data){
        $("#Wholsellmemo").html(data);
    })
})
$(document).on("click","button#seewholecelllist",function(){
    if($("#Wholsellmemo").find(":selected").text()=='দোকানের তালিকা'){
        $("#Wholsellmemo").focus();
    }
    else{
        $("#WholesellMemofooter").css("min-height","");
        $.post("HistoryManage.php",{func:"GetWholesaleMemos",Id:$("#Wholsellmemo").find(":selected").val()},"JSON").done(function(data){
            $("#WholesellMemobody").html("");
            $("#WholesellMemofooter").html("");
            header='';
            body='';
            footer='';
            Notiflix.Block.hourglass('#WholesellMemobody', 'প্রসেসিং...');
             if(data!=null){
                dt=JSON.parse(data);
                header='<div class="card"><div class="card-header bg-cyan text-white"><div class="row"><div class="col-12 d-flex"><div class="col-3 d-flex justify-content-center">তারিখ</div><div class="col-3 d-flex justify-content-center">ম্যামো নম্বর</div><div class="col-3 d-flex justify-content-center">সর্বমোট টাকা</div><div class="col-2 d-flex justify-content-center">লেবার</div><div class="col-1 d-flex justify-content-center"></div></div></div></div>';
                footer='</div>';
            $.each(dt,function(){
                row=this;
                dttt=row.Date.split(" ");
                dttt1=dttt[0];
                dtt=dttt1.split("-");
                date=dtt[2]+"/"+dtt[1]+'/'+dtt[0];
                body+='<div class="card-body"><div class="col-12 d-flex"><div class="col-3 d-flex justify-content-center">'+date.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center">'+row.M_Id+'</div><div class="col-3 d-flex justify-content-center">'
                +row.TotalPrice.toString().getDigitBanglaFromEnglish()+'</div><div class="col-2 d-flex justify-content-center">'+row.Labor.toString().getDigitBanglaFromEnglish()+'</div><div class="col-1 d-flex justify-content-center"><button class="btn btn-sm btn-cyan" onclick=Viewdetails('+"'"+row.M_Id+"'"+')><i class="fad fa-list-alt"></i></button></div></div></div>';

            })
            setTimeout(() => {
                Notiflix.Block.remove('#WholesellMemobody');
                $("#WholesellMemofooter").css("min-height","13rem");
                setTimeout(() => {
                    $("#WholesellMemobody").html(header+body+footer);
                }, 300);
            }, 3000);
             }
             else{
                 Notiflix.Notify.failure("ম্যামো পাওয়া যায় নি।")
             }
        })
    }
})
function Viewdetails(id){
    $("#WholesellMemofooter").html('');
        Notiflix.Block.hourglass('#WholesellMemofooter', 'প্রসেসিং...');
        $.post("HistoryManage.php",{func:"srcmemo",Id:id},"JSON").done(function(data){
            lb=0;
            $.post("HistoryManage.php",{func:"Loadlabor",Id:id},"JSON").done(function(d){
                lb=d;
            });
            if(data!=''|| data!=null){
                dt=JSON.parse(data);
                total=0;
                header='';
                footer='';
                body='';
                $.post("HistoryManage.php",{func:"MemoOverlook",Id:id},"JSON").done(function(data1){
                  dt1=JSON.parse(data1);
                  $.each(dt,function(){
                      row=this;
                      total+=parseInt(row.Totalprice);
                  })
                  total+=parseInt(lb);
                  if(dt1.CustomerId!="0" || dt1.CustomerId!=0 ){
                    header='<div class="row bg-primary text-white py-2"><div class="col-12 d-flex justify-content-between"><div class="col-6 justify-content-start pt-2 h3">'+dt1.CustomerName+'</div><div class="col-2 d-flex justify-content-end"><div class="flex-column"><div class="col-12">'+dt1.Date.getDigitBanglaFromEnglish()+'</div><div class="col-12">#'+dt1.Memo+'</div></div></div></div></div><div class="row"><div class="col-12 d-flex justify-content-center bg-custom-orange text-white"><div class="col-3 d-flex justify-content-center py-1">পরিমাণ</div><div class="col-3 d-flex justify-content-center py-1">বিবরণ</div><div class="col-3 d-flex justify-content-center py-1">দর</div><div class="col-3 d-flex justify-content-center py-1">মোট</div></div></div>';
                    footer='<div class="mt-1 alert-custom-orange text-custom-orange"> <div class="row"><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1">সর্বমোট</div><div class="col-3 d-flex justify-content-center py-1">'+total.toString().getDigitBanglaFromEnglish()+'</div></div></div>';
                    $.each(dt,function(){
                        row=this;
                        body+='<div class="row mt-1"><div class="col-3 d-flex justify-content-center py-1">'+row.Quantity.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.lenth+'x'+row.thikness+' '+row.company+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.baseprice.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center py-1">'+row.Totalprice.toString().getDigitBanglaFromEnglish()+'</div></div>';
                    })
                    body+='<div class="row mt-1"><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1"></div><div class="col-3 d-flex justify-content-center py-1">লেবার</div><div class="col-3 d-flex justify-content-center py-1">'+lb.getDigitBanglaFromEnglish()+'</div></div>';

                  }
                  else{
                    header='<div class="row bg-primary text-white py-2"><div class="col-12 d-flex justify-content-between"><div class="col-6 justify-content-start pt-2 h3">'+dt1.CustomerName+'</div><div class="col-2 d-flex justify-content-end"><div class="flex-column"><div class="col-12">'+dt1.Date.getDigitBanglaFromEnglish()+'</div><div class="col-12">#'+dt1.Memo+'</div></div></div></div></div><div class="row"><div class="col-12 d-flex justify-content-center bg-custom-orange text-white"><div class="col-4 d-flex justify-content-center py-1">পরিমাণ</div><div class="col-4 d-flex justify-content-center py-1">বিবরণ</div><div class="col-4 d-flex justify-content-center py-1">মোট</div></div></div>';
                    footer='<div class="mt-1 alert-custom-orange text-custom-orange"> <div class="row"><div class="col-4 d-flex justify-content-center py-1"></div><div class="col-4 d-flex justify-content-center py-1">সর্বমোট</div><div class="col-4 d-flex justify-content-center py-1">'+total.toString().getDigitBanglaFromEnglish()+'</div></div></div>';
                    $.each(dt,function(){
                        row=this;
                        body+='<div class="row mt-1"><div class="col-4 d-flex justify-content-center py-1">'+row.Quantity.toString().getDigitBanglaFromEnglish()+'</div><div class="col-4 d-flex justify-content-center py-1">'+row.lenth+'x'+row.thikness+' '+row.company+'</div><div class="col-4 d-flex justify-content-center py-1">'+row.Totalprice.toString().getDigitBanglaFromEnglish()+'</div></div>';
                    })
                    body+='<div class="row mt-1"><div class="col-4 d-flex justify-content-center py-1"></div><div class="col-4 d-flex justify-content-center py-1">লেবার</div><div class="col-4 d-flex justify-content-center py-1">'+lb.getDigitBanglaFromEnglish()+'</div></div>';
                  }
                  setTimeout(function(){
                    Notiflix.Block.remove('#WholesellMemofooter');
                      setTimeout(function(){
                        $("#WholesellMemofooter").html(header+body+footer);
                        $("#showbtntosrcmemoprint").html('<div class="col-12 d-flex justify-content-center mb-4"><button class="btn btn-custom-orange" onclick="Print('+"'"+dt1.Memo+"'"+')"><i class="fad fa-print mr-1"></i>প্রিন্ট করুন</button></div>')
                      }, 300);
                  },3000)
                })
            }
        })
}
$('#datepicker').datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekDisabled: "5",
    daysOfWeekHighlighted:"5"
});
$(document).on("click","#loadsrcmemobyid",function(){
$("#srcmemobyidbody").html('');
$("#showbtntosrcmemoprint").html('');
})
$(document).on("click","#loadWholesellMemo",function(){
$("#WholesellMemobody").html('');
$("#WholesellMemofooter").html('');
$("#WholesellMemofooter").css("min-height","");
})
$(document).on("click","#loadstockdetails",function(){
    $("#Mname").html('<option selected="" disabled="">মিলি</option>');
    $("#Fname").html('<option selected="" disabled="">ফুট</option>');
   $("#stockdetailsbody").html('');
    $.post("memoservice.php",{func:"LoadCompany"},"HTML").done(function(data){
        $("#Cname").html(data);
    })
    $("#stockdetailsbody").css("min-height","");
})
$(document).on("change","select#Cname",function(){
    $.post("memoservice.php",{func:"LoadMili",companyid:$("#Cname").find(":selected").val()},"HTML").done(function(data){
        $("#Mname").html(data);
    })
})
$(document).on("change","select#Mname",function(){
    $.post("memoservice.php",{func:"LoadFoot",miliid:$("#Mname").find(":selected").val()},"HTML").done(function(data){
        $("#Fname").html(data);
    })
})
$(document).on("click","button#seestockdetails",function(){
    if($("#Cname").find(":selected").text()=="কোম্পানি"){
        $("#Cname").focus();
    }
    else if($("#Mname").find(":selected").text()=="মিলি"){
        $("#Mname").focus();
    }
    else if($("#Fname").find(":selected").text()=="ফুট"){
        $("#Fname").focus();
    }else{
        header='';
        body='';
        $.post("HistoryManage.php",{func:"LoadStock",fid:$("#Fname").find(":selected").val()}).done(function(data){
            if(data!=null){
                Notiflix.Block.hourglass('#stockdetailsbody', 'প্রসেসিং...');
                dt=JSON.parse(data)
                header='<div class="card"><div class="card-header bg-success text-white"><div class="row"><div class="col-12 d-flex h5 pt-1"><div class="col-3 d-flex justify-content-center">তারিখ</div><div class="col-3 d-flex justify-content-center">ক্রয়</div><div class="col-3 d-flex justify-content-center">বিক্রয়</div><div class="col-3 d-flex justify-content-center">বর্তমান অবশিষ্ট</div></div></div></div><div class="card-body">';
            footer='</div></div>';
            $.each(dt,function(){
                st=this;
                dttt=st.time.split(" ");
                dttt1=dttt[0];
                dtt=dttt1.split("-");
                date=dtt[2]+"/"+dtt[1]+'/'+dtt[0];
                if(st.Operation=="BUY"){
                    body+='<div class="row h5 py-1 text-success"><div class="col-12 d-flex"><div class="col-3 d-flex justify-content-center">'+date.getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center">'+st.Pices.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center"></div><div class="col-3 d-flex justify-content-center">'+(parseInt(st.PreviousPice)+parseInt(st.Pices)).toString().getDigitBanglaFromEnglish()+'</div></div></div>';
                }
                else if(st.Operation=="SELL"){
                    val="0";
                    if((parseInt(st.PreviousPice)-parseInt(st.Pices))>0){
                        val=(parseInt(st.PreviousPice)-parseInt(st.Pices)).toString();
                    }
                    body+='<div class="row h5 py-1 text-custom-orange"><div class="col-12 d-flex"><div class="col-3 d-flex justify-content-center">'+date.getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center"></div><div class="col-3 d-flex justify-content-center">'+st.Pices.toString().getDigitBanglaFromEnglish()+'</div><div class="col-3 d-flex justify-content-center">'+val.getDigitBanglaFromEnglish()+'</div></div></div>';
                }
            })
            setTimeout(() => {
                Notiflix.Block.remove('#stockdetailsbody');
                setTimeout(() => {
                    $("#stockdetailsbody").html(header+body+footer);
                }, 300);
            }, 3000);
            }
        })
    }
})
</script>
</body>
</html>
<?php }?>