function BusinessEditRepository($http){
	"use strict";

	this.destroyBusiness = function(id){
		return $http({
			method: 'DELETE',
			url: 'http://localhost:8000/admin/business/destroy/' + id,
		});
	};


	return this;

};
