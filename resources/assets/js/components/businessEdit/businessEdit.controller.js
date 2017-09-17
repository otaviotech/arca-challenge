angular
.module('app')
.controller('BusinessEditController', BusinessEditController);

BusinessEditController.$inject = ['$scope', '$http', '$timeout'];

function BusinessEditController($scope, $http, $timeout) {
	'use strict';
	var BO = new BusinessEditBusiness($http);

	$scope.saveBusiness = function(business){
		var _business = angular.copy(business);
		_business['categories'] = JSON.stringify($('#select-categories').val());
		var businessForm = document.getElementById('businessForm');
		BO.saveBusiness(_business, businessForm);
	}

	$scope.destroyBusiness = function(business){
		var _business = angular.copy(business);
		BO.destroyBusiness(_business);
	};


	function init(){
		$timeout(function () {

			$http.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

			var categories = JSON.parse($scope.business.categories);
			var val = categories.map(function(c){
				return c.id;
			});
			var b = $('#select-categories').select2({
				data: categories,
				val: val
			});
		}, 500);
	}



	init();

}
