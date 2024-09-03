<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
	
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
    <script src="https://unpkg.com/htmx.org@1.9.11/dist/ext/json-enc.js"></script>

</head>

<body>

	<div id="divViewGlobalmateria">

		@include('Base.Application.Component.HeaderComp')
		
		<h3 class="titulo_general">
			{{ $title }}
		</h3>
		
		@include('Base.Application.Component.AlertComp')

		
		@include('Estructura.Materia0.Application.Component.MateriaSearchComp')
					
		@include('Estructura.Materia0.Application.Component.MateriaTableDataComp')
					
		@include('Estructura.Materia0.Application.Component.MateriaFormComp')
		
		<div id="div_auxiliar"></div>
		
		@include('Base.Application.Component.FooterComp')
		
	</div>

</body>

</html>