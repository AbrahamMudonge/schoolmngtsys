<div class="modal fade" id="viewClass-{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Class Details:<strong class='text-success'>{{$class->class_Name}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Class Name:<strong class='text-primary'>{{$class->class_Name}}</strong></h5>
      
      <h5 class="modal-title" id="exampleModalLabel">Created At:<strong class='text-primary'>{{$class->created_at->diffForHumans()}}</strong></h5>
      <h5 class="modal-title" id="exampleModalLabel">Created By:<strong class='text-primary'>{{$class->created_by}}</strong></h5>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm"  data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

