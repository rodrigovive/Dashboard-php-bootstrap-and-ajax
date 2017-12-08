<?php
echo ' <nav class="navbar navbar-default navbar-fixed-top">
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
            <a href="">Dashboard</a>
          </li>
          <li class="active">
            <a href="">Usuarios</a>
          </li>
          <li>
            <a href="">Roles</a>
          </li>
          <li>
            <a href="">Politicas</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Bienvenido ';
          echo $_SESSION['user'];
          echo ' </a>
          </li>
          <li>
            <a href="login.html">Logout</a>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>';
