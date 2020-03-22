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
            
            <select name="projects" class="dynamic">
              <option value="0">All Task</option>
                @forelse ($projects as $project)
                     <option value="{{$project->id}}">{{$project->name}}</option>
                @empty
                    
                @endforelse
            </select>

            {{ csrf_field() }}
            </div>
        </div>

        <div class="row justify-content-center">
           <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal text-center">
                <span class="float-left"><a href="/" class="btn btn-small btn-info">Back</a></span>
                {{--  <span class="">&nbsp;{{$project->name}}</span>  --}}
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
                                                <a href="{{url('/task')}}/{{$task->id}}/tasks/delete" class="btn btn-sm btn-danger text-white ml-3">Delete</a>
                                                <span class="float-right">
                                                              <i class="fa fa-ellipsis-v"></i>
                                                              <i class="fa fa-ellipsis-v"></i>
                                                          </span>
                                                </div>
                                                

                                            </div>
                                           
                                            

                                        </div>
                                </li>
                                @empty
                                    
                                @endforelse
                              
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
    </div>
    </div>
</div>    



@endsection

@section('script')
    <script>
     $('.dynamic').change(function(){
        if($(this).val())
        {
          var project = $(this).val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"tasks/sort",
            method:"POST",
            data:{
              projects:project,
              _token:_token},
            success:function(data)
            {
              {{--  console.log(data);  --}}
            $('#contents').html(data);
            }

          })
        }
 });
 </script>
@endsection