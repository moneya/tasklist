@extends("layouts.app")
@section("content")
  <div class="row justify-content-center">
            @if (session('success'))
             <div class="col-md-9">
                <div class="alert alert-success text-dark">
                    {{ session('success') }}
                </div>
             </div>
            @endif
            @if (session('error'))
              <div class="col-md-9">
                <div class="alert alert-danger text-dark">
                    {{ session('error') }}
                </div>
              </div>
            @endif
  </div>

    <div class="row justify-content-center ">
    <div class="col-md-12">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-file"></i>&nbsp;Projects</div>
            </div>
            <div class="d-block text-right card-footer">
            
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button></div>
        </div>

        <div class="row justify-content-center">
            @forelse ($projects as $project)
               <div class="col-md-4">
                <div class="card-hover-shadow-2x mb-3 card" >
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            {{ $project->name }}
                        </h5>
                        
                        <a href="{{url('/project')}}/{{$project->id}}/tasks" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div> 
            @empty

             <div class="col-md-6">
                <div class="card-hover-shadow-2x mb-3 card" >
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            No project have been created
                        </h5>
                        
                        
                    </div>
                </div>
            </div> 
                
            @endforelse
    </div>
</div>     




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="create-project" action={{url('/projects')}}>
            <div class="modal-body">
            
                {{csrf_field()}}
                    <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Project Name">
                    </div>
                    
            
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>

@endsection