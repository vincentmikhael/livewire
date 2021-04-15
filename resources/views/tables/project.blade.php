<div>
    <button class="btn btn-warning float-left mr-1" data-toggle="modal"
        data-target="#staticBackdrop{{$id}}">Edit</button>
    <form action="{{route('project.delete',$id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <div class="modal fade" id="staticBackdrop{{$id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('project.update',$id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="">Project Name</label>
                        <input type="text" class="form-control" name="projectname" value="{{$project->projectname}}">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$project->address}}">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="images">
                        <label for="Status"></label>
                        <select class="form-control">
                            <option value="status" disabled>Status</option>
                            <option value="ACTIVE" {{$project->status == 'ACTIVE' ? 'selected' : ''}}>Active</option>
                            <option value="NOT ACTIVE" {{$project->status == 'NOT ACTIVE' ? 'selected' : ''}}>Not Active
                            </option>
                        </select>
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