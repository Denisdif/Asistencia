<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jornada;

class Jornadas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $hora_entrada, $hora_salida, $dia, $categoria_de_horario_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.jornadas.view', [
            'jornadas' => Jornada::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('hora_entrada', 'LIKE', $keyWord)
						->orWhere('hora_salida', 'LIKE', $keyWord)
						->orWhere('dia', 'LIKE', $keyWord)
						->orWhere('categoria_de_horario_id', 'LIKE', $keyWord)
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
		$this->hora_entrada = null;
		$this->hora_salida = null;
		$this->dia = null;
		$this->categoria_de_horario_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'hora_entrada' => 'required',
		'hora_salida' => 'required',
		'dia' => 'required',
		'categoria_de_horario_id' => 'required',
        ]);

        Jornada::create([ 
			'nombre' => $this-> nombre,
			'hora_entrada' => $this-> hora_entrada,
			'hora_salida' => $this-> hora_salida,
			'dia' => $this-> dia,
			'categoria_de_horario_id' => $this-> categoria_de_horario_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Jornada Successfully created.');
    }

    public function edit($id)
    {
        $record = Jornada::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->hora_entrada = $record-> hora_entrada;
		$this->hora_salida = $record-> hora_salida;
		$this->dia = $record-> dia;
		$this->categoria_de_horario_id = $record-> categoria_de_horario_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'hora_entrada' => 'required',
		'hora_salida' => 'required',
		'dia' => 'required',
		'categoria_de_horario_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jornada::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'hora_entrada' => $this-> hora_entrada,
			'hora_salida' => $this-> hora_salida,
			'dia' => $this-> dia,
			'categoria_de_horario_id' => $this-> categoria_de_horario_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Jornada Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Jornada::where('id', $id);
            $record->delete();
        }
    }
}
