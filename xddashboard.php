<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	
	<!-- <link rel="stylesheet" href="public/css/style.css"> -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	    crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</head>

<body>
	<p>
		<?php echo $_SESSION['user']; ?>
	</p>

	<section id="header">
		<div class="container">
            <div class="row">
				<div class="col-md-12">
				<nav class="nav bg-secundary">
					<a class="nav-link active" href="#">Usuarios</a>
					<a class="nav-link" href="#">Roles</a>
					<a class="nav-link" href="#">Permisos</a>
					<a class="nav-link disabled" href="#">Disabled</a>
			  	</nav>
				</div>
            </div>
        </div>
	</section>

	<section id="sidebar">
		<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<a href="#">
							Start Bootstrap
						</a>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
					<li>
						<a href="#">Shortcuts</a>
					</li>
					<li>
						<a href="#">Overview</a>
					</li>
					<li>
						<a href="#">Events</a>
					</li>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Services</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
			</div>
	</section>
	<section id="table">
		<div class="container">
			<table class="table table-bordered table-hover table-striped" style="background: rgba(17,246,238,0.54)">
				<thead>
					<tr class="active success">
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Password</th>
						<th>Rol</th>
						<!-- <th>Politica</th> -->
					</tr>
				</thead>
				<tbody id="list-user">
				</tbody>
			</table>
		</div>
	</section>
	<section></section>



	<script src="public/js/dashboard.js"></script>
</body>

</html>