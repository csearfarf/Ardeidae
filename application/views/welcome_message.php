
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="node_modules/web3/dist/web3.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Coursetro Instructor</h1>
        <h2 id="instructor"></h2>
        <label for="name" class="col-lg-2 control-label">Instructor Name</label>
        <input id="name" type="text">
        <label for="name" class="col-lg-2 control-label">Instructor Age</label>
        <input id="age" type="text">
        <button id="button">Update Instructor</button>
    </div>
    <script src="assets/dashboard/js/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/babel-polyfill/dist/polyfill.min.js"></script> 
    <script>
	var web3 = new Web3(Web3.currentProvider || "http://localhost:7545"); //getting the rpc point where in ganache is deploy
	  
      web3.eth.defaultAccount = '0x2d9F52C1c9cE98b711aAe3529963506d07c2a06f';
	   //getting the account that will be use in every transaction
	   var CoursetroContract = new web3.eth.Contract([
	{
		"constant": false,
		"inputs": [
			{
				"name": "_fName",
				"type": "string"
			},
			{
				"name": "_age",
				"type": "uint256"
			}
		],
		"name": "setInstructor",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getInstructor",
		"outputs": [
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
],'0x2d9F52C1c9cE98b711aAe3529963506d07c2a06f');

console.log(web3.eth.defaultAccount);

CoursetroContract.methods.getInstructor().call({from:'0x2d9F52C1c9cE98b711aAe3529963506d07c2a06f'},function(error, result){
            if(!error)
                {
                    $("#instructor").html(result[0]+' ('+result[1]+' years old)');
                    console.log(result);
                }
            else
                console.error(error);
		});
		

		

$("#button").click(function() {
	CoursetroContract.methods.setInstructor($("#name").val(), $("#age").val()).send({from:'0xADb5b30E14a1e566c138a627A1c74EC9BEd16695'},function(error, transactionHash){
		console.log(transactionHash);
	});;
        });
    </script>



</body>
</html>
