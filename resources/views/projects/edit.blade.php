@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Project') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Edit Project') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('add-project') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <!--add-->
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="container ">
                          <div class="panel-heading">
                              <h4 class="panel-title">Contract info</h4>
                              <hr>
                              </div>
                          <div class="panel-body">
                          <div class="row">
                            <div class="col-md-3">
                              <h6 class="mb-0">Client Name:</h6>
                            </div>
                            <div class="col-md-3 text-secondary">
                                {{ $client->first_name }} {{ $client->last_name }}
                            </div>
                            <div class="col-md-3">
                              <h6 class="mb-0">Personal ID:</h6>
                            </div>
                            <div class="col-md-3 text-secondary">
                                {{ $client->personal_id }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-3">
                                <h6 class="mb-0">Client Address:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                  {{ $addresse->province }}
                              </div>
                              <div class="col-md-3">
                                <h6 class="mb-0">Email:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                  {{ $user->email }}
                              </div>
                          </div>
                            <hr>

                            <div class="row">
                              <div class="col-md-3">
                                <h6 class="mb-0">Home Number:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                {{ $client->home_number }}
                              </div>
                              <div class="col-md-3">
                                <h6 class="mb-0">Office Number:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                {{ $client->office_number }}
                              </div>
                          </div>
                            <hr>

                            <div class="row">
                              <div class="col-md-3">
                                <h6 class="mb-0">Mobile Number:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                {{ $client->mobile_number }}
                              </div>
                              <div class="col-md-3">
                                <h6 class="mb-0">Proposal Date:</h6>
                              </div>
                              <div class="col-md-3 text-secondary">
                                {{ $proposal->proposal_date }}
                              </div>
                          </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                  <h6 class="mb-0">Contract ID:</h6>
                                </div>
                                <div class="col-md-3 text-secondary">
                                  {{ $project->contract_id }}
                                </div>
                            </div>
                              <hr>
                          </div>
                    <div class="row">

                      <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ $project->name }}
                                </div>
                            </div>
                            {{-- <input type="text" name="name"  value=" {{ $project->name }} " class="form-control" readonly > --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ed1">
                        {{-- @can('user-create') --}}
                            <a href= {{route('<project><id>edit2',$project->id)}} class="ed btn btn-success" style="color:white">
                                <span style="color:white"></span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg>
                            </a>
                        {{-- @endcan --}}
                    </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Project Manager:</strong>
                            {{-- <input type="number" name="manager_id" value=" 'manager '.{{ $project->manager_id }} " class="form-control" readonly > --}}
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ 'manager '. $project->manager_id }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Plane Delivery Date:</strong>
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ $project->plane_delivery_date }}
                                </div>
                            </div>
                            {{-- <input type="date" name="plane_delivery_date" value=" {{ $project->plane_delivery_date }} " class="form-control" > --}}
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Project Delivery Date:</strong>
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ $project->delivery_date }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ $project->start_date }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>End Date:</strong>
                            <div class="row">
                                <div class="col-md-3 text-secondary">
                                    {{ $project->end_date }}
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                </div>
                </div>
                <hr class="her">
                <div class="col-auto">
                    {{-- @can('user-create') --}}
                        <a href= {{route('<task><id>add',$project->id)}} class="btn btn-success" style="color:white">
                            <span style="color:white"></span> {{ __('New Task') }}
                        </a>
                    {{-- @endcan --}}
                </div>
            {{-- </div> --}}
            <div class="card mb-3">
                <div class="card-body">
                        <div class="col-md-12 col-sm-12">
                          <table class="table table-bordered table-responsive-lg first-1 shadow-lg">
                              <tr>
                                <th scope="col" style="width: 120px" >#</th>
                                <th scope="col" style="width: 120px" >Name</th>
                                <th scope="col" style="width: 120px">Sales Id</th>
                                <th scope="col" style="width: 120px">Manager Id</th>
                                <th scope="col" style="width: 120px">Delivery Date</th>
                                <th scope="col" style="width: 180px">Actual Delivery Date</th>
                                <th scope="col" style="width: 180px">Creation Date</th>
                                <th scope="col" style="width: 70px">Image or Video</th>
                                <th scope="col" style="width: 70px">Edit</th>
                            </tr>
                        </tr>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                @foreach ($proposal_details as $proposal_detail)
                                <?php if($proposal_detail->id == $task->name ) { ?>
                                    <td>{{$proposal_detail->item_type}}</td>
                                <?php } ?>
                                @endforeach
                                {{-- <td>{{ $task->name }}</td> --}}
                                {{-- <td>{{ 'sales '.$task->sales_id }}</td> --}}
                                @foreach ($saless as $sales)
                                <?php if($sales->id == $task->sales_id ) { ?>
                                    <td>{{$sales->first_name}}</td>
                                <?php } ?>
                                @endforeach
                                {{-- <td>{{ 'manager '.$task->manager_id }}</td> --}}
                                @foreach ($managers as $manager)
                                <?php if($sales->id == $task->manager_id ) { ?>
                                    <td>{{$manager->first_name}}</td>
                                <?php } ?>
                                @endforeach
                                <td>{{ $task->delivery_date }}</td>
                                <td>{{ $task->actual_delivery_date }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td><a id="download_image" href="{{asset("storage/image/".$task->image)}}" download> Download</a></td>
                                <td><a id="edit_task" href="{{route('<task><id>edit',$task->id)}}" >                                 <span style="color:white"></span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
        </div>
        </div>

          </div>

@endsection
