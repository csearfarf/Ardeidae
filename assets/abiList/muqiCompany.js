var abi=[
    {
      "constant": true,
      "inputs": [
        {
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "company",
      "outputs": [
        {
          "name": "name",
          "type": "string"
        },
        {
          "name": "c_address",
          "type": "string"
        },
        {
          "name": "contact",
          "type": "uint256"
        },
        {
          "name": "contract_address",
          "type": "string"
        },
        {
          "name": "username",
          "type": "string"
        },
        {
          "name": "password",
          "type": "string"
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
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "c_address",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "contact",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "contract_address",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "username",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "password",
          "type": "string"
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
          "name": "name",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "c_address",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "contact",
          "type": "uint256"
        },
        {
          "indexed": false,
          "name": "contract_address",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "username",
          "type": "string"
        },
        {
          "indexed": false,
          "name": "password",
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
          "name": "_name",
          "type": "string"
        },
        {
          "name": "_c_address",
          "type": "string"
        },
        {
          "name": "_contact",
          "type": "uint256"
        },
        {
          "name": "_contract_address",
          "type": "string"
        },
        {
          "name": "_username",
          "type": "string"
        },
        {
          "name": "_password",
          "type": "string"
        }
      ],
      "name": "setCompany",
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
          "name": "_specificAddress",
          "type": "string"
        },
        {
          "name": "_name",
          "type": "string"
        },
        {
          "name": "_c_address",
          "type": "string"
        },
        {
          "name": "_contact",
          "type": "uint256"
        },
        {
          "name": "_contract_address",
          "type": "string"
        },
        {
          "name": "_username",
          "type": "string"
        },
        {
          "name": "_password",
          "type": "string"
        }
      ],
      "name": "updateCompany",
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
          "name": "_specificAddress",
          "type": "string"
        }
      ],
      "name": "deleteCompany",
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
          "name": "_username",
          "type": "string"
        },
        {
          "name": "_password",
          "type": "string"
        }
      ],
      "name": "companyLogin",
      "outputs": [
        {
          "name": "status",
          "type": "bool"
        },
        {
          "name": "name",
          "type": "string"
        },
        {
          "name": "contract_address",
          "type": "string"
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
          "name": "_specificAddress",
          "type": "string"
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
      "name": "getTotalCompany",
      "outputs": [
        {
          "name": "counting",
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
      "name": "getAllData",
      "outputs": [
        {
          "name": "name",
          "type": "string[]"
        },
        {
          "name": "c_address",
          "type": "string[]"
        },
        {
          "name": "contact",
          "type": "uint256[]"
        },
        {
          "name": "contract_address",
          "type": "string[]"
        },
        {
          "name": "username",
          "type": "string[]"
        },
        {
          "name": "password",
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
          "name": "_caddress",
          "type": "string"
        }
      ],
      "name": "getSpecific",
      "outputs": [
        {
          "name": "name",
          "type": "string"
        },
        {
          "name": "c_address",
          "type": "string"
        },
        {
          "name": "contact",
          "type": "uint256"
        },
        {
          "name": "contract_address",
          "type": "string"
        },
        {
          "name": "username",
          "type": "string"
        },
        {
          "name": "password",
          "type": "string"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function"
    }
  ]