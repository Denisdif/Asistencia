<div class="form-group">
    <label for="fecha_hora_inicio">Fecha y hora de inicio</label>
    <input wire:model="fecha_hora_inicio" type="datetime-local" class="form-control" id="fecha_hora_inicio" placeholder="Fecha Hora Inicio">@error('fecha_hora_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
    <label for="fecha_hora_fin">Fecha y hora de fin</label>
    <input wire:model="fecha_hora_fin" type="datetime-local" class="form-control" id="fecha_hora_fin" placeholder="Fecha Hora Fin">@error('fecha_hora_fin') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
    <label for="remuneracion">Remuneración</label>
    <input wire:model="remuneracion" type="text" class="form-control" id="remuneracion" placeholder="Remuneracion">@error('remuneracion') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
{{-- <div class="form-group">
    <label for="empleado_id"></label>
    <input wire:model="empleado_id" type="text" class="form-control" id="empleado_id" placeholder="Empleado Id">@error('empleado_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div> --}}