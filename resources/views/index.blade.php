<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Listado de estudiantes.</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular.js"></script>
  <script type="text/javascript" src="js/showData.js"></script>
  <script type="text/javascript" src="js/apiAngular.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body ng-app="pagination" ng-controller = "tablaEstudiantes" ng-cloack>
  <nav class="light-blue lighten-1" role="navigation">
    <center>
      <a>Estudiantes</a>
    </center>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Listado de estudiantes</h1>
      <div class="row center">
        <h5 class="header col s12 light">A continuacion una lista de todos los estudiantes registrados.</h5>
      </div>
      <div class="row center">
        <a class="waves-effect waves-light btn modal-trigger" href="#modalRegister">Registrar un nuevo estudiante</a>


      <!--<div id="modalRegister" class="modal" ng-app="peticion">
          <div class="modal-content">
            <center>
              <h2>Registrar un estudiante.</h2>
              <div>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-floating btn-large"><i class="material-icons">assignment_return</i></a> 
              </div>
            </center>
            <div class="container">
              <div class="row">
                  <div class="col m10 offset-m1 s12">
                      <h2 class="center-align">Formulario estudiante</h2>
                      <div class="row">
                          <form class="col s12" ng-controller="posting">
                              <div class="row">
                                  <div class="input-field col m6 s12">
                                      <input id="first_name" type="text" class="validate" ng-model="nombre">
                                      <label for="first_name">Nombre completo</label>
                                  </div>
                                  <div class="input-field col m6 s12">
                                      <input id="age" type="number" class="validate" ng-model="edad">
                                      <label for="age">edad</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="input-field col m6 s12">
                                      <input id="code" type="number" class="validate" required ng-model="codigo">
                                      <label for="code">Codigo</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="input-field col s12">
                                    <textarea id="signatures" class="materialize-textarea"></textarea>
                                    <label for="signatures">Materias separadas por ',' coma:</label>
                                  </div>
                              </div>
                              <div class="divider"></div>
                                <select>
                                  <option value="" disabled selected>¿Actualmente esta activo en la universidad?</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                                </select>
                                <label>Estado del estudiante.</label>
                              <div class="divider"></div>
                              <div class="row">
                                  <div class="col m12">
                                   <p class="right-align"><button class="btn btn-large waves-effect waves-light" type="button" name="action" ng-click="postear()">Registrar nuevo estudiante.</button></p>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>-->


  <div class="container" >
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4" >

          <table class = "centered" ng-init='configPages()'>
             <thead>
                <tr>
                   <th>Estudiante</th>
                   <th>Codigo</th>
                   <th>Edad</th>
                   <th>Materias</th>
                   <th>Acciones</th>
                </tr>
             </thead>
             
             <tbody>
                <tr ng-repeat="estudiante in estudiantes | startFromGrid: currentPage * pageSize | limitTo: pageSize", ng-click="seleccionarUsuario(estudiante.id)">
                   <td>@{{estudiante.nombre}}</td>
                   <td>@{{estudiante.id}}</td>
                   <td>@{{estudiante.edad}}</td>
                   <td ng-repeat="materia in estudiante.materias">@{{materia}}</td>
                   <td>
                    <a class="waves-effect waves-red btn-flat">Eliminar</a>
                    <a class="waves-effect waves-yellow btn-flat">Editar</a>
                   </td>
                </tr>
             </tbody>
          </table>
          <div class="btn-group">
            <a class="waves-effect waves-light btn" ng-disabled="currentPage == 0" ng-click="currentPage = currentPage - 1">&laquo;</a>
            <a class="waves-effect waves-light btn" ng-disabled="currentPage == page.no - 1' ng-click='setPage(page.no)" ng-repeat="page in pages">@{{page.no}}</a>
            <a class="waves-effect waves-light btn" ng-disabled="currentPage >= usuarios.length/pageSize - 1" , ng-click="currentPage = currentPage + 1">&raquo;</a>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
