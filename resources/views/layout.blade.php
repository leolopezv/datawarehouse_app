<!doctype html>
<html lang="en">
  <head>
  	<title> {{config('app.name')}} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Hqnci3Iy9MGOupUjvIttAbjZHqsJpx3qJ3WBeT5xG13bKgkdqB6w9wqNvK36+Lh5Ogm+gS0OXT+r0hLmWy3r6A==" crossorigin="anonymous" />

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">

	<style>
		body {
		background-image: url('https://t4.ftcdn.net/jpg/04/21/08/53/360_F_421085379_3MQlfQNYJ33nMk6qLk3laEQ5JWyXflxY.jpg');
		background-size: cover;
		background-position: center;
		}
	</style>


  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="/" class="logo" style="font-size: 1.7rem; line-height: 0">Adventure DataWarehouse</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li>
	              <a href="/ventas-por-territorio"><span class="fa fa-bar-chart mr-3"></span>Ventas por Territorio</a>
	          </li>
	          <li>
              <a href="/ventas-por-empleado"><span class="fa fa-pie-chart mr-3"></span>Ventas por Empleado</a>
	          </li>
	          <li>
              <a href="/ventas-por-tiempo"><span class="fa fa-line-chart mr-3"></span>Ventas por Año y Mes</a>
	          </li>
	          <li>
              <a href="/ventas-por-producto"><span class="fa fa-bar-chart mr-3"></span>Ventas por Producto</a>
	          </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5 container-fluid d-flex flex-column align-items-center">
				{{--Page content hereee --}}
        @yield('content')
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>