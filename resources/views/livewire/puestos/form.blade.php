<!-- Nombre -->
<div class="form-group">
    <label for="nombre_puesto"></label>
    <input wire:model="nombre_puesto" type="text" class="form-control" id="nombre_puesto" placeholder="Nombre Puesto">@error('nombre_puesto') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Empresa -->
<div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select wire:model="empresa_id" class="form-control" id="empresa_id">
        <option value="" selected>Seleccione una empresa</option>
        @foreach ($empresas as $empresa)
            <option value="{{$empresa->id}}"> {{$empresa->nombre_empresa}} </option>
        @endforeach
    </select>
    @error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Área -->
<div class="form-group">
    <label for="area_id">Área</label>
    <select wire:model="area_id" class="form-control" id="area_id">
        <option value="" selected>Seleccione un area</option>
        @foreach ($areas as $area)
            <option value="{{$area->id}}"> {{$area->nombre_area}} </option>
        @endforeach
    </select>
    @error('area_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Departamento -->
<div class="form-group">
    <label for="departamento_id">Departamento</label>
    <select wire:model.defer="departamento_id" class="form-control" id="departamento_id">
        <option value="" selected>Seleccione un departamento</option>
        @foreach ($departamentos as $departamento)
            <option value="{{$departamento->id}}"> {{$departamento->nombre_departamento}} </option>
        @endforeach
    </select>
    @error('departamento_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
