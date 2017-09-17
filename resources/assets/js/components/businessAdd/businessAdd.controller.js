angular
.module('app')
.controller('BusinessAddController', BusinessAddController);

BusinessAddController.$inject = ['$scope', '$http'];

function BusinessAddController($scope, $http) {
	'use strict';
	var BO = new BusinessAddBusiness($http);

	$scope.saveBusiness = function(business){
		var _business = angular.copy(business);
		_business['categories'] = JSON.stringify($('#select-categories').val());
		var businessForm = document.getElementById('businessForm');
		BO.saveBusiness(_business, businessForm);
		console.log('asdas');
	}

}
