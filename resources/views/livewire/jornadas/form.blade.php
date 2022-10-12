<form>
    <!-- Nombre de la jornada -->
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input wire:model.defer="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de la jornada">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Tipo de jornada -->
    <div class="form-group">
        <label for="tipo">Tipo de jornada</label>
        <input wire:model.defer="tipo" type="text" class="form-control" id="tipo" placeholder="Mañana, tarde, extendida...">@error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    
    <!-- Día -->
    <div class="form-group">
        <label for="dia">Día</label>
        <select wire:model.defer="dia" class="form-control" id="dia">
            <option value="" selected>Seleccione un día</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miércoles">Miércoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sábado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>
        @error('dia') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Hora de entrada -->
    <div class="form-group">
        <label for="hora_entrada">Hora de entrada</label>
        <input wire:model.defer="hora_entrada" type="time" class="form-control" id="hora_entrada" placeholder="Hora Entrada">@error('hora_entrada') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Fin de la jornada -->
    <div class="form-group">
        <label for="hora_salida">Hora de salida</label>
        <input wire:model.defer="hora_salida" type="time" class="form-control" id="hora_salida" placeholder="Hora Salida">@error('hora_salida') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Tolerancia -->
    <div class="form-group">
        <label for="tolerancia">Tolerancia</label>
        <input wire:model.defer="tolerancia" type="time" class="form-control" id="tolerancia" placeholder="Tolerancia">@error('tolerancia') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</form>