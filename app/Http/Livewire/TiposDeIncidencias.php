<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposDeIncidencia;

class TiposDeIncidencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipos-de-incidencias.view', [
            'tiposDeIncidencias' => TiposDeIncidencia::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        TiposDeIncidencia::create([ 
			'nombre' => $this-> nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'TiposDeIncidencia Successfully created.');
    }

    public function edit($id)
    {
        $record = TiposDeIncidencia::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TiposDeIncidencia::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'TiposDeIncidencia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = TiposDeIncidencia::where('id', $id);
            $record->delete();
        }
    }
}
