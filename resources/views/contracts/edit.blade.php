@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-9">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Edit Contract') }}</h2>
                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item"><a href={{route('contracts')}}>{{ __('Contracts') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Edit Contract') }}</li>
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
</div>

<div>

    <div class="container">
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
    </div>
    <hr>
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

                </div>
            </div>
          </div>
        </div>





    <form action="{{ route('<contract><id>update',$contract->id) }}" method="POST" >
        @method('POST')
        @csrf
        <div class="row">


            <div class="row">

                <input  type="hidden" name="id"  value="{{ $contract->id }}" class="form-control">
            <div class=" col-md-6">
                  <div class="form-group">
                      <strong>Proposal Id:</strong>
                      <input  type="number" name="proposal_id"  value="{{ $contract->proposal_id }}" class="form-control" readonly>
                  {{-- <input type="text" name="first_name" value="{{ $proposal->first_name }}" class="form-control" readonly> --}}
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <strong>Start Date:</strong>
                      <input type="date" name="start_date" value="{{ $contract->start_date }}" class="form-control" >
                  </div>
                </div>

                <div class=" col-md-6">
                  <div class="form-group">
                      <strong>Delivery Date:</strong>
                      <input type="date" name="delivery_date" value="{{ $contract->delivery_date }}" class="form-control" placeholder="Name">
                  </div>
                </div>
            </div>

        </div>
        <hr class="her">
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection
