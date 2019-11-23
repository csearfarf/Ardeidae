const MuqiCompany = artifacts.require("MuqiCompany");

module.exports = function(deployer) {
  deployer.deploy(MuqiCompany);
};
