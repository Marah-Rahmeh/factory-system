@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Proposal') }}</h2>
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
                                    <li class="breadcrumb-item active">{{ __('New Proposal') }}</li>
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

    <div class="panel panel-default">
        <div class="container ">
            <form class="form-horizontal" action="{{ route('add-proposals') }}" method="POST"  enctype="multipart/form-data" >

          <div class="panel-heading">
              <h4 class="panel-title">Contract info</h4>
              <hr>
              </div>
          <div class="panel-body">
          <div class="row">
            <input  type="hidden" name="client_id"  value="{{ $client->id }}" class="form-control" >
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

              <input  type="hidden" name="client_adderss_id"  value="{{ $addresse->id }}" class="form-control" >
          </div>
            <hr>
          </div>



        {{--  --}}
        @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-md-3">
                        <strong>Proposal Validity Date:</strong>
                        <input type="date" name="proposal_date" class="form-control">
                        </div>
                        <div class="col-md-3">
                        <strong>Proposal Amount:</strong>
                        <input type="number" name="proposal_amount" class="form-control" >
                        </div>
                    </div>
                </div>

            </div>

            <!--  For demo purpose -->
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
                                    <th scope="col" >item_en</th>
                                    <th scope="col">item_ar</th>
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

            <div class="col-sm-offset-2  ">
              <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProposal">Save changes
              </button>
            </div>
        </div>
    </div>
</div>
</div>


        </form>
    </div>
</div>
</div>

<script>

// onchange="checkFilled();"
//    function checkFilled(){
//     console.log(document.getElementById('item_en').value);
//     alert( document.getElementById('item_en').value );
    // console.log(this.value);
    // $('#item_en').on('keyup change', function (e) {
    //     alert( this.value );
    // var optionSelected = $("option:selected", this);
    // var valueSelected = this.value;
    // alert(valueSelected);
    // console.log(valueSelected);
    // })
    // };
    function checkFilled(){
    $('select .item_en').each(function(){
        alert('hi');
        // $('#item_en :selected').text();
            $(this).on('click',function(){
                console.log(this.value);
                var a = $(this).val(),
                    b = $(this).parent().prev().prev().children('.es_width').val();
                    if(a != b){
                        this.style.backgroundColor ="yellow";
                            }
                            else{
                                this.style.backgroundColor ="";
                            }

                })
    })
};

$(function () {

// Start counting from the third row
var counter = 0;
var option = 5;
var option1 = 10;

$("#insertRow").on("click", function (event) {
    event.preventDefault();
    var newRow = $("<tr>");
    var cols = '';

    // Table columns
    cols += '<td scrope="row" >' + counter + '</td>';
    cols += '<td><select  class=" item_en form-control rounded-0" name="item_en[]" id="item_en" onchange="checkFilled();" > <option value="1">1</option> <option value="2">2</option></select></td>';
    cols += '<td><select  class="item_ar form-control rounded-0" name="item_ar[]" id="item_ar" disabled> <option value="5">5</option> <option value="6">6</option> </select></td>';


    // Insert the columns inside a row
    newRow.append(cols);

    // // Insert the row inside a table
    $("table").append(newRow);

// detail_ids.push($this.data(detail_id));
// $('#detail_id').val(detail_ids);
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
