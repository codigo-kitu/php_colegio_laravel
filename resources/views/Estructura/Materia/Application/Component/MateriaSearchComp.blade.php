<div id="div_materia_form_buscar" class="div_buscar_general">
		
		<div class="tabs_general">


		</div>

		
	<!-- hx-target="#divCompGlobalTablamateria" -->

	<form   hx-post="{{ $url_base }}/todos"
			hx-vals='js:{pagination: materiaWebControl1.getPagination()}'
            hx-target="#divCompGlobalTablamateria" 
			hx-ext='json-enc'
            hx-swap="innerHTML"
			hx-on::before-request="materiaWebControl1.getTodosDatosBefore()">
        <div>
			@csrf
        </div>

        <button id="traer_todos" name="traer_todos" class="btn btn-primary">Traer Todos</button>
		
    </form>
	
	<br>
	
</div>
