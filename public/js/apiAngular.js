var app = angular.module('peticion',[])

app.controller('posting',function($scope, $http){
	console.log('Hola');
	$scope.postear = function(){
		console.log('into');
		var data =
		{
			'nombre': $scope.nombre,
			'edad': $scope.edad,
			'id': $scope.codigo,
			'materias': ['WWW','CALCULO'],
			'estado': true
		}

		$http.post('http://localhost/apirestMongo/public/restMongo.php/crear', data).then(function(response) {
          console.log(response.status);
        });
	}
});