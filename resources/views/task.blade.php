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
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal text-center">
                <span class="float-left"><a href="/" class="btn btn-small btn-info">Back</a></span>
                <span class="">&nbsp;{{$project->name}}</span>
                <span class="float-right text-white"><a class="btn btn-small btn-info"><small><i class="fa fa-tasks"></i> &nbsp;All Tasks</small></a></span>
                </div>
            </div>
          
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush" id="contents">
                               
                                @forelse ($tasks as $task)
                                     <li class="list-group-item task" data-id="{{ $task->id }}">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">{{ $task->name }} 
                                                <a href="{{url('/project')}}/{{$project->id}}/tasks/delete" class="btn btn-sm btn-danger text-white ml-3">Delete</a>
                                                <span class="float-right">
                                                              <i class="fa fa-ellipsis-v"></i>
                                                              <i class="fa fa-ellipsis-v"></i>
                                                          </span>
                                                </div>
                                                

                                            </div>
                                           
                                            

                                        </div>
                                </li>
                                @empty
                                    <li>No task</li>
                                @endforelse
                              
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
            
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Task</button></div>
        </div>
    </div>
</div>     




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="create-project" action='{{url('/project')}}/{{$project->id}}/tasks'>
            <div class="modal-body">
            
                {{csrf_field()}}
                    <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter Task Name">
                    </div>
                    
            
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>




    @section('script')
         <script>

   
          $(function () {

       $( "#contents" ).sortable({
      items: "li",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
           var order = [];
            $('li.task').each(function(index,element) {
              order.push({
                id: $(this).attr('data-id'),
                position: index+1
              });
            });

            $.ajax({
              type: "POST", 
              dataType: "json", 
              url: "{{url('/project')}}/{{$project->id}}/tasks/reorder",
              data: {
                order:order,
                _token: '{{csrf_token()}}'
              },
              success: function(response) {
                  if (response.status == "success") {
                    console.log(response);
                  } else {
                    console.log(response);
                  }
              }
            });
      }
    });




        function sorttask() {

           

    }
    });
    </script>
    @endsection
@endsection