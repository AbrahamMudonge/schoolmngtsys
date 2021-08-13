@extends('layouts.main')

@section('content')
  <!-- Page Heading -->
  

  <!-- DataTales Example -->
  <div class="text-white card-header bg-dark">
    <h1 class="card-title">Teachers
    <span>
        {{$countTeachers}}
    </span>
    
    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addTeacher" data-toggle="modal">Add</a>
   <!-- display success message -->
    @if (session ('message'))
        <div class="alert alert-success">
        <small>{{session('message')}}</small>
        
        </div>
        @endif
    </h1>
</div>

<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
          <th>Teacher Name</th>
          <th>Phone Number</th>
          <th>Course Name</th>
          <th>Department Name</th>
          <th>Created On</th>
          <th>Created By</th>
          <th>Action</th>
          
          
        </tr>
    </thead>
    <tbody>
      @forelse ($fetchAllTeachers as $teacher)
        <tr>
          <td>{{$teacher->teacherName}}</td>
          <td>{{$teacher->phoneNumber}}</td>
          <td>{{$teacher->courses->courseName}}</td>
          <td>{{$teacher->departments->departmentName}}</td>
          <td>{{$teacher->created_at->diffForHumans()}}</td>
          <td>{{$teacher->created_by}}</td>
          
          <!-- diffforhumans helps to imput the created at in form of sec min days -->
          
          <td>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-900"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Controlls:</div>
                  <a class="dropdown-item text-primary" data-toggle="modal" data-target='#editTeacher-{{$teacher->id}}'> <i class="fas fa-edit"></i> Edit</a>
                  
                  <a class="dropdown-item text-success" data-toggle="modal" data-target='#viewTeacher-{{$teacher->id}}' href="#"><i class="fas fa-eye"></i>View</a>
                 
                 
                  <a href='#'class='dropdown-item text-danger' onclick="confirm('you are about to delete {{$teacher->teacherName}}?')  ? document.getElementById('deleted-teacher-{{$teacher->id}}').submit(): '' "><i class="fas fa-trash"></i>delete</a>
                 <form action="{{route('teachers.destroy',$teacher->id)}}" method="post" id="deleted-teacher-{{$teacher->id}}">
                  @csrf
                  @method('delete')
            </form>
              </div>
          </div>

            
             
          </td>
          
        </tr>
        
          @include('teacher.edit')
        @include('teacher.view')
        @empty
        <span class="alert alert-danger">No Teachers found</span>
        
          @endforelse
      
    </tbody>

</table>
{{--    {{$fetchAllStudents->links()}}  --}}  
    
</div>
@include('teacher.create')
    
@endsection