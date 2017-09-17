function BusinessEditBusiness ($http) {
   var REP = new BusinessEditRepository($http);

   this.saveBusiness = function(business, form){
      // validates and format JSON if needed and submit via repository
      // var prom = REP.saveBusiness(business);
      form.submit();
   };

   this.destroyBusiness = function(business){
      var promise = REP.destroyBusiness(business.id);

      promise.then(function(){
        window.location = '/admin';
      },function(){
        alert('Error while deleting resource.');
      });


   };

   return this;
}
