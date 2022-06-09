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
<!doctype html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
<title>মেসার্স সিটি ট্রেডার্স</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/theme1.css"/>
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

<body class="bg_background font-montserrat" style="font-family: BenSenHandwriting;">
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
                        <a href="History.city" class="nav-link lnk">
                            <i class="fad fa-history"></i>
                        ইতিহাস
                        </a>
                    </li>
                </ul>
              </div>
    </nav>
    </header>

<div id="main_content">

    <div class="page">
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix row-deck">
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-primary text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title">আজকের টিন বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="dailytinp"></span> <span class="ml-2">পিছ</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-cyan text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title h3">আজকের মটকা বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="dailymotkap"></span><span class="ml-2">পিছ</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-custom-green text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title h3">আজকের টিন বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="dailytint"></span><span class="ml-2">টাকা</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-indigo text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title h3">আজকের মটকা বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="dailymotkat"></span><span class="ml-2">টাকা</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-peru text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title h3">মাসিক টিন বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="monthtinp"></span><span class="ml-2">পিছ</span></h5>
                            </div>
                        </div>
                    </div><div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="card bg-lite-red text-white">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title h3">মাসিক টিন বিক্রি</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="d-flex justify-content-center number mb-0 font-32"><span class="counter" id="monthtint"></span><span class="ml-2">টাকা</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix row-deck">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">বিক্রি&nbsp;&nbsp;পর্যবেক্ষণ</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="row clearfix row-deck" id="row-dc">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">অসমাপ্ত ম্যামোর তালিকা</h3>
                                <div class="card-options">
                                    
                                </div>
                            </div><div class="card-body scrol">
                            <table class="table card-table mt-2">
                                <tbody id="draftmemo">
                                    
                                </tbody>
                            </table>  
                            </div>                      
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title w-100"><span>আজকের&nbsp; বিক্রি&nbsp; বিবরন(সংখায়)</span><div class="input-group">
                            <div class="input-group-prepend"><div class="input-group-text" style="border: 1px solid #c9c8c8;"><i class="fad fa-calendar-alt"></div></i></div>
                                <input style="border: 1px solid #c9c8c8;" type="text" title="তারিখ বাছুন" data-toggle='tooltip' placeholder="আজকের নতুন তৈরি করুন" class="form-control" name="datepickerhisab" id="datepickerhisab" readonly>
                                <div class="input-group-append">
                                <span class='btn float-right btn-lite-green' id='createdailyhisab'>তৈরি করুন</span>
                                </div>
                            </div></h3>
                            </div>
                            <div class="card-body scrol">
                            <table class="table card-table mt-2">
                                <tbody id="dtailsbody">
                                    
                                </tbody>
                            </table> 
                            </div>
                            <div class="card-footer">
                            <div class="input-group">
                            <div class="input-group-prepend"><div class="input-group-text" style="border: 1px solid #c9c8c8;"><i class="fad fa-calendar-alt"></div></i></div>
                                <input style="border: 1px solid #c9c8c8;" type="text" title="তারিখ বাছুন" data-toggle='tooltip' placeholder="আগের গুলো দেখুন" class="form-control" name="datepickerhisabsee" id="datepickerhisabsee" readonly>
                                <div class="input-group-append">
                                <span class='btn float-right btn-lite-green' id='seedailyhisab'>দেখুন</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">বকেয়া হিসাব(টাকায়)</h3>
                            </div>
                            <div class="card-body scrol">                              
                            <div class="table-responsive">
                                <table class="table card-table mt-2">
                                    <tbody id='bokeyahisab'>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="row clearfix">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">আজকের সকল ম্যামো</h3>
                            </div>
                            <div class="card-body scrol">
                                <div class="table-responsive">
                                    <table class="table card-table mt-2">
                                        <thead class='position-sticky'>
                                            <tr>
                                                <th>#</th>
                                                <th>কাস্টমারের নাম</th>
                                                <th>সর্বমোট টাকা</th>
                                                <th>লেবার</th>
                                                <th>ছাড়(খুচরা)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="todaymemo">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <div class="section-body">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>
            </footer>
        </div>
    </div>    
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/apexcharts.min.js"></script>
<script src="js/counterup.js"></script>
<script src="js/all.js"></script>
<script src="js/script.js"></script>
<script src="js/notiflix.min.js"></script>
<script src="js/bootbox.all.min.js"></script>
<script src="js/datepicker.min.js"></script>
<script src="js/buetDateTime.js"></script>
<script>
    
    var options = {
  chart: {
    zoom: {
    enabled: true
  },
    height: 280,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  },
};
var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
$.getJSON('homemanage.php',{func:'monttakabydate'}, function(taka) {   
        $.getJSON('homemanage.php',{func:'montpicebydate'},function(pice){
            chart.updateSeries([{
          name: 'টিন বিক্রি(টাকায়)',
          data: taka
        },{
            name: 'টিন বিক্রি(সংখ্যায়)',
          data: pice
        }
])
        })
      });
