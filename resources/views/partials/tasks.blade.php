 @forelse ($tasks as $task)
                               <li class="list-group-item task" data-id="{{ $task->id }}">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">{{ $task->name }} 
                                                <a href="{{url('/project')}}/{{$task->project->id}}/tasks/delete" class="btn btn-sm btn-danger text-white ml-3">Delete</a>
                                                <span class="float-right">
                                                              <i class="fa fa-ellipsis-v"></i>
                                                              <i class="fa fa-ellipsis-v"></i>
                                                          </span>
                                                </div>
                                                

                                            </div>
                                           
                                            

                                        </div>
                                </li>
                         @empty
                                <li class="list-group-item task">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">
                                                Nothing here
                                               
                                                </div>
                                                

                                            </div>
                                           
                                            

                                        </div>
                                </li>
@endforelse