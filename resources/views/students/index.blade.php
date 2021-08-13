@extends('layouts.main')

@section('content')
  <!-- Page Heading -->
  

  <!-- DataTales Example -->
  <div class="text-white card-header bg-dark">
    <h1 class="card-title">Students
    <span>
        {{$countStudents}}
    </span>
    
    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addStudent" data-toggle="modal">Add</a>
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
          <th>Student Name</th>
          <th>Phone Number</th>
          <th>Course Name</th>
          <th>Department Name</th>
          <th>Created On</th>
          <th>Created By</th>
          <th>Action</th>
          
          
        </tr>
    </thead>
    <tbody>
      @forelse ($fetchAllStudents as $student)
        <tr>
          <td>{{$student->studentName}}</td>
          <td>{{$student->phoneNumber}}</td>
          <td>{{$student->courses->courseName}}</td>
          <td>{{$student->departments->departmentName}}</td>
          <td>{{$student->created_at->diffForHumans()}}</td>
          <td>{{$student->created_by}}</td>
          
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
                  <a class="dropdown-item text-primary" data-toggle="modal" data-target='#editStudent-{{$student->id}}'> <i class="fas fa-edit"></i> Edit</a>
                  
                  <a class="dropdown-item text-success" data-toggle="modal" data-target='#viewStudent-{{$student->id}}' href="#"><i class="fas fa-eye"></i>View</a>
                 
                 
                  <a href='#'class='dropdown-item text-danger' onclick="confirm('you are about to delete {{$student->studentName}}?')  ? document.getElementById('deleted-student-{{$student->id}}').submit(): '' "><i class="fas fa-trash"></i>delete</a>
                 <form action="{{route('students.destroy',$student->id)}}" method="post" id="deleted-student-{{$student->id}}">
                  @csrf
                  @method('delete')
            </form>
              </div>
          </div>

            
             
          </td>
          
        </tr>
        
          @include('students.edit')
        @include('students.view')
        @empty
        <span class="alert alert-danger">No Students found</span>
        
          @endforelse
      
    </tbody>

</table>
{{--    {{$fetchAllStudents->links()}}  --}}  
    
</div>
@include('students.create')
    
@endsection