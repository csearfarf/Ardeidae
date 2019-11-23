var abiProducts=[
    {
      "constant": true,
      "inputs": [
        {
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "products",
      "outputs": [
        {
          "name": "meat_type",
          "type": "uint256"
        },
        {
          "name": "meat_category",
          "type": "uint256"
        },
        {
          "name": "cr_address",
          "type": "string"
        },
        {
          "name": "uid",
          "type": "string"
        },
        {
          "name": "odor",
          "type": "uint256"
        },
        {
          "name": "texture",
          "type": "uint256"
        },
        {
          "name": "appearance",
          "type": "uint256"
        },
        {
          "name": "lab_test",
          "type": "string"
        },
        {
          "name": "batch_date",
          "type": "uint256"
        },
        {
          "name": "expiration",
          "type": "uint256"
        },
        {
          "name": "status",
          "type": "string"
        },
        {
          "name": "id",
          "type": "uint256"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    },
    {
      "inputs": [],
      "payable": false,
      "stateMutability": "nonpayable",
      "type": "constructor"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "name": "meat_type",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "meat_category",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "cr_address",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "uid",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "odor",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "texture",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "appearance",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "lab_test",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "batch_date",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "expire",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "status",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "id",
          "type": "uint256"
        }
      ],
      "name": "insertion",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "name": "contract_address",
          "type": "string"
        }
      ],
      "name": "deletion",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": false,
          "name": "uid",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "odor",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "texture",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "appearance",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "lab_test",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "status",
          "type": "string"
        }
      ],
      "name": "update",
      "type": "event"
    },
    {
      "constant": false,
      "inputs": [
        {
          "name": "_meat_type",
          "type": "uint256"
        },
        {
          "name": "_meat_category",
          "type": "uint256"
        },
        {
          "name": "_cr_address",
          "type": "string"
        },
        {
          "name": "_batch",
          "type": "uint256"
        },
        {
          "name": "_expire",
          "type": "uint256"
        }
      ],
      "name": "setProducts",
      "outputs": [
        {
          "name": "success",
          "type": "bool"
        }
      ],
      "payable": false,
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "constant": false,
      "inputs": [
        {
          "name": "_specificid",
          "type": "uint256"
        },
        {
          "name": "_uid",
          "type": "string"
        },
        {
          "name": "_odor",
          "type": "uint256"
        },
        {
          "name": "_texture",
          "type": "uint256"
        },
        {
          "name": "_appearance",
          "type": "uint256"
        },
        {
          "name": "_labtest",
          "type": "string"
        },
        {
          "name": "_status",
          "type": "string"
        }
      ],
      "name": "updateSpecific",
      "outputs": [
        {
          "name": "success",
          "type": "bool"
        }
      ],
      "payable": false,
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "constant": true,
      "inputs": [
        {
          "name": "_specificid",
          "type": "uint256"
        }
      ],
      "name": "getSpecific",
      "outputs": [
        {
          "name": "meat_type",
          "type": "uint256"
        },
        {
          "name": "meat_category",
          "type": "uint256"
        },
        {
          "name": "cr_address",
          "type": "string"
        },
        {
          "name": "appearance",
          "type": "uint256"
        },
        {
          "name": "lab_test",
          "type": "string"
        },
        {
          "name": "batch_date",
          "type": "uint256"
        },
        {
          "name": "expiration",
          "type": "uint256"
        },
        {
          "name": "status",
          "type": "string"
        },
        {
          "name": "id",
          "type": "uint256"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    },
    {
      "constant": true,
      "inputs": [],
      "name": "getAllProducts",
      "outputs": [
        {
          "name": "meat_type",
          "type": "uint256[]"
        },
        {
          "name": "meat_category",
          "type": "uint256[]"
        },
        {
          "name": "cr_address",
          "type": "string[]"
        },
        {
          "name": "uid",
          "type": "string[]"
        },
        {
          "name": "odor",
          "type": "uint256[]"
        },
        {
          "name": "texture",
          "type": "uint256[]"
        },
        {
          "name": "appearance",
          "type": "uint256[]"
        },
        {
          "name": "lab_test",
          "type": "string[]"
        },
        {
          "name": "batch_date",
          "type": "uint256[]"
        },
        {
          "name": "expiration",
          "type": "uint256[]"
        },
        {
          "name": "status",
          "type": "string[]"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    },
    {
      "constant": true,
      "inputs": [
        {
          "name": "_id",
          "type": "uint256"
        }
      ],
      "name": "checkIfExist",
      "outputs": [
        {
          "name": "status",
          "type": "bool"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    },
    {
      "constant": true,
      "inputs": [],
      "name": "getTotalProducts",
      "outputs": [
        {
          "name": "counting",
          "type": "uint256"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    }
  ]