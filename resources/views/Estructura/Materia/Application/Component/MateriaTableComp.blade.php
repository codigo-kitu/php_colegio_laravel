<div id="divCompGlobalTablamateria">
	
	<div id="div_materia_tabla_general">					
		
		<input type="hidden" id="materia_tabla_general_length" name="materia_tabla_general_length" 
				value="{{ count($materia_parametro_view->materias) }}" />
		
		<table id="materia_tabla_general" 
				class="table table-striped table-bordered">
			
			<thead>
				<tr class="table-primary">					
					<th style="{{ $style_id_column }}">Id</th>
					<th style="display:none;">Created At</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th style="text-align:center;">Activo</th>
				</tr>
			</thead>
			
			<tbody>																
				
				@foreach ($materia_parametro_view->materias as $materia1)

					<tr class="">
						
						<td data-label="Id" style="{{ $style_id_column }}"> 							
							<form>
								
								@csrf			
								
								<input 	type="hidden" id="id_table" name="id_table" value="{{ $materia1->id }}" />								
								{{ $materia1->id }}								
								
								<button class="btn btn-primary"
										hx-post="{{ $url_base }}/seleccionar"			
										hx-target="#divModal_materia_form_general" 
										hx-ext='json-enc'
										hx-swap="outerHTML"
										hx-on::after-request="materiaWebControl1.seleccionarBefore()">
								
										Sel
								</button>
								
							</form>							
						</td>
						<td data-label="Created At" style="display:none;"> {{ $materia1->created_at }} </td>
						<td data-label="Codigo"> {{ $materia1->codigo }} </td>
						<td data-label="Nombre"> {{ $materia1->nombre }} </td>
						<td data-label="Activo" style="text-align:center;"> @php echo(App\Lib\Base\Client\Util\FuncionGeneralClient::GetLabelBoolean($materia1->activo)); @endphp </td>
					
					</tr>

				@endforeach

			</tbody>
			
		</table>
	</div>
	
	
	<div id="div_materia_pagination_form_general">
		
		<form id="materia_pagination_form_general" class="pagination_form_general">							
			
			@csrf
			
			<button type="button" id="anteriores_button" name="anteriores_button" 
					value="Anteriores" class="btn btn-primary"
					hx-post="{{ $url_base }}/{{ $accion_busqueda }}"
					hx-vals='js:{pagination: materiaWebControl1.getPagination()}'
					hx-target="#divCompGlobalTablamateria"
					hx-ext='json-enc'
					hx-swap="innerHTML"
					hx-on::before-request="materiaWebControl1.anterioresBefore()">
				<fai icon="fa-solid fa-arrow-alt-circle-left" />
				Anteriores
			</button>
			
			<button type="button" id="siguientes_button" name="siguientes_button" 
					value="Siguientes" class="btn btn-primary"
					hx-post="{{ $url_base }}/{{ $accion_busqueda }}"
					hx-vals='js:{pagination: materiaWebControl1.getPagination()}'
					hx-target="#divCompGlobalTablamateria"
					hx-ext='json-enc'
					hx-swap="innerHTML"
					hx-on::before-request="materiaWebControl1.siguientesBefore()">
				<fai icon="fa-solid fa-arrow-alt-circle-right" />
				Siguientes
			</button>
			
		</form>
		
		<br>
		
	</div>
	
	<div id="div_materia_actions_general">
	
		<form id="materia_actions_general" class="actions_form_general">			
			
			@csrf
			
			<button type="button" id="home_button" name="home_button"
					value="Home" class="btn btn-primary">
				<fai icon="fa-solid fa-home" />
				Home
			</button>
			
			<button type="button" id="atras_button" name="atras_button" 
					value="Atras" class="btn btn-primary">
				<fai icon="fa-solid fa-arrow-circle-left" />
				Atras
			</button>
											
			<button type="button" id="recargar_button" name="recargar_button"
					value="Recargar" class="btn btn-primary"
					hx-post="{{ $url_base }}/todos"
					hx-vals='js:{pagination: materiaWebControl1.getPagination()}'
					hx-target="#divCompGlobalTablamateria"
					hx-ext='json-enc'
					hx-swap="innerHTML"
					hx-on::before-request="materiaWebControl1.getTodosDatosBefore()">
					
				<fai icon="fa-solid fa-sync" />
				Recargar
			</button>
				
			<button type="button" id="nuevo_preparar_button" name="nuevo_preparar_button" 
					value="Nuevo" class="btn btn-primary"
					data-toggle="modal" data-target="#divModal_materia_form_general"
					hx-post="{{ $url_base }}/nuevo_preparar"			
					hx-target="#divModal_materia_form_general" 
					hx-ext='json-enc'
					hx-swap="outerHTML"
					hx-on::after-request="materiaWebControl1.nuevoPrepararBefore()">
				<fai icon="fa-solid fa-plus-circle" />
				Nuevo
			</button>
			
		</form>
	</div>		
</div>
