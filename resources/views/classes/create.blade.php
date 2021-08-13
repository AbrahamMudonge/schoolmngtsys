<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">create class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('classes.store') }}" method="post" autocomplete="off">
        @csrf
            <div class="row">
            <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="class_Name">Class Name:</label>
                        <input type="text" class="form-control @error('class_Name') is-invalid @enderror" name="class_Name" value="{{old('class_Name')}}" >
                        @error('class_Name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               
               
                <div class="col-lg-12"> 
                    <button type="submit" class="btn btn-success btn-sm">Save changes</button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>