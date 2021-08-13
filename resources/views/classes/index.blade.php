@extends('layouts.main')

@section('content')
  <!-- Page Heading -->
  <div class="mb-2 text-gray-800">
      <span>classes</span>
      
  </div>
@include('classes.create')

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-success">Classes</h6>
          <span class="float-right">
            <a href=""data-toggle='modal' data-target="#addClass" class="btn btn-warning bt-sm">add classes</a>
            <i class="fas fa-search fa-sm"></i>
            </span>
      </div>
      <div class="card-body">
          <div class="table-responsive">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Class Name</th>
                            <th>updated at</th>
                            <th>created by</th>
                            <th>Action</th>
                            
                            
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($fetchAllClasses as $class)
                          <tr>
                            <td>{{$class->class_Name}}</td>
                            <td>{{$class->created_at->diffForHumans()}}</td>
                            <td>{{$class->created_by}}</td>
                            
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
                                    <a class="dropdown-item text-primary" data-toggle="modal" data-target='#editClass-{{$class->id}}'> <i class="fas fa-edit"></i> Edit</a>
                                    
                                    <a class="dropdown-item text-success" data-toggle="modal" data-target='#viewClass-{{$class->id}}' href="#"><i class="fas fa-eye"></i>View</a>
                                   
                                   
                                    <a href='#'class='dropdown-item text-danger' onclick="confirm('you are about to delete {{$class->class_Name}}?')  ? document.getElementById('deleted-class-{{$class->id}}').submit(): '' "><i class="fas fa-trash"></i>delete</a>
                                   <form action="{{route('classes.destroy',$class->id)}}" method="post" id="deleted-class-{{$class->id}}">
                                    @csrf
                                    @method('delete')
                              </form>
                                </div>
                            </div>
                  
                              
                               
                            </td>
                            
                          </tr>
                          
                            @include('classes.edit')
                          @include('classes.view')
                          @empty
                          <span class="alert alert-danger">No class found</span>
                          
                            @endforelse
                        
                      </tbody>
                  
                  </table>
                  </div>
              </div>
            </div>
            
            
          </div>
      </div>
  </div>
    
@endsection
