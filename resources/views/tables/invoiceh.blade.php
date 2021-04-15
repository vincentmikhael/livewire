<div class="{{auth()->user()->role == 1 || auth()->user()->role == 2 ? 'd-block' : 'd-none'}}">
    <button class="btn btn-warning float-left mr-1" data-toggle="modal"
        data-target="#staticBackdrop{{$id}}">Edit</button>
    <form action="{{route('invoiceh.delete',$id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <div class="modal fade" id="staticBackdrop{{$id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Invoice Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('invoiceh.update',$id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="">Invoice Number</label>
                                <input type="text" name="id" value="{{$data->id}}" class="form-control">
                                @error('id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="">Due Date</label>
                                <input type="date" name="duedate" value="{{$data->duedate}}" class="form-control">
                                @error('duedate') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="">Date</label>
                                <input type="date" name="date" value="{{$data->date}}" class="form-control">
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Contract Id</label>
                                <input type="text" name="contract_id" value="{{$data->contract_id}}"
                                    class="form-control">
                                @error('contract_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="">Project Id</label>
                                <input type="text" name="project_id" value="{{$data->project_id}}" class="form-control">
                                @error('project_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Net</label>
                                <input type="number" name="net" value="{{$data->net}}" class="form-control">
                                @error('net') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="">Vat</label>
                                <input type="number" name="vat" value="{{$data->vat}}" class="form-control">
                                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="">Total</label>
                                <input type="number" name="total" value="{{$data->total}}" class="form-control">
                                @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <button class="btn-sm mt-2 btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>