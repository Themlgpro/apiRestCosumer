var app =angular.module('pagination', [])
  .controller('tablaEstudiantes', ['$scope','$http',
    function($scope, $http) {
      $scope.currentPage = 0;
      $scope.pageSize = 5;
      $scope.pages = [];
      $scope.estudiantes = [];

      var url = 'http://localhost/apirestMongo/public/restMongo.php/listar';
  
      $http.get(url).success(function(respuesta){
        $scope.estudiantes = respuesta;
        console.log($scope.estudiantes);
      })

      $scope.configPages = function() {
        $scope.pages.length = 0;
        var ini = $scope.currentPage - 4;
        var fin = $scope.currentPage + 5;
        if (ini < 1) {
          ini = 1;
          if (Math.ceil($scope.estudiantes.length / $scope.pageSize) > 10)
            fin = 10;
          else
            fin = Math.ceil($scope.estudiantes.length / $scope.pageSize);
        } else {
          if (ini >= Math.ceil($scope.estudiantes.length / $scope.pageSize) - 10) {
            ini = Math.ceil($scope.estudiantes.length / $scope.pageSize) - 10;
            fin = Math.ceil($scope.estudiantes.length / $scope.pageSize);
          }
        }
        if (ini < 1) ini = 1;
        for (var i = ini; i <= fin; i++) {
          $scope.pages.push({
            no: i
          });
        }

        if ($scope.currentPage >= $scope.pages.length)
          $scope.currentPage = $scope.pages.length - 1;
      };

      $scope.setPage = function(index) {
        $scope.currentPage = index - 1;
      };
    }
  ])

.filter('startFromGrid', function() {
  return function(input, start) {
    start = +start;
    return input.slice(start);
  }
});