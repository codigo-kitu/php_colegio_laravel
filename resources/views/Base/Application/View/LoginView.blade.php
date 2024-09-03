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
	
	<script type="text/javascript">

	class LoginWebControl {
		
		tipo_accion;
		user;
		
		constructor() {		
			
		}
		
		cancelar() {			
			
		}
		
		getUser() {
			
			this.updateUser();
			
			return this.user;
		}
		
		updateUserActualizar() {

		}

		updateUser() {			
			
			this.user = {
				name : document.getElementById('name').value,	
				email : document.getElementById('email').value,
				password : document.getElementById('password').value
			};
		}
	}	

	var loginWebControl1 = new LoginWebControl();

	window.loginWebControl1 = loginWebControl1;

	/*
	htmx.on("htmx:configRequest", (e)=> {
		console.log('=========== AUTH CONFIG ============')
		
		var token1 = prompt("What is your Token?")

    	e.detail.headers["Authorization"] = "Bearer " + token1
  	})
	*/	

	</script>
	<!-- @vite(['resources/js/Estructura/Materia/App/MateriaApp.js']) -->

</head>

<body>

	<div id="divViewGlobalmateria">
		
		<h3 class="titulo_general">
			Login
		</h3>
		

		<form id="frmUsuarioLogin" class="">

			@csrf

			<div id="divUsuarioFormAjaxWebPart" style="height:450px;border-style: outset;">			
				<table border="0" align="center" class="border border-primary shadow-lg p-3 mb-5 bg-white rounded" style="position: relative;left: 50%; top: 35%; margin-left: -50px; margin-top: -50px;">	
					<tr>
						<td class="titulocampo">
							<label for="name" class="form-label">USUARIO</label>
						</td>
						<td>
							<input title="Usuario" id="name" name="name" type="text" class="form-control" placeholder="Usuario" value="bydan">
						</td>
					</tr>
					<tr>
						<td class="titulocampo">
							<label for="email" class="form-label">MAIL</label>
						</td>
						<td>
							<input title="Email" id="email" name="email" type="text" class="form-control" placeholder="EMail" value="bydan@hotmail.com">
						</td>
					</tr>
					<tr>
						<td class="titulocampo">
							<label for="password" class="form-label">PASSWORD</label>
						</td>
						<td>
							<input title="Password" id="password" name="password" type="password" class="form-control" placeholder="Password" value="123456">
						</td>
					</tr>	
					<tr> 
						<td></td>
						<td style="text-align: center;">

							<input type="button" id="btnRegister" name="btnRegister" 
									class="btn btn-primary" value="REGISTER" title="Haga Click Aqui"
									hx-post="http://localhost:3000/colegio_relaciones/base/login/register_create"
									hx-vals='js:{user: loginWebControl1.getUser()}'
									hx-target="#div_login_general"
									hx-ext='json-enc'
									hx-swap="innerHTML"
									hx-on::before-request="loginWebControl1.updateUserActualizar()"/>

							<input type="button" id="btnLogin" name="btnLogin" 
									class="btn btn-primary" value="LOGIN" title="Haga Click Aqui"
									hx-post="http://localhost:3000/colegio_relaciones/base/login/login"
									hx-vals='js:{user: loginWebControl1.getUser()}'
									hx-target="#div_login_general"
									hx-ext='json-enc'
									hx-swap="innerHTML"
									hx-on::before-request="loginWebControl1.updateUserActualizar()"/>

							<input type="button" id="btnLogout" name="btnLogout" 
									class="btn btn-primary" value="LOGOUT" title="Haga Click Aqui"
									hx-post="http://localhost:3000/colegio_relaciones/base/login/logout"
									hx-headers='{"Authorization": "Bearer 26|Gm3hFxjl6kZkcXEkvUHeI17D4f9TMZhnJP77rsXC00101ff9"}'
									hx-target="#div_login_general"
									hx-ext='json-enc'
									hx-swap="innerHTML" />							
						</td>					
					</tr>
				</table>
			</div>

		</form>

	</div>

	<div id="div_login_general" name="div_login_general">

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>