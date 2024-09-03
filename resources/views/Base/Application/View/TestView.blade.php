<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>Materia</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
    <script src="https://unpkg.com/htmx.org@1.9.11/dist/ext/json-enc.js"></script>
	
	<!-- @vite(['resources/js/Estructura/Materia/App/MateriaApp.js']) -->

</head>

<body>

	<div id="divViewGlobalmateria">
		
		<h3 class="titulo_general">
			{{ $num1 }}
		</h3>
		<hr>

		<h3 class="titulo_general">
			{{ $num2 }}
		</h3>
		<hr>
        
        <h3 class="titulo_general">
			{{ $num3 }}
		</h3>
		<hr>

		<h3 class="titulo_general">
			{{ $num4 }}
		</h3>
		<hr>
		
		<h3 class="titulo_general">
			{{ $num5 }}
		</h3>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>