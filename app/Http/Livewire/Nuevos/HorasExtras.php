<?php

namespace App\Http\Livewire\Nuevos;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HorasExtra;

class HorasExtras extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha_hora_inicio, $fecha_hora_fin, $remuneracion, $empleado_id;
    public $updateMode = false;

    public function mount($id)
    {
        if (Empleado::find($id)) $this->empleado = Empleado::find($id); else abort(404);        
    }

    public function render()
    {
        return view('livewire.horas-extras.view', [
            'horasExtras' => HorasExtra::latest()
						->where('empleado_id', $this->empleado->id)
						->paginate(10),
        ])
        ->extends('livewire/horas-extras/index')
        ->section('content');
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->fecha_hora_inicio = null;
		$this->fecha_hora_fin = null;
		$this->remuneracion = null;
    }

    public function store()
    {
        $this->validate([
		'fecha_hora_inicio' => 'required',
		'fecha_hora_fin' => 'required',
		'remuneracion' => 'required',
        ]);

        HorasExtra::create([ 
			'fecha_hora_inicio' => $this-> fecha_hora_inicio,
			'fecha_hora_fin' => $this-> fecha_hora_fin,
			'remuneracion' => $this-> remuneracion,
			'empleado_id' => $this-> empleado->id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'HorasExtra Successfully created.');
    }

    public function edit($id)
    {
        $record = HorasExtra::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha_hora_inicio = $record-> fecha_hora_inicio;
		$this->fecha_hora_fin = $record-> fecha_hora_fin;
		$this->remuneracion = $record-> remuneracion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha_hora_inicio' => 'required',
		'fecha_hora_fin' => 'required',
		'remuneracion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = HorasExtra::find($this->selected_id);
            $record->update([ 
			'fecha_hora_inicio' => $this-> fecha_hora_inicio,
			'fecha_hora_fin' => $this-> fecha_hora_fin,
			'remuneracion' => $this-> remuneracion,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'HorasExtra Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = HorasExtra::where('id', $id);
            $record->delete();
        }
    }
}
