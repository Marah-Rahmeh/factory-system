@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Show Contract') }}</h2>
                    </div>
                    <div class="col-auto">
                        {{-- @can('user-create') --}}
                            <a href= {{route('<contract><id>print',$contract->id)}} class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('Print') }}
                            </a>
                        {{-- @endcan --}}
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
                                    <li class="breadcrumb-item"><a href={{route('contracts')}}>{{ __('Contracts') }}</a></li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                      </svg>
                                    <li class="breadcrumb-item active">{{ __('Show Contract') }}</li>
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
                      <h6 class="mb-0">Contract ID:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $contract->id }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contract start Date:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $contract->start_date }}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contract delivery Date:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $contract->delivery_date }}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contract Price Amount :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $contract->price_amount }}
                    </div>
                  </div>
                  <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Client Name:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $client->first_name }} {{ $client->last_name }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Personal ID:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $client->personal_id }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Client Address:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $addresse->province }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $user->email }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Home Number:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $client->home_number }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Office Number:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $client->office_number }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile Number:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $client->mobile_number }}
                </div>
              </div>
              <hr>
            <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Proposal Date:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $proposal->proposal_date }}
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
        </div>

      </div>
    </div>
    </div>
</div>
@endsection
