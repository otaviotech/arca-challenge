angular
.module('app')
.controller('BusinessAddController', BusinessAddController);

BusinessAddController.$inject = ['$scope', '$http'];

function BusinessAddController($scope, $http) {
	'use strict';
	var BO = new HomeBusiness($http);
	$scope.foo = "Binded!";
	console.log('BusinessAddController');
}
