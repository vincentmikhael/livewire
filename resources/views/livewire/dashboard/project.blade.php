<div>
    <h3>Project</h3>
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col">
                <input type="text" wire:model="data.id" class="form-control" placeholder="ID">
                @error('data.id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <input type="text" wire:model="data.projectname" class="form-control" placeholder="Project Name">
                @error('data.projectname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <input type="text" wire:model="data.address" class="form-control" placeholder="Address">
                @error('data.address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <input type="file" wire:model="image" class="form-control" placeholder="ID">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <select wire:model="data.status" class="form-control">
                    <option value="status" disabled>Status</option>
                    <option value="ACTIVE" selected>Active</option>
                    <option value="NOT ACTIVE">Not Active</option>
                </select>
                @error('data.status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tambah</button>
    </form>
    <hr>

    <livewire:tables.projects />
</div>