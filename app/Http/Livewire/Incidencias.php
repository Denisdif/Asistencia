<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Incidencia;

class Incidencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $fecha_hora, $descontar, $empleado_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.incidencias.view', [
            'incidencias' => Incidencia::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('fecha_hora', 'LIKE', $keyWord)
						->orWhere('descontar', 'LIKE', $keyWord)
						->orWhere('empleado_id', 'LIKE', $keyWord)
						->paginate(10),
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
		$this->descripcion = null;
		$this->fecha_hora = null;
		$this->descontar = null;
		$this->empleado_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha_hora' => 'required',
		'descontar' => 'required',
		'empleado_id' => 'required',
        ]);

        Incidencia::create([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'fecha_hora' => $this-> fecha_hora,
			'descontar' => $this-> descontar,
			'empleado_id' => $this-> empleado_id
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
		$this->empleado_id = $record-> empleado_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha_hora' => 'required',
		'descontar' => 'required',
		'empleado_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Incidencia::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'fecha_hora' => $this-> fecha_hora,
			'descontar' => $this-> descontar,
			'empleado_id' => $this-> empleado_id
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
