<div>
    <h3>Invoice Detail</h3>

    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col">
                <label for="">Invoice Number</label>
                <input type="number" wire:model="data.id" class="form-control">
                @error('data.id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col">
                <label for="">Seq</label>
                <input type="number" wire:model="data.seq" class="form-control">
                @error('data.seq') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Type bill</label>
                <input type="number" wire:model="data.type_bill" class="form-control">
                @error('data.type_bill') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Net</label>
                <input type="number" wire:model="data.net" class="form-control">
                @error('data.net') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Vat</label>
                <input type="number" wire:model="data.vat" class="form-control">
                @error('data.vat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Total</label>
                <input type="number" wire:model="data.total" class="form-control">
                @error('data.total') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add</button>
    </form>
    <hr>
    <livewire:tables.invoiced exportable="true" />
</div>