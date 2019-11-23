 
                  const web3 = new Web3(Web3.currentProvider || "http://localhost:8545");//getting the rpc 
                            
                const contractAddress = "0x6d108c0aaA50f2eb95E6215E8B3caACC3c499808";// muqicompany
                const contractAddressProd = "0xdE5c11381575Fee3c9882fF38BDc47d5D4136c61"; //muqiproducts
                const contract=new web3.eth.Contract(abi, contractAddress,{gas:1000000});
                const contractProducts=new web3.eth.Contract(abiProducts, contractAddressProd,{gas:1000000});
                var PrimaryAccount;
                var accounts=web3.eth.getAccounts().then(function(s){
                  PrimaryAccount=s[0];
                });
               

                var totalNum;
                var totalNumProd;

                var companyList=[];

                  contract.methods.getTotalCompany().call({
                      from:PrimaryAccount}).then(function(result){
                totalNum=result;
                  });
                contractProducts.methods.getTotalProducts().call({
                      from:PrimaryAccount}).then(function(result){
                totalNumProd=result;
                  });


         


$(document).ready(function () {

     
   

    $(".rfid-form").on('submit', function(e){
        e.preventDefault();
        var rfid = $(".input-rfid").val();

        
        
        if(rfid == ""){
        

            $('.text-here').html("Please scan it again").addClass('animated fadeIn')
                                    .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                                    $(this).removeClass('animated fadeIn');
                                });
        }
        else{
   var getUrl = window.location;
   const baseUrl = getUrl.origin + '/' +getUrl.pathname.split('/')[1]; 
            $.ajax({
            type: 'post',
            url: baseUrl+"/rfid/checkValue",
            data: {
                rfid:rfid
            },
            dataType: 'json',
            success:function(response) {
                 contractProducts.methods.checkIfExist(response.prod_id).call({
                      from:PrimaryAccount}).then(function(result){
                        if(result){
                             contractProducts.methods.getSpecific(response.prod_id).call({
                                  from:PrimaryAccount}).then(function(result){
                                   console.table(result)

                                     var prodName = "";
                                     switch(result.meat_type) {
                                          case "1":
                                            // code block
                                            prodName="Chicken";
                                            break;
                                          case "2":
                                            // code block
                                             prodName="Pork";
                                            break;
                                          case "3":
                                            // code block
                                             prodName="Beef";
                                            break;
                                          default:
                                            // code block
                                             prodName="Unspecified";
                                        }
                                        var prodDate=moment(parseInt(result.batch_date)).format('dddd MMMM Do YYYY');
                                        var expDate=moment(parseInt(result.expiration)).format('dddd MMMM Do YYYY');
                                        var res;
                                        if(result.status==="Pending"){
                                            res="<h5 class='text-warning'>Pending for Inspection of NMIS</h5>";
                                        }else{
                                            res="<h5 class='text-success'>NMIS Approved Product</h5>";
                                        }

                                    $('.text-here').html("Please Wait..").addClass('animated fadeIn')
                                                            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                                                            $(this).removeClass('animated fadeIn');
                                                        });
                                    $('.icon-here').empty().html("<i id='change-icon' class='fa fa-circle-o-notch fa-spin' style='font-size: 7rem;color: #555555'></i>");

                                    setTimeout(function(){
                                         
                                        $(".block-here").empty()
                                                        .html(""+
                                                        "<div class='text-center'>"+
                                                        "<h1 style='color: #555555'>"+prodName+"</h1>"+
                                                        "<h4 style='color: #555555'>Serial Number: "+rfid+"</h4>"+
                                                        "<h4 style='color: #555555'>Manufactured: "+prodDate+"</h4>"+
                                                        "<h4 style='color: #555555'>Expiration: "+expDate+"</h4>"+
                                                         res +
                                                        "</div>");
                                        setTimeout(function() {
                                            location.reload();
                                        }, 3000);
                                         
                                    }, 2000);


                              });
                        }


                  });

                }
            

            });








            
        }
    })
});
function scan_again(){
    $(".block-here").empty()
                    .html(''+
                    '<div class="text-center icon-here">'+
                        '<i class="material-icons breathing-text" style="font-size: 10rem;color: #555555">nfc</i>'+
                    '</div>'+
                    '<h3 class="text-here" style="color: #555555;">"Place the product to the sensor"</h3>'+
                    '<div class="rfid-here">'+
                    '</div>'+
                    '');

        $(".input-rfid").val("").focus();

}
