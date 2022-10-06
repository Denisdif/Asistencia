<?php

namespace App\Http\Livewire\Nuevos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoriasDeHorario;
use App\Models\Jornada;

class Horarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $tipo, $hora_entrada, $hora_salida, $tolerancia, $dia;
    public $updateMode = false;
    public $categoria;

    public function mount($id)
    {
        if (CategoriasDeHorario::find($id)) $this->categoria = CategoriasDeHorario::find($id); else abort(404);        
    }

    public function render()
    {
        return view('livewire.jornadas.view',  [
            'jornadas' => Jornada::latest()
                        ->where('categoria_de_horario_id', $this->categoria->id)
						->paginate(10),
        ])
        ->extends('livewire/jornadas/index')
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
		$this->tipo = null;
		$this->hora_entrada = null;
		$this->hora_salida = null;
		$this->tolerancia = null;
		$this->dia = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'tipo' => 'required',
		'hora_entrada' => 'required',
		'hora_salida' => 'required',
		'tolerancia' => 'required',
		'dia' => 'required',
        ]);

        Jornada::create([ 
			'nombre' => $this-> nombre,
			'tipo' => $this-> tipo,
			'hora_entrada' => $this-> hora_entrada,
			'hora_salida' => $this-> hora_salida,
			'tolerancia' => $this-> tolerancia,
			'dia' => $this-> dia,
			'categoria_de_horario_id' => $this->categoria->id
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
		$this->tipo = $record-> tipo;
		$this->hora_entrada = $record-> hora_entrada;
		$this->hora_salida = $record-> hora_salida;
		$this->tolerancia = $record-> tolerancia;
		$this->dia = $record-> dia;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'tipo' => 'required',
		'hora_entrada' => 'required',
		'hora_salida' => 'required',
		'tolerancia' => 'required',
		'dia' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jornada::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'tipo' => $this-> tipo,
			'hora_entrada' => $this-> hora_entrada,
			'hora_salida' => $this-> hora_salida,
			'tolerancia' => $this-> tolerancia,
			'dia' => $this-> dia,
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
