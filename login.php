<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(isset($_SESSION["loginstutas"])&&$_SESSION["loginstutas"]==1)
    {
        header("Location:home.city");
    } 
    else{  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>লগইন</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="customfonts/font.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/notiflix.min.css">

</head>
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
<body>
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>
    <div class="container position-relative">
        <div class="card position-fixed top-50 start-50 translate-middle p-4 shadow">
            <div class="card-body">
            <div class="card-img d-flex justify-content-center"><img class="logo-img-size" src="img/logo.png" alt="City Traders Logo"></div>
                <div class="title-logo d-flex justify-content-center">City Traders</div>
                <form action="%" method="post">
                    <div class="input-group mt-3">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fad fa-user-alt"></i></span></div>
                        <input type="text" name="username" placeholder="ইউজার নেম" id="username" class="form-control">
                    </div>
                    <p class="mb-3 error-message" id="uservalid" ><i class="fad fa-exclamation-circle ml-3 mr-1"></i> ইউজার নেম সঠিক নয়</p>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fad fa-fingerprint"></i></span></div>
                        <input type="password" name="password" placeholder="পাসওয়ার্ড" id="password" class="form-control" autocomplete="on">
                        <div class="input-group-append">
                            <div class="input-group-text pointer-cursore" id="passicon"><i class="fad fa-eye-slash"></i></div>
                        </div>
                    </div>
                    <p class="mb-3 error-message" id="passvalid" ><i class="fad fa-exclamation-circle ml-3 mr-1"></i> পাসওয়ার্ড সঠিক নয়</p>
                    </form>
            </div>
            <div class="card-footer">
                <div class="row"><div class="col-12 d-flex justify-content-center mb-3">
                    <button class="btn btn-outline-red mx-2" id="loginclear"><i class="fad fa-trash-alt mr-2"></i>মুছুন</button>
                    <button class="btn btn-outline-primary mx-2" id="loginsubmit"><i class="fad fa-sign-in-alt"></i> লগইন করুন</button>
                </div>
            </div>
            <h6 class="d-flex justify-content-center mt-2"><a class="link" href="#">পাসওয়ার্ড ভুলে গেছেন?</a></h6>
            </div>
        </div>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/notiflix.min.js"></script>
    <script src="js/bootbox.all.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/linq.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#passicon").click(function(){
                if($("#password").prop("type")=="text"){
                    $("#passicon .svg-inline--fa").removeClass("fa-eye");
                    $("#passicon .svg-inline--fa").addClass("fa-eye-slash");
                    $("#password").prop("type","password");
                }
                else if($("#password").prop("type")=="password"){
                    $("#paaaicon .svg-inline--fa").removeClass("fa-eye-slash");
                    $("#passicon .svg-inline--fa").addClass("fa-eye");
                    $("#password").prop("type","text");
                }
                
            });
        });
        $(document).on("click","button#loginclear",function(){
            $("#username").val("");
            if($("#password").prop("type")=="text"){
                    $("#passicon .svg-inline--fa").removeClass("fa-eye");
                    $("#passicon .svg-inline--fa").addClass("fa-eye-slash");
                    $("#password").prop("type","password");
                    $("#password").val("");
                }
                else if($("#password").prop("type")=="password"){
                    $("#password").val("");
                }
        });
        $(document).on("keypress","input[type='text']#password",function(e){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){ 
                if($("#username").val()=="" || $("#username").val()==null){
                $("#uservalid").css("display","block");
                $("#username").addClass("error-message-report");
            }
            if($("#password").val()=="" || $("#password").val()==null){
                $("#passvalid").css("display","block");
                $("#password").addClass("error-message-report");
            }
            userCheck();
            }
        });
        $(document).on("keypress","input[type='password']#password",function(e){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){ 
                if($("#username").val()=="" || $("#username").val()==null){
                $("#uservalid").css("display","block");
                $("#username").addClass("error-message-report");
            }
            if($("#password").val()=="" || $("#password").val()==null){
                $("#passvalid").css("display","block");
                $("#password").addClass("error-message-report");
            }
            userCheck();
            }
        });
        $(document).on("click","button#loginsubmit",function(){
            if($("#username").val()=="" || $("#username").val()==null){
                $("#uservalid").css("display","block");
                $("#username").addClass("error-message-report");
            }
            if($("#password").val()=="" || $("#password").val()==null){
                $("#passvalid").css("display","block");
                $("#password").addClass("error-message-report");
            }
            userCheck();
        });
        function userCheck(){
            var uname=$("#username").val();
            var password=$("#password").val();
            $.ajax({
                url:"logincheck.php",
                method:"POST",
                data:{func:"usercheck",username:uname,pass:password},
                dataType:"JSON",
                success:function(data){
                        if(data.stutas){
                            $.redirect("login.city")
                        }
                        else{
                            $("#uservalid").css("display","block");
                            $("#username").addClass("error-message-report");
                            $("#passvalid").css("display","block");
                            $("#password").addClass("error-message-report");
                            Notiflix.Notify.failure("Login Failed");
                        }
                }
            });
        }

    </script>
</body>
</html>
<?php }?>