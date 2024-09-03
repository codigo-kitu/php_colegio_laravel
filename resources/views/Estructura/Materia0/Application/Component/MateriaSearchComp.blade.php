<div id="div_materia_form_buscar" class="div_buscar_general">
		
		<div class="tabs_general">


		</div>		

	<!-- hx-target="#divCompGlobalTablamateria" -->

	<form   hx-post="http://localhost:3000/colegio_relaciones/estructura/materia0/seleccionar"
			
            hx-target="#divModal_materia_form_general" 
			hx-ext='json-enc'
            hx-swap="innerHTML">
        <div>
            <label>Id</label>
            <input type="text" name="id" value="1">
			@csrf
        </div>

        <button class="btn">Traer Materias</button>
    </form>
</div> 