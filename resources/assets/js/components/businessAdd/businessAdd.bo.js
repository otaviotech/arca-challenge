function BusinessAddBusiness ($http) {
  console.log('BusinessAddBusiness');
   var REP = new BusinessAddRepository($http);

   this.saveBusiness = function(business, form){
      // validates and format JSON if needed and submit via repository.
      // var prom = REP.saveBusiness(business);
      form.submit();

   };

   return this;
}
