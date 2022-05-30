@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Project') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Add New Project') }}</li>
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
            </div>
        </div>
</div>
    @endif
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
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                          <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-body">
                                      <div class="col-md-12 col-sm-12">
                                        <table class="table">
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
                                                    <td><a id="download_image" href="{{asset("storage/image//".$proposal_detail->image)}}" download> Download</a></td>
                                                </tr>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>
                              </div>
                            </div>

<form action="{{ route('add-project') }}" method="POST" enctype="multipart/form-data" >
        @csrf
                    <div class="row">
                        <div class="col-sm-3">
                        <div class="form-group">
                            <strong>Contract Id:</strong>

                            <input  type="number" name="contract_id"  value="{{ $contract->id }}" class="form-control" readonly>
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


                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Project Name:</strong>
                            <input type="text" name="name" class="form-control" >
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Manager:</strong>
                            <select  name="manager_id"  id="manager_id" class="form-control" >
                                @foreach ($managers as $manager)
                                <option value={{$manager->id}}>{{$manager->first_name}} {{$manager->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Plane Delivery Date:</strong>
                            <input type="date" name="plane_delivery_date" class="form-control" >
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Delivery Date:</strong>
                            <input type="date" name="p_delivery_date" class="form-control" >
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            <input type="date" name="start_date" class="form-control" >
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>End Date:</strong>
                            <input type="date" name="end_date" class="form-control" >
                        </div>
                    </div>
                    </div>

                <hr>

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card rounded-0 border-0 shadow">
                            <div class="card-body p-10">

                                <!--  Bootstrap table-->
                                <div class="col-md-10">
                                    <table class="tab1 table table-bordered table-responsive-lg" id="tblCustomers " name="tasks">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 120px" >#</th>
                                                <th scope="col" style="width: 120px" >Name</th>
                                                <th scope="col" style="width: 120px">Sales Id</th>
                                                <th scope="col" style="width: 120px">Manager Id</th>
                                                <th scope="col" style="width: 120px">Delivery Date</th>
                                                <th scope="col" style="width: 180px">Actual Delivery Date</th>
                                                <th scope="col" style="width: 70px">Image or video</th>
                                                <th scope="col" style="width: 70px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Add rows button-->
                                <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="#">Add new row</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProject">Submit
                      </button>
                    </div>

    </form>
        </div>

<script>

$(function () {

var counter = 0;

$("#insertRow").on("click", function (event) {
    event.preventDefault();
    // var detail_ids;
    var newRow = $("<tr>");
    var cols = '';

    // Table columns
        cols += '<td scrope="row">' + counter + '</td>';
        // cols += '<td><input class="task_name" class="form-control rounded-0" type="text" name="task_name[]" id="task_name" style="width: 120px"></td>';
        cols += '<td><select  class="task_name" name="task_name[]"  id="task_name" style="width: 120px" >'+
            '@foreach ($proposal_details as $proposal_detail)'+
            '<option value={{$proposal_detail->id}}>{{$proposal_detail->item_type}}</option>'+
            '@endforeach'+
            '</select></td>';
        // cols += '<td><select  class="task_sales_id" name="task_sales_id[]"  id="task_sales_id" style="width: 120px" ><option value="2" >Sales 1</option><option value="1">Sales 2</option></select></td>';
        cols += '<td><select  class="task_sales_id" name="task_sales_id[]"  id="task_sales_id" style="width: 120px" >'+
            '@foreach ($saless as $sales)'+
            '<option value={{$sales->id}}>{{$sales->first_name}} {{$sales->last_name}}</option>'+
            '@endforeach'+
            '</select></td>';
        cols += '<td><select  class="task_manager_id" name="task_manager_id[]"  id="task_manager_id" style="width: 120px" > ' +
            '@foreach ($managers as $manager)'+
            '<option value={{$manager->id}}>{{$manager->first_name}} {{$manager->last_name}}</option>'+
            '@endforeach'+
            '</select></td>';
            // <input class="task_manager_id"  class="form-control rounded-0" type="number" name="task_manager_id[]" id="task_manager_id"  style="width: 120px">
        cols += '<td><input class="task_delivery_date" class="form-control rounded-0" type="date" name="task_delivery_date[]" id="task_delivery_date"  style="width: 120px" ></td>';
        cols += '<td><input class="task_actual_delivery_date"  class="form-control rounded-0" type="date" name="task_actual_delivery_date[]" id="task_actual_delivery_date"  style="width: 150px" ></td>';
        cols += '<td><input class="image" class="form-control rounded-0" type="file" name="image[]" id="image"  style="width: 200px" ></td>';
        // cols += '<input type="hidden" name="detail_id[]" id="detail_id"  value =' + counter + '></td>';
        cols += '<input type="hidden" name="detail_id[]" id="detail_id"   value =' + counter + '></td>';
        cols += '<td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button</td>';

    // Insert the columns inside a row
    newRow.append(cols);

    // // Insert the row inside a table
    $("table.tab1").append(newRow);
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
