<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre_empresa"></label>
                <input wire:model="nombre_empresa" type="text" class="form-control" id="nombre_empresa" placeholder="Nombre Empresa">@error('nombre_empresa') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cuit"></label>
                <input wire:model="cuit" type="text" class="form-control" id="cuit" placeholder="Cuit">@error('cuit') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="domicilio"></label>
                <input wire:model="domicilio" type="text" class="form-control" id="domicilio" placeholder="Domicilio">@error('domicilio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="razon_social"></label>
                <input wire:model="razon_social" type="text" class="form-control" id="razon_social" placeholder="Razon Social">@error('razon_social') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
