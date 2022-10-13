<!-- Nombre -->
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input wire:model.defer="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
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
        <option value="" selected>Seleccione un área</option>
        @foreach ($areas as $area)
            <option value="{{$area->id}}"> {{$area->nombre_area}} </option>
        @endforeach
    </select>
    @error('area_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Departamento -->
<div class="form-group">
    <label for="departamento_id">Departamento</label>
    <select wire:model="departamento_id" class="form-control" id="departamento_id">
        <option value="" selected>Seleccione un departamento</option>
        @foreach ($departamentos as $departamento)
            <option value="{{$departamento->id}}"> {{$departamento->nombre_departamento}} </option>
        @endforeach
    </select>
    @error('departamento_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Puesto -->
<div class="form-group">
    <label for="puesto_id">Puesto</label>
    <select wire:model.defer="puesto_id" class="form-control" id="puesto_id">
        <option value="" selected>Seleccione un puesto</option>
        @foreach ($puestos as $puesto)
            <option value="{{$puesto->id}}"> {{$puesto->nombre_puesto}} </option>
        @endforeach
    </select>
    @error('puesto_id') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!-- Horario -->
<div class="form-group">
    <div class="form-group">
        <label for="puesto_id">Categoría de horario</label>
        <select wire:model.defer="categoria_de_horario_id" class="form-control" id="categoria_de_horario_id">
            <option value="" selected>Seleccione una catergoría de horario</option>
            @foreach ($categoria_de_horarios as $categoria_de_horario)
                <option value="{{$categoria_de_horario->id}}"> {{$categoria_de_horario->nombre}} </option>
            @endforeach
        </select>
        @error('categoria_de_horario_id') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</div>
