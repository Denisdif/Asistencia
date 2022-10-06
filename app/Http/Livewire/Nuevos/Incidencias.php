<?php

namespace App\Http\Livewire\Nuevos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use App\Models\Incidencia;

class Incidencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $fecha_hora, $descontar;
    public $updateMode = false;
    public $empleado;

    public function mount($id)
    {
        if (Empleado::find($id)) $this->empleado = Empleado::find($id); else abort(404);        
    }

    public function render()
    {
        return view('livewire.incidencias.view',  [
            'incidencias' => Incidencia::latest()
                        ->where('empleado_id', $this->empleado->id)
						->paginate(10),
        ])
        ->extends('livewire/incidencias/index')
        ->section('content');;
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->descripcion = null;
		$this->fecha_hora = null;
		$this->descontar = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha_hora' => 'required',
		'descontar' => 'required',
        ]);

        Incidencia::create([ 
			'nombre' => $this->nombre,
			'descripcion' => $this->descripcion,
			'fecha_hora' => $this->fecha_hora,
			'descontar' => $this->descontar,
			'empleado_id' => $this->empleado->id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Incidencia Successfully created.');
    }

    public function edit($id)
    {
        $record = Incidencia::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;
		$this->fecha_hora = $record-> fecha_hora;
		$this->descontar = $record-> descontar;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha_hora' => 'required',
		'descontar' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Incidencia::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'fecha_hora' => $this-> fecha_hora,
			'descontar' => $this-> descontar,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Incidencia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Incidencia::where('id', $id);
            $record->delete();
        }
    }
}
