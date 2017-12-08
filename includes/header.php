<?php 
    echo '  <header id="header">
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
                <a type="button" data-toggle="modal" data-target="#addPage">Crear Usuario</a>
              </li>
              <li>
                <a href="#">Crear Role</a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>';
?>