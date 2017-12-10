<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="icon" href="../../favicon.ico">-->

  <title>Admin Area | Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="public/css/hero-bootstrap-theme.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="public/css/styles.css" rel="stylesheet">
  <script src="public/js/jquery-3.2.1.min.js"></script>
  <link href="public/css/toastr.min.css" rel="stylesheet">
  <script src="public/js/toastr.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">ESIS</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li >
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="active">
            <a href="dashboard.php">Usuarios</a>
          </li>
          <li>
            <a href="roles.php">Roles</a>
          </li>
          <li>
            <a href="politicas.php">Politicas</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Bienvenido <?php echo $_SESSION['user']; ?> </a>
          </li>
          <li>
            <a href="desconectar.php">Logout</a>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1>
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            <small>Seguridad Informatica</small>
          </h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create-button">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="true">
              Crear
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li>
                <a type="button" data-toggle="modal" class="create-user" data-target="#addUser">Crear Usuario</a>
              </li>
              <li>
                <a type="button" class="create-role" data-toggle="modal" data-target="#addRole">Crear Role</a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>


  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">
          <a href="dashboard.php">Dashboard</a>
        </li>
      </ol>
    </div>
  </section>
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3 side-panel">
          <div class="list-group overview-side-panel">
            <a href="dashboard.php" class="list-group-item">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="dashboard.php" class="list-group-item active">
              <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Usuarios
              <span class="badge">62</span>
            </a>
            <a href="roles.php" class="list-group-item">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Roles
              <span class="badge">342</span>
            </a>
            <a href="politicas.php" class="list-group-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Politicas
              <span class="badge">12</span>
            </a>
          </div>

        </div>
        <!-- Side Panel -->

        <div class="col-md-9 main-panel">

          <div class="panel panel-default new-users-panel">
            <div class="panel-heading">
              <h3 class="panel-title">Usuarios Registrados</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <!-- <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Filter Pages">
                </div> -->
              </div>
              <!-- <hr> -->
              <table class="table table-striped table-hover" style="margin-top:2em;">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <!-- <th>Contraseña</th> -->
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="list-user">

                </tbody>
              </table>
            </div>
          </div>
          <!-- New Users Panel -->
          <!-- New Users Panel -->
        </div>
        <!-- Main Panel -->
      </div>
    </div>
  </section>
  <!-- Modals -->

  <!-- Add User -->
  <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog page-editor" role="document">
      <div class="modal-content">
        <form action="" id="edit-user">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <input type="hidden" class="form-control" id="id-edit" value="" name="id">
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Nombre del Usuario</label>
              <input type="text" class="form-control" id="name-edit" name="name">
            </div>
            <div class="form-group">
              <label for="email">Direccion de Correo Electronico</label>
              <input type="email" class="form-control" id="email-edit" name="email">
              <!-- <textarea type="text" class="form-control" name="editor1" id="body" rows="9"></textarea> -->
            </div>
            <!-- <div class="checkbox">
              <label for="checkbox">
                <input type="checkbox" id="checkbox"> Published
              </label>
            </div> -->
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password-edit" name="password">
            </div>


            <div class="form-group">
              <label for="rol">Rol para el usuario</label>
              <select class="form-control" id="user-roles" name="rol" placeholder="Seleccione un Rol"></select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button href="#" id="register" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Role -->
  <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog page-editor" role="document">
      <div class="modal-content">
        <form action="" id="edit-role">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <input type="hidden" class="form-control" id="id-edit" value="" name="id">

          <div class="modal-body">
            <div class="form-group">
              <label for="name">Nombre del Role</label>
              <input type="text" class="form-control" id="name-edit" name="name">
            </div>
            <div class="form-group">
              <label for="description">Descripcion del Role</label>
              <input type="text" class="form-control" id="description-edit" name="description">
              <!-- <textarea type="text" class="form-control" name="editor1" id="body" rows="9"></textarea> -->
            </div>

            <div class="form-group">
              <label for="politicas">Politicas del Rol</label>
              <select class="form-control" id="politicas-roles" name="politicas" placeholder="Seleccione un Rol" multiple></select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button href="#" id="register" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="public/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Custom JS -->
    <script src="public/js/URI.min.js"></script>
    <script src="public/js/custom.js"></script>
    <script src="public/js/dashboard.js"></script>
</body>

</html>