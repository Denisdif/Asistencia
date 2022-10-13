<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\CategoriasDeHorario;
use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Puesto;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $categoria_de_horario_id, $puesto_id, $departamento_id, $empresa_id ,$area_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('categoria_de_horario_id', 'LIKE', $keyWord)
						->paginate(10),
            'categoria_de_horarios' => CategoriasDeHorario::all(),
            'empresas'      => Empresa::all(),
            'areas'         => Area::where('empresa_id', $this->empresa_id)->get(),
            'departamentos' => Departamento::where('area_id', $this->area_id)->get(),
            'puestos'       => Puesto::where('departamento_id', $this->departamento_id)->get(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->puesto_id = null;
		$this->categoria_de_horario_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'puesto_id' => 'required',
		'categoria_de_horario_id' => 'required',
        ]);

        Empleado::create([ 
			'nombre' => $this-> nombre,
            'puesto_id' => $this-> puesto_id,
			'categoria_de_horario_id' => $this-> categoria_de_horario_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
        $this->puesto_id = $record-> puesto_id;
		$this->categoria_de_horario_id = $record-> categoria_de_horario_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        'puesto_id' => 'required',
		'categoria_de_horario_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
            'puesto_id' => $this-> puesto_id,
			'categoria_de_horario_id' => $this-> categoria_de_horario_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
