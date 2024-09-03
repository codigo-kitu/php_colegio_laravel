<!-- Form General -->
<div id="divModal_materia_form_general" 
		class="modal fade" tabindex="-1"
		style="display: {{ $display }}">
	
	<!-- Modal Dialog -->
	<div id="divModalContent_materia_form_general" 
		class="modal-dialog">
		
		<!-- Modal Content -->
		<div class="modal-content">
			
			<!-- Modal Header -->
			<div class="modal-header">
				
				<span id="spanCloseModal_materia_form_general"
						class="close_modal_form_general">
					<!-- &times; -->
				</span>
				<h2>
					Materia
				</h2>
				
			</div>
			
			<!-- Modal Body -->
			<div id="div_materia_form_general"
				class="modal-body">
			
				<form id="materia_form_general" 
					class="form_general">
					
					@csrf
					
					<input type="hidden" id="id" name="id" 
							value="{{ $materia->id }}" />
					
					<label id="label_id" name="label_id" for="text_id_aux" class="form-label"
							style="{{ $style_id_column }}">Id</label>				
					<input type="text" id="text_id_aux" name="text_id_aux" 
							class="form-control" style="{{ $style_id_column }}"
							value="{{ $materia->id }}" placeholder="Id" readonly/>
					
					<label for="created_at" class="form-label" style="display:none;">Created At</label>
					<input type="text" id="created_at" name="created_at" style="display:none;" 
							class="form-control" placeholder="Created At"
							value="{{ $materia->created_at }}" />
					
					<label for="updated_at" class="form-label" style="display:none;">Updated At</label>
					<input type="text" id="updated_at" name="updated_at" style="display:none;"
							class="form-control" placeholder="Updated At"
							value="{{ $materia->updated_at }}" />
							
					
					<label for="codigo" class="form-label">Codigo</label>
					<input  type="text" 
							id="codigo" name="codigo"
							class="form-control" placeholder="Codigo"
							value="{{ $materia->codigo }}" />
					
					<label for="nombre" class="form-label">Nombre</label>
					<input  type="text" 
							id="nombre" name="nombre"
							class="form-control" placeholder="Nombre"
							value="{{ $materia->nombre }}" />
					
					<label for="activo" class="form-label">Activo</label>
					<input  type="checkbox" 
							id="activo" name="activo" 
							value="true" placeholder="Activo"
							class="form-control"
							value="{{ $materia->activo }}" />
						
					
					</form>
					
				</div> <!-- Modal Body -->
					
				<br>
				
				<!-- Modal Footer -->
				<div id="div_materia_actions_form_general"
					class="modal-footer">
						
					<form id="materia_actions_form_general" 
						class="actions_form_general">
						
						@csrf
						
						<button type="button" id="actualizar_button" name="actualizar_button"
								class="btn btn-primary" value="Actualizar"
								style="display: {{ $display_actualizar }}"
								data-bs-dismiss="modal" aria-label="Close"
								hx-put="{{ $url_base }}/actualizar"
								hx-include="[name='id']"
								hx-vals='js:{materia: materiaFormWebControl1.getMateria()}'
								hx-target="#divModal_materia_form_general"
								hx-ext='json-enc'
								hx-swap="outerHTML"
								hx-on::before-request="materiaWebControl1.updateDatosActualizar()">
							<fai icon="fa-solid fa-save" />
							Actualizar
						</button>
						
						<button type="button" id="guardar_button" name="guardar_button"
								class="btn btn-primary" value="Guardar"
								style="display: {{ $display_nuevo }}"
								data-bs-dismiss="modal" aria-label="Close"
								hx-post="{{ $url_base }}/nuevo"
								hx-vals='js:{materia: materiaFormWebControl1.getMateria()}'
								hx-target="#divModal_materia_form_general"
								hx-ext='json-enc'
								hx-swap="outerHTML"
								hx-on::before-request="materiaWebControl1.updateDatosGuardar()">
							<fai icon="fa-solid fa-save" />
							Guardar
						</button>
						
						<button type="button" id="eliminar_button" name="eliminar_button" 
								class="btn btn-primary" value="Eliminar"
								data-bs-dismiss="modal" aria-label="Close"
								hx-delete="{{ $url_base }}/eliminar"	
								hx-include="[name='id']"
								hx-target="#divModal_materia_form_general" 
								hx-ext='json-enc'
								hx-swap="outerHTML"
								hx-on::before-request="materiaWebControl1.updateDatosEliminar()"
								hx-confirm="Esta seguro de eliminar?">
							<fai icon="fa-solid fa-times-circle" />
							Eliminar
						</button>
						
						<button type="button" id="cancelar_button" name="cancelar_button" 
								class="btn btn-primary" value="Cancelar"
								data-bs-dismiss="modal" aria-label="Close"
								hx-post="{{ $url_base }}/cancelar"			
								hx-target="#divModal_materia_form_general" 
								hx-ext='json-enc'
								hx-swap="outerHTML">
							<fai icon="fa-solid fa-minus-circle" />
							Cancelar
						</button>
						
					
				</form>
					
			</div> <!-- Modal Footer -->									
		
		</div> <!-- Modal Content -->
		
	</div> <!-- Modal Dialog -->
	
</div> <!-- Form General -->
