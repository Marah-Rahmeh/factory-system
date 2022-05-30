@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Proposal') }}</h2>
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
                                    <li class="breadcrumb-item"><a href={{route('proposals')}}>{{ __('Proposals') }}</a></li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    <li class="breadcrumb-item active">{{ __('Edit Proposal') }}</li>
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
    <form action="{{ route('update-proposal') }}" method="POST" >
        {{--  --}}
        @csrf
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
                      </div>
                        <hr>
                      </div>

                    </form>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="hidden" name="client_id"  value="{{ $proposal->client_id }}" class="form-control">
                <div class="form-group">
                    <strong>Old Proposal ID:</strong>
                    <input type="text"name="parent_id"  value="{{ $proposal->id }}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Proposal Validity Date:</strong>
                    <input type="date" name="proposal_date" value={{ $proposal->proposal_date }}  class="form-control" placeholder="Proposal Date">

                    <div class="col-md-3">
                        <strong>Proposal Amount:</strong>
                        <input type="number" name="proposal_amount" value={{ $proposal->proposal_amount }}  class="form-control" >
                    </div>
                </div>
            </div>

            <!--  For demo purpose -->

{{-- <div class="container py-10"> --}}
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body p-10">

                    <!--  Bootstrap table-->
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive-lg" id="tblCustomers " name="proposal_details">
                            <thead>
                                <tr>
                                    <th scope="col" name="proposal_details">#</th>
                                    <th scope="col" >Item Type</th>
                                    <th scope="col">Item NO</th>
                                    <th scope="col">Item Details</th>
                                    <th scope="col">ES Width</th>
                                    <th scope="col">ES Height</th>
                                    <th scope="col">FN Width</th>
                                    <th scope="col">FN Height</th>
                                    <th scope="col">Image or Video</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $counter = 0;
                              ?>
                            @foreach ($proposal_details as $proposal_detail)
                            <tr>
                                <td scrope="row"> {{$counter}} </td>
                                <td><input class="type" class="form-control rounded-0" value={{ $proposal_detail->item_type }} type="text" name="type[]" id="Type" style="width: 100px"></td>
                                <td><input class="item_no" class="form-control rounded-0" value={{ $proposal_detail->item_no }} type="number" name="item_no[]" id="item_no" style="width: 100px"></td>
                                <td><input class="item_details" class="form-control rounded-0" value={{ $proposal_detail->item_details }} type="textarea" name="item_details[]" id="item_details" style="width: 100px"></td>
                                <td><input class="es_width" class="form-control rounded-0" value={{ $proposal_detail->es_width }} type="text" name="es_width[]" id="es_width" style="width: 100px"></td>
                                <td><input class="es_height" class="form-control rounded-0" value={{ $proposal_detail->es_height }} type="number" name="es_height[]" id="es_height" style="width: 100px"></td>
                                <td><input class="fn_width" class="form-control rounded-0" value={{ $proposal_detail->fn_width }} type="number" name="fn_width[]" id="fn_width" style="width: 100px"></td>
                                <td><input class="fn_height" class="form-control rounded-0" value={{ $proposal_detail->fn_height }} type="number" name="fn_height[]" id="fn_height" style="width: 100px"></td>
                                <td><input class="image" class="form-control rounded-0" href="{{asset("storage/image/".$proposal_detail->image)}}" type="file" name="image[]" id="image" style="width: 100px"></td>
                                <input type="hidden" name="detail_id[]" id="detail_id"   value = {{$counter}}></td>
                                <td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            <?php
                            $counter++;
                            ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add rows button-->
                    <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="#">Add new row</a>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProposal">Save changes
              </button>
            </div>

        </form>
    </div>
</div>
</div>

<script>
var counter = document.querySelector('table tr:last-child td:first-child').innerHTML;
console.log(counter);
counter++;
console.log(counter);
$(function () {

// Start counting from the third row

$("#insertRow").on("click", function (event) {
    event.preventDefault();
    var newRow = $("<tr>");
    var cols = '';

    // Table columns
    cols += '<td scrope="row">' + counter + '</td>';
    cols += '<td><input class="type" class="form-control rounded-0" type="text" name="type[]" id="Type" style="width: 100px"></td>';
    cols += '<td><input class="item_no" class="form-control rounded-0" type="number" name="item_no[]" id="item_no" style="width: 100px"></td>';
    cols += '<td><input class="item_details" class="form-control rounded-0" type="textarea" name="item_details[]" id="item_details" style="width: 100px"></td>';
    cols += '<td><input class="es_width" class="form-control rounded-0" type="text" name="es_width[]" id="es_width" style="width: 100px"></td>';
    cols += '<td><input class="es_height" class="form-control rounded-0" type="number" name="es_height[]" id="es_height" style="width: 100px"></td>';
    cols += '<td><input class="fn_width" class="form-control rounded-0" type="number" name="fn_width[]" id="fn_width" style="width: 100px"></td>';
    cols += '<td><input class="fn_height" class="form-control rounded-0" type="number" name="fn_height[]" id="fn_height" style="width: 100px"></td>';
    cols += '<td><input class="image" class="form-control rounded-0" type="file" name="image[]" id="image" style="width: 200px"></td>';
    cols += '<input type="hidden" name="detail_id[]" id="detail_id"   value =' + counter + '></td>';
    cols += '<td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button></td>';


    // Insert the columns inside a row
    newRow.append(cols);

    // // Insert the row inside a table
    $("table").append(newRow);

    counter++;
});

// Remove row when delete btn is clicked
$("table").on("click", "#deleteRow", function (event) {
    $(this).closest("tr").remove();
    counter -= 1
});
});

</script>
@endsection