$(document).ready(function(){
    $("#datepickerhisab").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekHighlighted:"5"
});
$("#datepickerhisab").tooltip({
            placement : 'left'
        })

        $("#datepickerhisabsee").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+today",
    todayHighlight: true,
    autoclose: true,
    daysOfWeekHighlighted:"5"
});
$("#datepickerhisabsee").tooltip({
            placement : 'left'
        })

    $.post("homemanage.php",{func:'incomplitememoload'}).done(function(data){
        data=$.trim(data);
        if(data.length!=0){
            $("#draftmemo").html(data);
        }
        else if(data.length==0){
        $("#draftmemo").html("<td class='text-red mt-4'style='font-size:1.5rem;'>কোন তথ্য পাওয়া যায় নি।</td>");
    }
    })
    $.post("homemanage.php",{func:'getdetaillist'}).done(function(data){
        data=$.trim(data);
        if(data.length!=0){
            $("#dtlsbtn").css("cursor","pointer");
            $("#dtailsbody").html(data);
        }
        else if(data.length==0){
        $("#dtailsbody").html("<td class='text-red' style='font-size:1.5rem;'>কোন তথ্য পাওয়া যায় নি।</td>");
        $("#dtlsbtn").html("");
    }
    })
    $.post("homemanage.php",{func:"bokeyalist"}).done(function(data){
        $("#bokeyahisab").html(data);
    })
    $.post("homemanage.php",{func:"todaytin"}).done(function(data){
        $("#dailytinp").html(data);
    })
    $.post("homemanage.php",{func:"todaymotka"}).done(function(data){
        $("#dailymotkap").html(data);
    })
    $.post("homemanage.php",{func:"todaytintaka"}).done(function(data){
        $("#dailytint").html(data);
    })
    $.post("homemanage.php",{func:"todaymotkataka"}).done(function(data){
        $("#dailymotkat").html(data);
    })
    $.post("homemanage.php",{func:"monthtin"}).done(function(data){
        $("#monthtinp").html(data);
    })
    $.post("homemanage.php",{func:"monthtintaka"}).done(function(data){
        $("#monthtint").html(data);
    })
    $.post("homemanage.php",{func:"ajkermemo"}).done(function(data){
        $("#todaymemo").html(data);
    })
    
})
$(document).on("click","span#createdailyhisab",function(){
            if($("#datepickerhisab").val()==""||$("#datepickerhisab").val()==null){
                $("#datepickerhisab").focus();
            }
            else{
                $.redirect("dailyhisab.city",{date:$("#datepickerhisab").val(),bddate:new buetDateConverter().convert("j F, Y সন"),Weekday:new buetDateConverter().convert("l")});
            }
        })
        $(document).on("click","span#seedailyhisab",function(){
            if($("#datepickerhisabsee").val()==""||$("#datepickerhisabsee").val()==null){
                $("#datepickerhisabsee").focus();
            }
            else{
                $.redirect("oldhisab.city",{date:$("#datepickerhisabsee").val()});
            }
        })
function view(id){
    $.redirect("Invoice.city",{m:id});
}
</script>
</body>

<?php }?>
