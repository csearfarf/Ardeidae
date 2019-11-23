
    const web3 = new Web3(Web3.currentProvider || "http://localhost:8545");//getting the rpc 
    const contractAddress = "0x6d108c0aaA50f2eb95E6215E8B3caACC3c499808";// muqicompany
    const contractAddressProd = "0xdE5c11381575Fee3c9882fF38BDc47d5D4136c61"; //muqiproducts
    const contract=new web3.eth.Contract(abi, contractAddress,{gas:1000000});
    const contractProducts=new web3.eth.Contract(abi, contractAddressProd,{gas:1000000});
    var PrimaryAccount;
    var accounts=web3.eth.getAccounts().then(function(s){
      PrimaryAccount=s[0];
    });

    var totalNum;

    var companyList=[];


     // load table
     
   
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


  contract.methods.getAllData().call({
        from:PrimaryAccount}).then(function(result){
        for (let i = 0; i < totalNum; i++) {
             var company = [
                result[0][i], // name
                result[1][i], //address
                result[2][i], //contact
                result[3][i], // contract_address
                result[4][i], //username
                "<button type='button' rel='tooltip' title='Update' class='btn btn-info btn-link btn-sm' onclick='edit("+'"'+result[3][i]+'"'+")' ><i class='material-icons'>edit</i></button><button type='button' rel='tooltip' title='Delete' class='btn btn-warning btn-link btn-sm' onclick='deleteAccount("+'"'+result[3][i]+'"'+")'><i class='material-icons'>delete</i></button>"
            ];

            dataTable.rows.add([company]).draw();
      }
  });  





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
  




});




 function createSave(){


  if($("#createForm").valid()){
    contract.methods.setCompany($("#name").val(),$("#address").val(),$("#contact").val(),$("#contractAddress").val(),$("#username").val(),$("#password").val()).send({from:PrimaryAccount},function(error, transactionHash){
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
                          'The Company Account has been successfully save',
                          'success'
                          )
                  $('#createForm')[0].reset();// reset form
                  $('#createAccount').modal('hide'); // hide



},14000); 



 
  
  }


  

 }

   function edit(id){
    var logid=id;

     contract.methods.getSpecific(id).call({
        from:PrimaryAccount}).then(function(result){
                  $('#ename').val(result.name);
                  $('#econtact').val(result.contact);
                  $('#eaddress').val(result.c_address);
                  $('#econtractAddress').val(result.contract_address);
                  $('#eusername').val(result.username);
                  $('#epassword').val(result.password);
                  $('#erepassword').val(result.password);
                  $('#eid').val(id);
                  $('#editAccount').modal('show');

  });  


               

  
 }

 function editSave(){
  if($("#editForm").valid()){
  var name = $('#ename').val();
  var address  = $('#eaddress').val();
  var username  = $('#eusername').val();
  var password  = $('#epassword').val();
  var contact  = $('#econtact').val();
  var contract_address= $('#econtractAddress').val();

  var id = $('#eid').val();

    contract.methods.updateCompany(id,name,address,contact,id,username,password).send({from:PrimaryAccount},function(error, transactionHash){
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
                          'Updated!',
                          'The Company Account has been successfully updated',
                          'success'
                          )
                  $('#editForm')[0].reset();// reset form
                  $('#editAccount').modal('hide'); // hide



},14000); 

  }
 }


 function deleteAccount(id){
 

    Swal({
          title: 'Are you sure?',
          text: "You wont able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {

           
         $.ajax({
                  url: url, // Url to which the request is send
                  type: "POST",             // Type of request to be send, called as method
                  data: {id:id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  dataType: 'json',
                  success: function(data)   // A function to be called if request succeeds
                  {
                     if(data){

                      Swal(
                              'Deleted!',
                              'The Company account has been successfully deleted',
                              'success'
                              )

                      
                      $('#accounts').DataTable().ajax.reload();//
                     
                     }         
                  }

              });

          
          }
        });

  
  
 }



