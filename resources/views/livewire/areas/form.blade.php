<!-- Nombre -->
<div class="form-group">
    <label for="nombre_area">Nombre</label>
    <input wire:model="nombre_area" type="text" class="form-control" id="nombre_area" placeholder="Nombre Area">@error('nombre_area') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Empresa -->
<div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select wire:model.defer="empresa_id" class="form-control" id="empresa_id">
        <option value="" selected>Seleccione una empresa</option>
        @foreach ($empresas as $empresa)
            <option value="{{$empresa->id}}"> {{$empresa->nombre_empresa}} </option>
        @endforeach
    </select>
    @error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>


