<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HorasExtra;

class HorasExtras extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha_hora_inicio, $fecha_hora_fin, $remuneracion, $empleado_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horas-extras.view', [
            'horasExtras' => HorasExtra::latest()
						->orWhere('fecha_hora_inicio', 'LIKE', $keyWord)
						->orWhere('fecha_hora_fin', 'LIKE', $keyWord)
						->orWhere('remuneracion', 'LIKE', $keyWord)
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
		$this->fecha_hora_inicio = null;
		$this->fecha_hora_fin = null;
		$this->remuneracion = null;
		$this->empleado_id = null;
    }

    public function store()
    {
        $this->validate([
		'fecha_hora_inicio' => 'required',
		'fecha_hora_fin' => 'required',
		'remuneracion' => 'required',
		'empleado_id' => 'required',
        ]);

        HorasExtra::create([ 
			'fecha_hora_inicio' => $this-> fecha_hora_inicio,
			'fecha_hora_fin' => $this-> fecha_hora_fin,
			'remuneracion' => $this-> remuneracion,
			'empleado_id' => $this-> empleado_id
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
		$this->empleado_id = $record-> empleado_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha_hora_inicio' => 'required',
		'fecha_hora_fin' => 'required',
		'remuneracion' => 'required',
		'empleado_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = HorasExtra::find($this->selected_id);
            $record->update([ 
			'fecha_hora_inicio' => $this-> fecha_hora_inicio,
			'fecha_hora_fin' => $this-> fecha_hora_fin,
			'remuneracion' => $this-> remuneracion,
			'empleado_id' => $this-> empleado_id
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
