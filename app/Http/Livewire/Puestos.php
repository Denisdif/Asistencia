<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Departamento;
use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Puesto;

class Puestos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_puesto, $departamento_id, $empresa_id ,$area_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.puestos.view', [
            'puestos' => Puesto::latest()
						->orWhere('nombre_puesto', 'LIKE', $keyWord)
						->orWhere('departamento_id', 'LIKE', $keyWord)
						->paginate(10),
            'empresas'      => Empresa::all(),
            'areas'         => Area::where('empresa_id', $this->empresa_id)->get(),
            'departamentos' => Departamento::where('area_id', $this->area_id)->get(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre_puesto = null;
		$this->departamento_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_puesto' => 'required',
		'departamento_id' => 'required',
        ]);

        Puesto::create([ 
			'nombre_puesto' => $this-> nombre_puesto,
			'departamento_id' => $this-> departamento_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Puesto Successfully created.');
    }

    public function edit($id)
    {
        $record = Puesto::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_puesto = $record-> nombre_puesto;
		$this->departamento_id = $record-> departamento_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_puesto' => 'required',
		'departamento_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Puesto::find($this->selected_id);
            $record->update([ 
			'nombre_puesto' => $this-> nombre_puesto,
			'departamento_id' => $this-> departamento_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Puesto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Puesto::where('id', $id);
            $record->delete();
        }
    }
}
