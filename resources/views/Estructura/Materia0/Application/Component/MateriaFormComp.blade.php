<div id="divModal_materia_form_general" 
		class="modal_form_general"
		style="{{ $display }}">
	
	<!-- Modal content -->
	<div id="divModalContent_materia_form_general" 
		class="modal_form_general_content">
		
		<div class="modal_form_general_header">
			
			<span id="spanCloseModal_materia_form_general"
					class="close_modal_form_general">
				&times;
			</span>
			<h2>
				Materia
			</h2>
			
		</div>
		
		<div class="modal_form_general_body">
		
			<div id="div_materia_form_general">
			
				<form id="materia_form_general" 
					class="form_general">

					<input type="hidden" id="id" name="id" 
							value="{{ $materia->id }}" />
					
					<label id="label_id" name="label_id" for="text_id_aux" class=""
							style="{{ $style_id_column }}">Id</label>				
					<input type="text" id="text_id_aux" name="text_id_aux" 
							class="" style="{{ $style_id_column }}"
							value="{{ $materia->id }}" placeholder="Id" readonly/>
					
					<label for="created_at" class="">Created At</label>
					<input type="text" id="created_at" name="created_at" 
							class="" placeholder="Created At"
							value="{{ $materia->created_at }}" />
					
					<label for="updated_at" class="">Updated At</label>
					<input type="text" id="updated_at" name="updated_at"
							class="" placeholder="Updated At"
							value="{{ $materia->updated_at }}" />
							
					
					<label for="codigo" class="">Codigo</label>
					<input  type="text" 
							id="codigo" name="codigo"
							class="" placeholder="Codigo"
							value="{{ $materia->codigo }}" />
					
					<label for="nombre" class="">Nombre</label>
					<input  type="text" 
							id="nombre" name="nombre"
							class="" placeholder="Nombre"
							value="{{ $materia->nombre }}" />
					
					<label for="activo" class="">Activo</label>
					<input  type="checkbox" 
							id="activo" name="activo" 
							value="true" placeholder="Activo"
							class=""
							value="{{ $materia->activo }}" />
						
									
				</form>
				
			</div>
			
			<div id="div_materia_actions_form_general">
				
				<form id="materia_actions_form_general" 
					class="actions_form_general">				
					
					<button type="button" id="actualizar_button" name="actualizar_button" 
							class="button_general" value="Actualizar">
						<fai icon="fa-solid fa-save" />
						Actualizar
					</button>
					
					<button type="button" id="eliminar_button" name="eliminar_button" 
							class="button_general" value="Eliminar">
						<fai icon="fa-solid fa-times-circle" />
						Eliminar
					</button>
					
					<button type="button" id="cancelar_button" name="cancelar_button" 
							class="button_general" value="Cancelar">
						<fai icon="fa-solid fa-minus-circle" />
						Cancelar
					</button>
					
				</form>
				
			</div>
			
		</div>
		
	</div>
	
</div>