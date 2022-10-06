<form>
    <div class="form-group">
        <label for="nombre"></label>
        <input wire:model.defer="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="tipo"></label>
        <input wire:model.defer="tipo" type="text" class="form-control" id="tipo" placeholder="Tipo">@error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="hora_entrada"></label>
        <input wire:model.defer="hora_entrada" type="text" class="form-control" id="hora_entrada" placeholder="Hora Entrada">@error('hora_entrada') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="hora_salida"></label>
        <input wire:model.defer="hora_salida" type="text" class="form-control" id="hora_salida" placeholder="Hora Salida">@error('hora_salida') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="tolerancia"></label>
        <input wire:model.defer="tolerancia" type="text" class="form-control" id="tolerancia" placeholder="Tolerancia">@error('tolerancia') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="dia"></label>
        <input wire:model.defer="dia" type="text" class="form-control" id="dia" placeholder="Dia">@error('dia') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</form>