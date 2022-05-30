@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Show Project') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                      </svg>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                      </svg>
                                    <li class="breadcrumb-item active">{{ __('Show Project') }}</li>
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
    <!--add-->
    <div class="row gutters-sm">
        <div class="col-md-10">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Contract Id:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->contract_id }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Name:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->name}}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Manager:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->manager_id }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Plane Delivery Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->plane_delivery_date }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Plane Delivery Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->plane_delivery_date }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Delivery Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->delivery_date }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Start Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->start_date }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">End Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $project->end_date }}
                </div>
              </div>
              <hr>
            </div>
        </div>

<!--3-->
        <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-body">
                      <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered table-responsive-lg first-1 shadow-lg">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Sales</th>
                                <th>Manager</th>
                                <th>Delivery Date</th>
                                <th>Actual Delivery Date</th>
                                <th>mage or Video</th>
                                <th>Creation Date</th>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    @foreach($proposal_details as $proposal_detail)
                                    <?php if($task->name == $proposal_detail->id ) { ?>
                                        <td>{{$proposal_detail->item_type}}</td>
                                    <?php } ?>
                                    @endforeach
                                    {{-- <td>{{ $task->name }}</td> --}}
                                    <td>{{ $task->sales_id }}</td>
                                    <td>{{ $task->manager_id }}</td>
                                    <td>{{ $task->delivery_date }}</td>
                                    <td>{{ $task->actual_delivery_date }}</td>
                                    <td>
                                        {{-- <a download="custom-filename.jpg"><img src="{{asset("storage/image//".$task->image)}}" alt="" title=""width="104" height="142"> dd</a> --}}
                                        <a id="download_image" href="{{asset("storage/image/".$task->image)}}" download>Download</a>
                                        {{-- <a href="{{asset("storage/image//".$task->image)}}" download>
                                            <img src="{{asset("storage/image//".$task->image)}}" alt="" title=""width="104" height="100">
                                        </a> --}}
                                    </td>
                                    <td>{{ $task->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>

                        {{-- {!! $proposal_details->links() !!} --}}
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
