<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Teacher Department and Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('teachers.store') }}" method="post" autocomplete="off">
        @csrf
            <div class="row">
            <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="teacherName">Teacher Name:</label>
                        <input type="text" class="form-control @error('teacherName') is-invalid @enderror" name="teacherName" value="{{old('teacherName')}}" >
                        @error('teacherName')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="phoneNumber">Phone Number:</label>
                        <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{old('phoneNumber')}}" >
                        @error('phoneNumber')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="course_id">Course Name:</label>
                        <select class="form-control @error('course_id') is-invalid @enderror" name="course_id">
                            <option value="">--select Course--</option>
                            @foreach ($fetchAllCourses as $course)
                                <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select> 
                        @error('course_id')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="department_id">Department Name:</label>
                        <select class="form-control @error('department_id') is-invalid @enderror" name="department_id">
                            <option value="">--select Department--</option>
                            @foreach ($fetchAllDepartments as $department)
                                <option value="{{ $department->id }}">{{ $department->departmentName }}</option>
                            @endforeach
                        </select> 
                        @error('department_id')
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