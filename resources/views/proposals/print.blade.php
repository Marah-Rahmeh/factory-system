<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{asset('css/bootstrap-toggle.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome-free-6.1.1-web/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/sweetalert.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/print_style.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="<?= $css ?>bootstrap.min.css"> --}}
        <title>print</title>
    </head>

    <body>
        <div id="logo_header_print" style="
background-image: url({{asset("imgs/Logo-TR.png")}});
width: 600px; height:250px;
background-repeat: no-repeat;
background-position: center;
background-size: cover;
display: block;
margin: auto;
" > </div>

        {{-- <img class="w-100" src="{{asset("imgs/Logo-TR.png")}}" alt=""> --}}
        <div class="container-fluid">
            {{--  start header   --}}

            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                <!--add-->
                <div class="row gutters-sm">
                    <div class="col-md-10">
                      <div class="card mb-3">
                        <div class="card-body">
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
                            <hr>
                            <div class="col-sm-3">
                                <h6 class="mb-0">Proposal Amount:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $proposal->proposal_amount }}
                            </div>

                          </div>
                        </div>


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
            {{--  start footer   --}}
            {{-- @if(!is_null($invoice->saller->footer))
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <p class="mb-0">
                            {{$invoice->saller->footer}}
                        </p>
                    </div>
                </div>
            @endif --}}
            {{--  end footer   --}}
        </div>



        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        {{-- <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('js/flatpickr.min.js')}}"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>
        <script src="{{asset('js/sweetalert2.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script> --}}
    </body>
</html>

