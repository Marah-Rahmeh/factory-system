@extends('layouts.app')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Client</h2>
            </div>
            <div class="pull-right">
                <div class="col-md-12 mt-1 mb-2">
                    <button type="button" id="addNewClient" class="btn btn-success">Add</button>
                </div>
            </div>
    </div>
{{--
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif --}}
    <div class="col-md-12">
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>id</th>
            <th>user id</th>
            <th>Name</th>
            <th>Personal id</th>
            <th>Home Number</th>
            <th>Mobile Number</th>
            <th>Date Created</th>
            <th>Actions</th>

        </tr>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->user_id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->personal_id }}</td>
                <td>{{ $client->home_number }}</td>
                <td>{{ $client->mobile_number }}</td>
                <td>{{ $client->created_at }}</td>
                <td>
                    <button class="btn btn-info edit" data-route="{{url('/edit-client/'.$row->id)}}" data-toggle="modal" data-target="#exampleModal2">Edit <i class="fa fa-edit"></i> </button>
                    <button class="btn btn-danger delete" data-route="{{url('/delete-client/'.$row->id)}}" >Delete <i class="fa fa-times"></i> </button>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $clients->links() !!}
</div>
    <!-- Modal -->
   <!-- boostrap model -->
   <div class="modal fade" id="ajax-client-model" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="ajaxClientModel"></h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="addEditClientForm" name="addEditClientForm" class="form-horizontal" method="POST">
            <input type="hidden" name="id" id="id">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>personal ID:</strong>
                        <input type="number" name="personal_id" class="form-control" placeholder="Put your Personal ID">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Home Number:</strong>
                        <input type="number" name="home_number" class="form-control" placeholder="Home Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Office Number:</strong>
                        <input type="number" name="office_number" class="form-control" placeholder="Office Number">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile Number:</strong>
                        <input type="number" name="mobile_number" class="form-control" placeholder="Mobile Number">
                    </div>
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="btn-save" value="addNewClient">Save changes
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- end bootstrap model -->



<script type="text/javascript">

   $(document).ready(function($){
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $('#addNewClient').click(function () {
        $('#addEditClientForm').trigger("reset");
        $('#ajaxClientModel').html("Add Client");
        $('#ajax-client-model').modal('show');
    });


$('body').on('click', '#btn-save', function (event) {
    event.preventDefault()

          var id = $("#id").val();
          var name = $("#name").val();
          var personal_id = $("#personal_id").val();
          var home_number = $("#home_number").val();
          var office_number = $("#office_number").val();
          var mobile_number = $("#mobile_number").val();

    $.ajax({
      url: store,
      type: "POST",
      data: {
        id:id,
        name:name,
        personal_id:personal_id,
        home_number:home_number,
        office_number:office_number,
        mobile_number:mobile_number
      },
      dataType: 'json',
      success: function (data) {

          $('#companydata').trigger("reset");
          $('#modal-id').modal('hide');
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Success',
            showConfirmButton: false,
            timer: 1500
          })
          get_company_data()
      },
      error: function (data) {
          console.log('Error......');
      }
  });
});

    </script>

@endsection
