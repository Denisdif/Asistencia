<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;

class Empresas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_empresa, $cuit, $domicilio, $razon_social;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresas.view', [
            'empresas' => Empresa::latest()
						->orWhere('nombre_empresa', 'LIKE', $keyWord)
						->orWhere('cuit', 'LIKE', $keyWord)
						->orWhere('domicilio', 'LIKE', $keyWord)
						->orWhere('razon_social', 'LIKE', $keyWord)
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
		$this->nombre_empresa = null;
		$this->cuit = null;
		$this->domicilio = null;
		$this->razon_social = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_empresa' => 'required',
		'cuit' => 'required',
        ]);

        Empresa::create([ 
			'nombre_empresa' => $this-> nombre_empresa,
			'cuit' => $this-> cuit,
			'domicilio' => $this-> domicilio,
			'razon_social' => $this-> razon_social
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empresa Successfully created.');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_empresa = $record-> nombre_empresa;
		$this->cuit = $record-> cuit;
		$this->domicilio = $record-> domicilio;
		$this->razon_social = $record-> razon_social;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_empresa' => 'required',
		'cuit' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([ 
			'nombre_empresa' => $this-> nombre_empresa,
			'cuit' => $this-> cuit,
			'domicilio' => $this-> domicilio,
			'razon_social' => $this-> razon_social
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empresa Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empresa::where('id', $id);
            $record->delete();
        }
    }
}
