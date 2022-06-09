function memo(){
    if($("#baseprice").val()=='')
    {
        var title=null;
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
        
        var value={LengthId:$("#itemlength").find(":selected").val(),Id:Math.random().toString(36), Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(), Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
        }
        if($("#company").find(":selected").text()=='মটকা'){
            if($("#company").find(":selected").text()=='মটকা'){
            if(parseInt($("#itemquantity").val())>25){
                if(parseInt($("#itemquantity").val())%25==0){
                    title=parseInt(parseInt($("#itemquantity").val())/25)+" বান";
                }
                else{
                    title=parseInt(parseInt($("#itemquantity").val())/25)+" বান "+ (parseInt($("#itemquantity").val())%25)+ " পিছ";
                }
            }
            else{
                title=(parseInt($("#itemquantity").val())%25)+ " পিছ";
            }
        
        var value={LengthId:$("#itemlength").find(":selected").val(),Id:Math.random().toString(36), Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text()+" মটকা", Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
    }
        orderlist.push(value);
        addToDetails(orderlist);
        $("#itemquantity").val(null);
        $("#company").prop('selectedIndex',0);
        $("#itemthikness").html('<option selected disabled>মিলি</option>');
        $("#itemlength").html('<option selected disabled>ফুট</option>');
        $("#baseprice").val(null);

    }
    }
    if($("#baseprice").val()!='')
            {
                var total=null;
                var title=null;
                if($("#company").find(":selected").text()=='মটকা'){
                    total=(parseFloat($("#baseprice").val())*parseFloat($("#itemquantity").val()));
                    total=Math.round(total);
                    if(parseInt($("#itemquantity").val())>25){
                        if(parseInt($("#itemquantity").val())%25==0){
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/25)+" বান "+ (parseInt($("#itemquantity").val())%25)+ " পিছ";
                        }
                    }
                    else{
                        title=(parseInt($("#itemquantity").val())%25)+ " পিছ";
                    }
                    var value={LengthId:$("#itemlength").find(":selected").val(),Id:Math.random().toString(36),Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text()+" মটকা",Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
                }
                else if($("#company").find(":selected").text()!='মটকা'){
                    if($("#itemlength").find(":selected").text()=='৬'){
                        if(parseInt($("#itemquantity").val())%12==0){
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান";
                        }
                        else{
                            title=parseInt(parseInt($("#itemquantity").val())/12)+" বান "+ (parseInt($("#itemquantity").val())%12)+ " পিছ";
                        }
                    }else if($("#itemlength").find(":selected").text()=='৭'){
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
                    var value={LengthId:$("#itemlength").find(":selected").val(),Id:Math.random().toString(36),Quantity : $("#itemquantity").val(),Length : $("#itemlength").find(":selected").text(),Company : $("#company").find(":selected").text(), Thikness: $("#itemthikness").find(":selected").text(),Baseprice: $("#baseprice").val(),Totalprice: total.toString(),Title:title,CompanyId: $("#company").find(":selected").val(),ThiknessId: $("#itemthikness").find(":selected").val()};
                }
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