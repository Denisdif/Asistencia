<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departamento;
use App\Models\Empresa;

class Departamentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_departamento, $empresa_id ,$area_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.departamentos.view', [
            'departamentos' => Departamento::latest()
						->orWhere('nombre_departamento', 'LIKE', $keyWord)
						->orWhere('area_id', 'LIKE', $keyWord)
						->paginate(10),
            'empresas' => Empresa::all(),
            'areas'    => Area::where('empresa_id', $this->empresa_id)->get(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre_departamento = null;
		$this->area_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_departamento' => 'required',
		'area_id' => 'required',
        ]);

        Departamento::create([ 
			'nombre_departamento' => $this-> nombre_departamento,
			'area_id' => $this-> area_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Departamento Successfully created.');
    }

    public function edit($id)
    {
        $record = Departamento::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_departamento = $record-> nombre_departamento;
		$this->area_id = $record-> area_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_departamento' => 'required',
		'area_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Departamento::find($this->selected_id);
            $record->update([ 
			'nombre_departamento' => $this-> nombre_departamento,
			'area_id' => $this-> area_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Departamento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Departamento::where('id', $id);
            $record->delete();
        }
    }
}
