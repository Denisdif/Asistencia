<form>
    <!-- Tipo de incidencia -->
    <div class="form-group">
        <label for="nombre">Tipo de incidencia</label>
        <select name="" id="" class="form-control">
            <option value="">Seleccione una opción</option>
            <option value="">Entrada tarde</option>
            <option value="">Salida temprano</option>
            <option value="">Entrada tarde y salida temprano</option>
            <option value="">Falta</option>
        </select>
    </div>

    <!-- Descripción -->
    <div class="form-group">
        <label for="descripcion">Descripción de la incidencia</label>
        <input wire:model.defer="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Fecha y hora -->
    <div class="form-group">
        <label for="fecha_hora">Fecha y hora incidencia</label>
        <input wire:model.defer="fecha_hora" type="datetime-local" class="form-control" id="fecha_hora" placeholder="Fecha Hora">@error('fecha_hora') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Descuenta sueldo -->
    <div class="form-group">
        <label for="descontar">¿Descuenta sueldo?</label>
        <select wire:model.defer="descontar" class="form-control" id="descontar">
            <option value="">Seleccione una opción</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>

    </div>
</form>