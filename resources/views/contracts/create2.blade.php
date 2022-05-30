@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row ">
            <div class="col-md-9">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Contract') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('contracts')}}>{{ __('Contracts') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('New Contract') }}</li>
                                </ol>
                            </div>
                        </div>
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


    <form action="{{ route('add-contract') }}" method="POST" >
        @csrf
        <!--add-->
        <div class="panel panel-default">
          <div class="container ">
          <form class="form-horizontal">
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

                <div class="col-md-3">
                    <h6 class="mb-0">Proposal Amount:</h6>
                  </div>
                  <div class="col-md-3 text-secondary">
                    <input type="number" name="proposal_amount" value="{{$proposal->proposal_amount}}" >
                </div>

            </div>
              <hr>

            </div>

        </div>

        <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-body">
                      <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered table-responsive-lg first-1 shadow-lg">
                            <tr>
                                <th>id</th>
                                <th>Item Type</th>
                                <th>Item NO</th>
                                <th>Item Details</th>
                                <th>ES Width</th>
                                <th>ES Height</th>
                                <th>FN Width</th>
                                <th>FN Height</th>
                                <th>Creation Date</th>
                                <th>Image</th>

                            </tr>
                            @foreach ($proposal_details as $proposal_detail)
                                <tr>
                                    <td>{{ $proposal_detail->id }}</td>
                                    <td>{{ $proposal_detail->item_type }}</td>
                                    <td>{{ $proposal_detail->item_no }}</td>
                                    <td>{{ $proposal_detail->item_details }}</td>
                                    <td>{{ $proposal_detail->es_width }}</td>
                                    <td>{{ $proposal_detail->es_height }}</td>
                                    <td>{{ $proposal_detail->fn_width }}</td>
                                    <td>{{ $proposal_detail->fn_height }}</td>
                                    <td>{{ $proposal_detail->created_at }}</td>
                                    <td><a id="download_image" href="{{asset("storage/image/".$proposal_detail->image)}}" download> Download</a></td>
                                </tr>
                            @endforeach
                        </table>

                        {{-- {!! $proposal_details->links() !!} --}}
                    </div>
                </div>
              </div>
            </div>



        <div class="row">

        <input  type="hidden" name="proposal_id"  value="{{ $proposal->id }}" class="form-control">

        <div class="col-md-6">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="start_date" class="form-control" >
                </div>
            </div>

          <div class=" col-md-6">
                <div class="form-group">
                    <strong>Delivery Date:</strong>
                    <input type="date" name="delivery_date" class="form-control" placeholder="Name">
                </div>
            </div>
        </div>

       <hr class="her">
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </form>
    </div>
        </div>
      </div>
    </div>
        <!--end add-->
@endsection
