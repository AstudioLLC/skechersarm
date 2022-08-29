<div>
    <form>
        <input type="hidden" wire:model="$barcode">
        <div class="row">
            <div class="col-12">
                <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-danger" wire:ignore>
                                <livewire:admin.supports.form-title name="Barcode"/>
                                <input type="text" wire:model="barcode" class="form-control">
                                @error('barcode') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-danger" wire:ignore>
                                <livewire:admin.supports.form-title name="Count"/>
                                <input type="text" wire:model="count" class="form-control">
                                @error('count') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>

    </form>
</div>
