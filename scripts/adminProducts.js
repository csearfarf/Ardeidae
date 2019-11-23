
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

             $(document).ready(function(){

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


                                contract.methods.getSpecific(resultprod.cr_address[i]).call({
                                from:PrimaryAccount}).then(function(result){
                                  var name="";
                                  if(result.contract_address===resultprod.cr_address[i]){
                                    name=result.name;

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
                                        ];
                                        
                                    dataTable.rows.add([products]).draw();

                                  }




                                });


                                  }


                                  
                          }); 
                                  
                   

            });

