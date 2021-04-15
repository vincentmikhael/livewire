<div>
    <h3>Invoice Header</h3>

    @if (auth()->user()->role == 1 || auth()->user()->role == 2)
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col">
                <label for="">Invoice Number</label>
                <input type="text" wire:model="data.id" class="form-control">
                @error('data.id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Due Date</label>
                <input type="date" wire:model="data.duedate" class="form-control">
                @error('data.duedate') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Date</label>
                <input type="date" wire:model="data.date" class="form-control">
                @error('data.date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Contract Id</label>
                <input type="text" wire:model="data.contract_id" class="form-control">
                @error('data.contract_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label for="">Project Id</label>
                <input type="text" wire:model="data.project_id" class="form-control">
                @error('data.project_id') <span class="text-danger">{{ $message }}</span> @enderror
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
        <button class="btn-sm mt-2 btn-primary">Submit</button>
    </form>
    <hr>
    @endif

    <livewire:tables.invoiceh />
</div>