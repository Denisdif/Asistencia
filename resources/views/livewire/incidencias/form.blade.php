<form>
    <div class="form-group">
        <label for="nombre"></label>
        <input wire:model.defer="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="descripcion"></label>
        <input wire:model.defer="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="fecha_hora"></label>
        <input wire:model.defer="fecha_hora" type="datetime-local" class="form-control" id="fecha_hora" placeholder="Fecha Hora">@error('fecha_hora') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="descontar"></label>
        <input wire:model.defer="descontar" type="text" class="form-control" id="descontar" placeholder="Descontar">@error('descontar') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</form>