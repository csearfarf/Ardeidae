pragma solidity 0.5.5;
pragma experimental ABIEncoderV2;
contract MuqiProducts {
    
    event insertion(uint256 meat_type,uint meat_category,string cr_address,string uid,uint256 odor,uint256 texture,uint256 appearance,string lab_test,uint256 batch_date,uint256 expire,string status,uint256 id);// insertion with specific data
    event deletion(string contract_address); // deletion true specific name
    event update(string uid,uint256 odor,uint256 texture, uint256 appearance,string lab_test,string status); // updating true specific name
    
    struct Products{
        uint256 meat_type;//(1-chicken,2- meat,3-beef)
        uint256 meat_category;//(1-raw,2-processed)
        string cr_address; //company id where belong the product is
        string uid;//inspector id/ inspector specific address
        uint256 odor; //(1-4)
        uint256 texture; //(1-4)
        uint256 appearance; //(1-4);
        string lab_test; //(pending/passed/condemned)
        uint256 batch_date;//production data
        uint256 expiration;
        string status;//(pending/passed/condemned)
        uint256 id; //specific id of each data from central database to eth network
    }

    Products[] public products;
    uint256 private totalProducts;
    uint256 private iodor;
    uint256 private itexture;
    uint256 private iappearance;
    string private ilabtest;
    string private istatus;
    string private iuid;
    uint256 private inspectiondate;
    
    constructor() public {
       totalProducts = 0;
       iodor=0;
       itexture=0;
       iappearance=0;
       ilabtest="Pending";
       istatus="Pending";
       iuid="0";
    }
   //web3Function
   
   // insertion
   function setProducts(uint256 _meat_type,uint256 _meat_category, string memory _cr_address,uint256 _batch,uint256 _expire) public returns (bool success){
            success=false;
            totalProducts++;
            Products memory newProducts = Products(_meat_type,_meat_category,_cr_address,iuid,iodor,itexture,iappearance,ilabtest,_batch,_expire,istatus,totalProducts);
            products.push(newProducts);
            emit insertion(_meat_type,_meat_category,_cr_address,iuid,iodor,itexture,iappearance,ilabtest,_batch,_expire,istatus,totalProducts);
            success=true;
            return (success);
       
   }
   
   
   // update specific company details
   function updateSpecific(uint256 _specificid,string memory _uid,uint256 _odor, uint256 _texture,uint256 _appearance,string memory _labtest,string memory _status)public returns (bool success){
       
       for(uint i =0; i< totalProducts; i++){
           if(compareInt(products[i].id ,_specificid)){
              products[i].uid = _uid; 
              products[i].odor = _odor;
              products[i].texture = _texture;
              products[i].appearance = _appearance;
              products[i].lab_test = _labtest;
              products[i].status = _status;
              emit update(_uid,_odor,_texture,_appearance,_labtest,_status);
              return (success=true);
           }
       }
       return (success=false);
   }
   
   // getting specific products via id
    function getSpecific(uint256 _specificid) public view returns(uint256 meat_type,uint256 meat_category,string memory cr_address,
    uint256  appearance,string memory lab_test,uint256 batch_date,uint256 expiration,string memory status,uint256 id){
      
              for (uint i = 0; i < totalProducts; i++) {
                  Products storage sproducts = products[i];
                  if(compareInt(sproducts.id,_specificid)){
                      meat_type=sproducts.meat_type;
                      meat_category=sproducts.meat_category;
                      cr_address=sproducts.cr_address;
                      appearance=sproducts.appearance;
                      lab_test=sproducts.lab_test;
                      batch_date=sproducts.batch_date;
                      expiration=sproducts.expiration;
                      status=sproducts.status;
                      id=sproducts.id;
                      
              return (meat_type,meat_category,cr_address,appearance,lab_test,batch_date,expiration,status,id);
                  }
              }
   }
   
    function getAllProducts() public view returns(uint256[] memory meat_type,uint256[] memory meat_category,string[] memory cr_address,string[] memory uid,uint256[] memory odor,uint256[] memory texture,
    uint256[] memory appearance,string[] memory lab_test,uint256[] memory batch_date,uint256[] memory expiration,string[] memory status){
       meat_type= new  uint256[](totalProducts);
       meat_category= new  uint256[](totalProducts);
       cr_address= new  string[](totalProducts);
       uid= new  string[](totalProducts);
       odor= new  uint256[](totalProducts);
       texture= new  uint256[](totalProducts);
       appearance= new  uint256[](totalProducts);
       lab_test= new  string[](totalProducts);
       batch_date= new  uint256[](totalProducts);
       expiration= new  uint256[](totalProducts);
       status= new  string[](totalProducts);
      
              for (uint i = 0; i < totalProducts; i++) {
                  Products storage sproducts = products[i];
                      meat_type[i]=sproducts.meat_type;
                      meat_category[i]=sproducts.meat_category;
                      cr_address[i]=sproducts.cr_address;
                      uid[i]=sproducts.uid;
                      odor[i]=sproducts.odor;
                      texture[i]=sproducts.texture;
                      appearance[i]=sproducts.appearance;
                      lab_test[i]=sproducts.lab_test;
                      batch_date[i]=sproducts.batch_date;
                      expiration[i]=sproducts.expiration;
                      status[i]=sproducts.status;
              }
              
              return (meat_type,meat_category,cr_address,uid,odor,texture,appearance,lab_test,batch_date,expiration,status);
                 
   }
   

   
    function checkIfExist(uint256 _id) public view returns(bool status){
            status=false;
        for(uint i =0; i< totalProducts; i++){
           if(compareInt(products[i].id, _id)){
                  status=true;
                  return (status);
           }
       }
       return (status); // if not found on contract
   }  
  
   
   function compareStrings (string memory a, string memory b)  internal pure returns (bool){
        return (keccak256(abi.encode(a)) == keccak256(abi.encode(b)));
   }
   
     function compareInt (uint256 a, uint256  b)  internal pure returns (bool){
        return (keccak256(abi.encode(a)) == keccak256(abi.encode(b)));
   }
   
   function getTotalProducts() public view returns (uint256 counting){
       counting = products.length;
      return (counting);
   }
   
  

}
    