<div id="divCompGlobalTablamateria">
	
	<div id="div_materia_tabla_general">					
		
		<input type="hidden" id="materia_tabla_general_length" name="materia_tabla_general_length" 
				value="{{ count($materia_parametro_view->materias) }}" />
		
		<table id="materia_tabla_general" 
				class="table_general">
			
			<thead>
				<tr class="">					
					<th>Id</th>
					<th style="display:none;">Created At</th>
					<th style="display:none;">Updated At</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th style="text-align:center;">Activo</th>
				</tr>
			</thead>
			
			<tbody>
			
			@foreach ($materia_parametro_view->materias as $materia1)

            <tr>
                
                <td data-label="Id"> {{ $materia1->id }} </td>
                <td data-label="Created At" style="display:none;"> {{ $materia1->created_at }} </td>
                <td data-label="Updated At" style="display:none;"> {{ $materia1->updated_at }} </td>
                <td data-label="Codigo"> {{ $materia1->codigo }} </td>
                <td data-label="Nombre"> {{ $materia1->nombre }} </td>
                <td data-label="Activo" style="text-align:center;"> {{ $materia1->activo }} </td>

            </tr>
			@endforeach

			</tbody>
			
		</table>
	</div>
	
	
	<div id="div_materia_pagination_form_general">
		
		<form id="materia_pagination_form_general" class="pagination_form_general">							
			
			<button type="button" id="anteriores_button" name="anteriores_button" 
					value="Anteriores" class="button_general">
				<fai icon="fa-solid fa-arrow-alt-circle-left" />
				Anteriores
			</button>
			
			<button type="button" id="siguientes_button" name="siguientes_button" 
					value="Siguientes" class="button_general">
				<fai icon="fa-solid fa-arrow-alt-circle-right" />
				Siguientes
			</button>
			
		</form>
	</div>
	
	<div id="div_materia_actions_general">
	
		<form id="materia_actions_general" class="actions_form_general">
			
			<button type="button" id="home_button" name="home_button"
					value="Home" class="button_general">
				<fai icon="fa-solid fa-home" />
				Home
			</button>
			
			<button type="button" id="atras_button" name="atras_button" 
					value="Atras" class="button_general">
				<fai icon="fa-solid fa-arrow-circle-left" />
				Atras
			</button>
			
			<button type="button" id="recargar_button" name="recargar_button" 
					value="Recargar" class="button_general">
				<fai icon="fa-solid fa-sync" />
				Recargar
			</button>
			
			<button type="button" id="nuevo_preparar_button" name="nuevo_preparar_button" 
					value="Nuevo" class="button_general">
				<fai icon="fa-solid fa-plus-circle" />
				Nuevo
			</button>
			
		</form>
	</div>		
</div>