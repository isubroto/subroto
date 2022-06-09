var finalEnlishToBanglaNumber={'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
 
String.prototype.getDigitBanglaFromEnglish = function() {
    var retStr = this;
    for (var x in finalEnlishToBanglaNumber) {
         retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
    }
    return retStr;
};
  
async function async_call(func){
  const result = await func;
  return result;
}
 async function sleep(time){
  await new Promise(r=> setTimeout(r,time))

 }
  function addToDetails(array)
  {
    var loop='';
    var istotal=true;
    var total=0;
    var footer=null;
    if(array.length<=0)
    {
      $("#memodetails").html(" <h3 class='mt-5 d-flex justify-content-center'>কোন বিবরণ পাওয়া যায় নি।</h3>");
      $("#buttonvisible").html('<button type="button" id="draftmemo" class=" btn btn-lite-red text-white mx-3 mr-1" disabled><i class="fad fa-save"></i> অসমাপ্ত রাখুন</button><button type="button" id="complitememo" class=" btn btn-primary mx-3" disabled><i class="fad fa-check-double mr-1"></i> সম্পন্ন</button>')
      $("#draftmemo").prop("disabled",true);
      $("#complitememo").prop("disabled",true);
    }
    else if(array.length>0){
      for(var i=0;i<array.length;i++)
      {
        if(array[i].Baseprice == null)
        {
          istotal=false;
          loop += "<div class='col-12'><div class='row p-2 pt-3'><div class='col-2 d-flex justify-content-center mt-1'><h6 class='tools' data-toggle='tooltip' title='"+array[i].Title.toString().getDigitBanglaFromEnglish()+"'><strong>"+array[i].Quantity.getDigitBanglaFromEnglish()+" পিছ</strong></h6></div><div class='col-4 d-flex justify-content-center mt-1'><h6><strong>"+array[i].Length.getDigitBanglaFromEnglish()+"x"+array[i].Thikness.getDigitBanglaFromEnglish()+"&nbsp;&nbsp;"+array[i].Company+"</strong></h6></div><div class='col-2 d-flex justify-content-center mt-1'><h6><strong></strong></h6></div><div class='col-3 d-flex justify-content-center mt-1'><h6><strong></strong></h6> </div> <div class='col-1 d-flex justify-content-center'><span class='d-inline-block btntool' tabindex='0' data-toggle='tooltip' title='Edit'><button type='button' onclick="+"Edit('"+array[i].Id+"')"+" class='btn btn-sm btn-outline-primary'><i class='fad fa-edit'></i></button></span><span class='d-inline-block btntool' tabindex='0' data-toggle='tooltip' title='Delete'><button type='button'  onclick="+"Delete('"+array[i].Id+"')"+" class='btn btn-sm btn-outline-danger'><i class='fad fa-trash-alt'></i></button></span></div></div></div>";
          $(".tools").tooltip({
            placement : 'left'
        });
        $(".btntool").tooltip({
            placement : 'top'
        });
        }
        else if(array[i].Baseprice != null)
        {
          loop += "<div class='col-12'><div class='row p-2 pt-3'><div class='col-2 d-flex justify-content-center mt-1'><h6 class='tools' data-toggle='tooltip' title='"+array[i].Title.toString().getDigitBanglaFromEnglish()+"'><strong>"+array[i].Quantity.getDigitBanglaFromEnglish()+" পিছ</strong></h6></div><div class='col-4 d-flex justify-content-center mt-1'><h6><strong>"+array[i].Length.getDigitBanglaFromEnglish()+"x"+array[i].Thikness.getDigitBanglaFromEnglish()+"&nbsp;&nbsp;"+array[i].Company+"</strong></h6></div><div class='col-2 d-flex justify-content-center mt-1'><h6><strong>"+array[i].Baseprice.getDigitBanglaFromEnglish()+"</strong></h6></div><div class='col-3 d-flex justify-content-center mt-1'><h6><strong>"+array[i].Totalprice.getDigitBanglaFromEnglish()+"  ৳</strong></h6> </div> <div class='col-1 d-flex justify-content-center'><span class='d-inline-block btntool' tabindex='0' data-toggle='tooltip' title='Edit'><button type='button' onclick="+"Edit('"+array[i].Id+"')"+" class='btn btn-sm btn-outline-primary'><i class='fad fa-edit'></i></button></span><span class='d-inline-block btntool' tabindex='0' data-toggle='tooltip' title='Delete'><button type='button'  onclick="+"Delete('"+array[i].Id+"')"+" class='btn btn-sm btn-outline-danger'><i class='fad fa-trash-alt'></i></button></span></div></div></div>";
          $(".tools").tooltip({
            placement : 'left'
        });
        $(".btntool").tooltip({
            placement : 'top'
        });
        }
      }
      

    if(istotal)
    {
      loop += "<div class='col-12'><div class='row p-2 pt-3 d-flex justify-content-end'><div class='col-3 d-flex justify-content-center mt-1'><h6><strong>লেবার</strong></h6></div><div class='col-6 d-flex justify-content-center'><input type='number' name='laberinput' id='laberinput' class='form-control'></div><div class='col-1 d-flex justify-content-center'><button type='button' class='btn btn-sm btn-outline-success' id='labercost'><i class='fad fa-check-circle'></i> </button></div></div>"
      for(var i=0;i<array.length;i++)
      {
        total += parseInt(array[i].Totalprice);
      }
      footer="<div class='card-footer alert-danger d-flex justify-content-end'><div class='col-12 text-danger' id='footertotal'><div class='row p-2 d-flex justify-content-end'><div class='col-4 d-flex justify-content-center mt-1'><h6><strong>মোট = </strong></h6></div><div class='col-3 d-flex justify-content-center' id='totalprice'><h6><strong>"+(total.toString()).getDigitBanglaFromEnglish()+"  ৳</strong></h6></div></div></div></div>";
      $("#buttonvisible").html('<button type="button" id="draftmemo" class=" btn btn-lite-red text-white mx-3" ><i class="fad fa-save mr-1"></i> অসমাপ্ত রাখুন</button><button type="button" id="Advancedmemo" class="btn btn-custom-indigo mx-3" ><i class="fad fa-cog mr-1"></i>দ্রুত দর বসান</button><button type="button" id="complitememo" class=" btn btn-primary mx-3" ><i class="fad fa-check-double mr-1"></i> সম্পন্ন</button>')  
      $("#complitememo").prop('disabled', false);
      $("#labercost").prop('disabled', false);
      $("#draftmemo").prop('disabled', false);
      $(".tools").tooltip({
        placement : 'left'
    });
    }
    else if(!istotal)
    {
      $("#complitememo").prop('disabled', true);
      $("#labercost").prop('disabled', true);
      $("#draftmemo").prop('disabled', false);
      loop += "<div class='col-12'><div class='row p-2 pt-3 d-flex justify-content-end'><div class='col-3 d-flex justify-content-center mt-1'><h6><strong>লেবার</strong></h6></div><div class='col-6 d-flex justify-content-center'><input type='number' name='laberinput' id='laberinput' class='form-control'></div><div class='col-1 d-flex justify-content-center'><button type='button' class='btn btn-sm btn-outline-success' id='labercost' disabled><i class='fad fa-check-circle'></i> </button></div></div>";
      footer="<div class='card-footer alert-danger d-flex justify-content-end'><div class='col-12 text-danger' id='footertotal'><div class='row p-2 d-flex justify-content-end'><div class='col-4 d-flex justify-content-center mt-1'><h6><strong>মোট = </strong></h6></div><div class='col-3 d-flex justify-content-center' id='totalprice'><h6><strong></strong></h6></div></div></div></div>";
      $("#buttonvisible").html('<button type="button" id="draftmemo" class=" btn btn-lite-red text-white mx-3" ><i class="fad fa-save mr-1"></i> অসমাপ্ত রাখুন</button><button type="button" id="Advancedmemo" class="btn btn-custom-indigo mx-3" ><i class="fad fa-cog mr-1"></i>দ্রুত দর বসান</button><button type="button" id="complitememo" class=" btn btn-primary mx-3" disabled><i class="fad fa-check-double mr-1"></i> সম্পন্ন</button>')  
      $(".tools").tooltip({
        placement : 'left'
    });
    }

      $("#memodetails").html(" <div class='card mt-3'><div class='card-header bg-danger text-white'><div class='row pt-2'><div class='col-2 d-flex justify-content-center'><h6><strong>পরিমাণ</strong></h6></div><div class='col-4 d-flex justify-content-center'><h6><strong>বিবরণ</strong></h6></div><div class='col-2 d-flex justify-content-center'><h6><strong>দর</strong></h6></div><div class='col-3 d-flex justify-content-center'><h6><strong>টাকা</strong></h6></div></div></div><div class='card-body'><div class='row d-flex justify-content-around' ><div class='col-11'></div> "+loop+footer);
      $(".tools").tooltip({
        placement : 'left'
    });
    }
    $(".tools").tooltip({
      placement : 'left'
  });
  }
  
   function totalWithLaber(array){
    var totalval=true;
    var totalprice=0;
    var laber=0;
    for( var i=0;i<array.length;i++){
      if(array[i].Baseprice==null)
      {
        totalval=false;
        $("#totalprice").html('');
      }
      else
      {
        continue;
      }
    }
    if(totalval)
    {
      for(var i =0;i<array.length;i++)
    {
      totalprice += parseInt(array[i].Totalprice);
    }
   
  if($("#laberinput").val()!='' && $("#laberinput").val()!=null){
      laber= parseInt($("#laberinput").val());
      $("#totalprice").html("<h6><b><strong>"+(totalprice+laber).toString().getDigitBanglaFromEnglish()+" ৳</strong></b></h6>");
    }
    else  if($("#laberinput").val()=='' || $("#laberinput").val()==null)
    {
      $("#totalprice").html("<h6><b><strong>"+totalprice.toString().getDigitBanglaFromEnglish()+" ৳</strong></b></h6>");
    }
    }
    }
  
    function addDetailstodb(id,array){
      $.post("draftmemooperation.php",{func:"getcustomerdraftmemo",customerId:id},"JSON").done(function(data){
        $.each(array,function(){
          var array1=this;
          if(array1.Baseprice==null||array1.Baseprice==""){
            $.post("draftmemooperation.php",{func:"addcustomerdraftmemodetails",DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:null},"JSON").done(function(data1){
            }).fail(function(data3){
            });
          }
          else if(array1.Baseprice!=null){
            $.post("draftmemooperation.php",{func:"addcustomerdraftmemodetails",DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:array1.Baseprice},"JSON").done(function(data1){
            });
          }
        })
      });
    }
    function UpdateDetailstodb(id,array){
      $.post("draftmemooperation.php",{func:"getcustomerdraftmemo",customerId:id},"JSON").done(function(data){
        $.each(array,function(){
          var array1=this;
          $.post("draftmemooperation.php",{func:"CheckMemoDetails",id:array1.Id},"JSON").done(function(data1){
            if(data1==1){
              if(array1.Baseprice==null){
                $.post("draftmemooperation.php",{func:"updatecustomerdraftmemodetails",D_id:array1.Id,DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:0},"JSON").done(function(data2){
                });
              }
              else if(array1.Baseprice!=null){
                $.post("draftmemooperation.php",{func:"updatecustomerdraftmemodetails",D_id:array1.Id,DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:array1.Baseprice},"JSON").done(function(data2){
                });
              }
            }
            else if(data1==0){
              if(array1.Baseprice==null){
                $.post("draftmemooperation.php",{func:"addcustomerdraftmemodetails",DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:0},"JSON").done(function(data2){
                });
              }
              else if(array1.Baseprice!=null){
                $.post("draftmemooperation.php",{func:"addcustomerdraftmemodetails",DM_Id:data,C_Id:array1.CompanyId,T_Id:array1.ThiknessId,I_Id:array1.LengthId,Quantity:array1.Quantity,baseprice:array1.Baseprice},"JSON").done(function(data2){
                });
              }
            }
          });
        })
      })
    }
    function Loaded(){
      var preloader=document.getElementById("loader");
      preloader.style.display="none";
    }
    function refresh() {
      window.location.reload();
  }
  $(document).ready(function(){setTimeout(function() {
    $('.page-loader-wrapper').fadeOut();
    $('.counter').counterUp({
      delay: 10,
      time: 1000
  });
}, 1100);})
/*
** This script helps you to convert your Number to  the Bengali word representation.
** Developed By: Rahul Baruri<rahulbaruri1@gmail.com>
** Created At: 26th August 2017
 */

/**
 * This method receives a number as parameter and returns it's bengali word representation
 */
