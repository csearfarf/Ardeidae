    
                const web3 = new Web3(Web3.currentProvider || "http://localhost:8545");//getting the rpc 
                            
                const contractAddress = "0x6d108c0aaA50f2eb95E6215E8B3caACC3c499808";// muqicompany
                const contractAddressProd = "0xdE5c11381575Fee3c9882fF38BDc47d5D4136c61"; //muqiproducts
                const contract=new web3.eth.Contract(abi, contractAddress,{gas:1000000});
                const contractProducts=new web3.eth.Contract(abiProducts, contractAddressProd,{gas:1000000});
                var PrimaryAccount=$('#address').val();
               

                var totalNum;
                var totalNumProd;

                var companyList=[];

             $(document).ready(function(){



           // validate signup form on keyup and submit
             setFormValidation('#createForm');
             setFormValidation('#editForm');

             $("#createForm").submit(function(e) {
              e.preventDefault(); // [prevents submitting form to do ajax]
          });
             $("#editForm").submit(function(e) {
              e.preventDefault();// [prevents submitting form to do ajax]
          });

                function setFormValidation(id) {
                  $(id).validate({
                    highlight: function(element) {
                      $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                      $(element).closest('.datetimepicker').removeClass('has-success').addClass('has-danger');
                    },
                    success: function(element) {
                      $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                      $(element).closest('.datetimepicker').removeClass('has-danger').addClass('has-success');
                    },
                    errorPlacement: function(error, element) {
                      $(element).closest('.form-group').append(error);
                    },
                  });
                }
            


              $('.datetimepicker').datetimepicker({
                  icons: {
                      time: "fa fa-clock-o",
                      date: "fa fa-calendar",
                      up: "fa fa-chevron-up",
                      down: "fa fa-chevron-down",
                      previous: 'fa fa-chevron-left',
                      next: 'fa fa-chevron-right',
                      today: 'fa fa-screenshot',
                      clear: 'fa fa-trash',
                      close: 'fa fa-remove'
                  }
              });

                var dataTable = $('#accounts').DataTable({   
                      dom: 'Brtip',
                      lengthChange: false,
                       "responsive":true,
                       "autoWidth": false, 

                  });  

                $('#dataTable').resize();
                $('#searchBox').keyup(function(){
                  dataTable.search($(this).val()).draw();
                });

                dataTable.buttons.exportData({
                stripHtml: false
                });



                contract.methods.getTotalCompany().call({
                      from:PrimaryAccount}).then(function(result){
                totalNum=result;
                  });
                contractProducts.methods.getTotalProducts().call({
                      from:PrimaryAccount}).then(function(result){
                totalNumProd=result;
                  });


             contractProducts.methods.getAllProducts().call({
                                from:PrimaryAccount}).then(function(resultprod){
                    for (let i = 0; i < totalNumProd; i++) {
                        var name=$('#sname').val();

                                    var saddress=resultprod.cr_address[i];
                                    
                                      if(PrimaryAccount===saddress){
                                        var meat_type="";
                                    var meat_category="";
                                    var inspector="";

                                    switch(resultprod.meat_type[i]) {
                                          case "1":
                                            // code block
                                            meat_type="Chicken";
                                            break;
                                          case "2":
                                            // code block
                                             meat_type="Pork";
                                            break;
                                          case "3":
                                            // code block
                                             meat_type="Beef";
                                            break;
                                          default:
                                            // code block
                                             meat_type="Unspecified";
                                        }
                                     switch(resultprod.meat_category[i]) {
                                          case "1":
                                            // code block
                                            meat_category="Raw";
                                            break;
                                          case "2":
                                            // code block
                                             meat_category="Processed";
                                            break;
                                          default:
                                            // code block
                                             meat_category="Unspecified";
                                        }
                                     switch(resultprod.uid[i]) {
                                          case "1":
                                            // code block
                                            inspector="Paolo Escotido";
                                            break;
                                          case "2":
                                            // code block
                                             inspector="Warren De Veyra";
                                            break;
                                          case "3":
                                            // code block
                                             inspector="Ian Galaura";
                                            break;
                                          default:
                                            // code block
                                             inspector="None";
                                        }
                                        var button="<button type='button' rel='tooltip' title='View' class='btn btn-success btn-link btn-md' onclick='view("+i+")' ><i class='material-icons'>ballot</i></button>";
                                       
                                        var batch=moment(parseInt(resultprod.batch_date[i])).format('dddd MMMM Do YYYY');
                                        var expiration=moment(parseInt(resultprod.expiration[i])).format('dddd MMMM Do YYYY');
                                        var products = [
                                        name, // name
                                        batch, //batch_date
                                        expiration, //expiration_date
                                        meat_type, // Meat type
                                        meat_category,// meat category
                                        resultprod.status[i],// product status
                                        inspector,// inspected by
                                        button
                                        ];
                                        
                                    dataTable.rows.add([products]).draw();

                                      }
                                    
                  }
              });  








            });

function view(id){
  var cid=id+1;
  $('#qr').empty();
  $("#qr").prepend("<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl="+cid+"&choe=UTF-8' alt='qr code'>");
  $('#viewProduct').modal('show');
}



 function createSave(){


  if($("#createForm").valid()){



    Swal({
          title: 'Are you sure?',
          text: "You wont able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Proceed'
        }).then((result) => {
          if (result.value) {


              var dateProd=moment($("#manufacture").val(), "MM/DD/YYYY HH:mm").valueOf();
              var dateExp=moment($("#expiration").val(), "MM/DD/YYYY HH:mm").valueOf();
              
              contractProducts.methods.setProducts($("#meattype").val(),$("#meatcategory").val(),$("#address").val(),dateProd,dateExp).send({from:PrimaryAccount},function(error, transactionHash){
                  console.log(transactionHash);
                });;




              setTimeout(function(){
                  ///
                  var id;
                contract.methods.getTotalCompany().call({
                      from:PrimaryAccount}).then(function(result){
                id=result;
                });

                 Swal(
                                        'Created!',
                                        'The Company Product has been successfully save',
                                        'success'
                                        )
                                $('#createForm')[0].reset();// reset form
                                $('#createAccount').modal('hide'); // hide



              },14000); 


          
          }
        });






 
  
  }


  

 }