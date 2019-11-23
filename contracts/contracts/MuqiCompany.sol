pragma solidity 0.5.5;
pragma experimental ABIEncoderV2;
contract MuqiCompany {
    
    event insertion(string name , string c_address, uint256 contact,string contract_address,string username,string password);// insertion with specific data
    event deletion(string contract_address); // deletion true specific name
    event update(string name,string c_address,uint256 contact,string contract_address,string username,string password); // updating true specific name
    
    struct Company{
        string name;
        string c_address;
        uint256 contact;
        string contract_address;
        string username;
        string password;
    }

    Company[] public company;
    uint256 private totalCompany;
    
    constructor() public {
       totalCompany = 0;
    }
   //web3Function
   
   // insertion
   function setCompany(string memory _name, string memory _c_address, uint256 _contact,string memory _contract_address,string memory _username,string memory _password) public returns (bool success){
            success=false;
          Company memory newCompany = Company(_name,_c_address,_contact,_contract_address,_username,_password);
            company.push(newCompany);
            emit insertion(_name,_c_address,_contact,_contract_address,_username,_password);
            totalCompany++;
            success=true;
            return (success);
       
        
       
   }
   // update specific company details
   function updateCompany(string memory _specificAddress,string memory _name,string memory _c_address, uint256 _contact,string memory _contract_address,string memory _username,string memory _password) public returns (bool success){
       //This has a problem we need loop
       
       for(uint i =0; i< totalCompany; i++){
           if(compareStrings(company[i].contract_address ,_specificAddress)){
              company[i].name = _name; 
              company[i].c_address = _c_address;
              company[i].contact = _contact;
              company[i].contract_address = _contract_address;
              company[i].username = _username;
              company[i].password = _password;
              emit update(_name,_c_address,_contact,_contract_address,_username,_password);
              return (success=true);
           }
       }
       return (success=false);
   }
   
   //delete of specific Company in contract
    function deleteCompany(string memory _specificAddress) public returns(bool success){
        require(totalCompany > 0);
        for(uint i =0; i< totalCompany; i++){
           if(compareStrings(company[i].contract_address , _specificAddress)){
              company[i] = company[totalCompany-1]; // pushing last into current arrray index which we gonna delete
              delete company[totalCompany-1]; // now deleteing last index
              totalCompany--; //total count decrease
              company.length--; // array length decrease
              //emit event
              emit deletion(_specificAddress);
              return (success=true);
           }
       }
       return (success=false);
   }
   
   //loginProcess by checking if address and password exist on our contract
   function companyLogin(string memory _username,string memory _password) public view returns(bool status,string memory name,string memory contract_address){
            status=false;
        for(uint i =0; i< totalCompany; i++){
           if(compareLogin(company[i].username, _username,company[i].password,_password)){
                  status=true;
                  return (status, company[i].name,company[i].contract_address);
           }
       }
       return (status,"false","false"); // if not found on contract
   }  
   
   
    function checkIfExist(string memory _specificAddress) public view returns(bool status){
            status=false;
        for(uint i =0; i< totalCompany; i++){
           if(compareStrings(company[i].contract_address, _specificAddress)){
                  status=true;
                  return (status);
           }
       }
       return (status); // if not found on contract
   }  
   
   
   function compareLogin (string memory a, string memory b,string memory c, string memory d)  internal pure returns (bool){
        return (keccak256(abi.encode(a)) == keccak256(abi.encode(b)) && keccak256(abi.encode(c)) == keccak256(abi.encode(d)));
   }
   
   function compareStrings (string memory a, string memory b)  internal pure returns (bool){
        return (keccak256(abi.encode(a)) == keccak256(abi.encode(b)));
   }
   
   function getTotalCompany() public view returns (uint256 counting){
       counting = company.length;
      return (counting);
   }
   
   function getAllData() public view returns(string[] memory name,string[] memory c_address,uint256[] memory contact,string[] memory contract_address,string[] memory username,string[] memory password){
       name= new  string[](totalCompany);
       c_address= new string[](totalCompany);
       contact= new uint256[](totalCompany);
       contract_address= new string[](totalCompany);
       username= new string[](totalCompany);
       password= new string[](totalCompany);
              for (uint i = 0; i < totalCompany; i++) {
                  Company storage companys = company[i];
                  
                  name[i]=companys.name;
                  c_address[i]=companys.c_address;
                  contact[i]=companys.contact;
                  contract_address[i]=companys.contract_address;
                  username[i]=companys.username;
                  password[i]=companys.password;
              }
              return (name,c_address,contact,contract_address,username,password);
   }
   
   function getSpecific(string memory _caddress) public view returns(string memory name,string memory c_address,uint256  contact,string memory contract_address,string memory username,string memory password){
  
              for (uint i = 0; i < totalCompany; i++) {
                  Company storage companys = company[i];
                  if(compareStrings(companys.contract_address,_caddress)){
                      name=companys.name;
                      c_address=companys.c_address;
                      contact=companys.contact;
                      contract_address=companys.contract_address;
                      username=companys.username;
                      password=companys.password;
                      
              return (name,c_address,contact,contract_address,username,password);
                  }
              }
   }
  

}
    