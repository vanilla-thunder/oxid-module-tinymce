function FileSelected(file){

   var $scope = (window.opener ? window.opener : window.parent).angular.element('body').scope();
   $scope[RoxyUtils.GetUrlParam("input")] = $scope.baseurl + file.fullPath;
   $scope.closeFilemanager();
  //alert('"' + file.fullPath + "\" selected.\n To integrate with CKEditor or TinyMCE change INTEGRATION setting in conf.json. For more details see the Installation instructions at http://www.roxyfileman.com/install.");
}
function GetSelectedValue(){
  /**
  * This function is called to retrieve selected value when custom integration is used.
  * Url parameter selected will override this value.
  */
  
  return "";
}
