<div>
    <button class="btn btn-warning float-left mr-1" data-toggle="modal"
        data-target="#staticBackdrop{{$id}}">Edit</button>
    <form action="{{route('invoiced.delete',$id)}}" method="POST">
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
                    <form action="{{route('invoiced.update',$id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="">Invoice Number</label>
                                <input type="number" name="id" value="{{$data->id}}" class="form-control">
                            </div>

                            <div class="col">
                                <label for="">Seq</label>
                                <input type="number" name="seq" value="{{$data->seq}}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Type bill</label>
                                <input type="number" name="type_bill" value="{{$data->type_bill}}" class="form-control">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Net</label>
                                <input type="number" value="{{$data->net}}" name="net" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Vat</label>
                                <input type="number" value="{{$data->vat}}" name="vat" class="form-control">

                            </div>
                            <div class="col">
                                <label for="">Total</label>
                                <input type="number" value="{{$data->total}}" name="total" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>