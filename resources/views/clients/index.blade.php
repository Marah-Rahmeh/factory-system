@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Clients') }}</h2>
                </div>
                <div class="col-auto">
                    {{-- @can('user-create') --}}
                        <a href= {{route('clients/create')}} class="btn btn-success" style="color:white">
                            <span style="color:white"></span> {{ __('New') }}
                        </a>
                    {{-- @endcan --}}
                </div>
            </div>

            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="black-text active-2">{{ __('Dashboard') }}</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                                </li>
                                <li class="breadcrumb-item"><a class="black-text active-2" href="#">{{ __('Clients') }}</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                      </svg>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <div class="col-md-12 col-sm-12">
    <table class="table table-bordered table-responsive-lg first-1 shadow-lg">
        <tr>
            <th>id</th>
            <th hidden>user id</th>
            <th>Name</th>
            <th>Personal Id</th>
            <th>Home Number</th>
            <th>Mobile Number</th>
            <th>Creation Date</th>
            <th>Proposal</th>
            <th>Actions</th>

        </tr>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td hidden>{{ $client->user_id }}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->personal_id }}</td>
                <td>{{ $client->home_number }}</td>
                <td>{{ $client->mobile_number }}</td>
                <td>{{ $client->created_at }}</td>
                <td>
                    <form action="" method="POST" >
                        <a class="add" href={{ route('<proposal><id>add2',$client->id) }}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                </td>
                <td>
                    <form action="" method="POST" >
                            <a class="show" href={{ route('<client><id>show',$client->id) }}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                            </a>
                            <a class="edit" href={{ route('<client><id>edit',$client->id) }}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                            </a>
                            @csrf
                            @method('POST')
                            <a class="delete"  href={{ route('<clients><id>delete',$client->id) }}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                  </svg>
                                </a>

                        {{-- </button> --}}
                </td>

            </tr>
        @endforeach
    </table>

    {!! $clients->links() !!}
</div>
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
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Personal ID:</strong>
                            <input type="number" name="personal_id" class="form-control" placeholder="Put your Personal ID">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Put your Personal ID">
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
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <fieldset id="gender" class="form-control" name="gender" >
                                <input type="radio"  value="F">F<br>
                                <input type="radio" value="M">M<br>
                            </fieldset>
                        </div>
                    </div> --}}
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

/* Edit customer */
$('body').on('click', '#edit-client', function () {
var client_id = $(this).data('id');
$.get('clients/'+client_id+'/edit', function (data) {
$('#ajaxClientModel').html("Edit Client");
// $('#btn-update').val("Update");
// $('#btn-save').prop('disabled',false);
$('#ajax-client-model').modal('show');
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#personal_id').val(res.personal_id);
                $('#home_number').val(res.home_number);
                $('#office_number').val(res.office_number);
                $('#mobile_number').val(res.mobile_number);
})
});

    //   $('body').on('click', '.edit', function () {
    //       var id = $(this).data('id');

          // ajax
    //       $.ajax({
    //           type:"POST",
    //           url: "{{ url('update-clients') }}",
    //           data: { id: id },
    //           dataType: 'json',
    //           success: function(res){
    //             $('#ajaxClientModel').html("Edit Client");
    //             $('#ajax-client-model').modal('show');
    //             $('#id').val(res.id);
    //             $('#name').val(res.name);
    //             $('#personal_id').val(res.personal_id);
    //             $('#home_number').val(res.home_number);
    //             $('#office_number').val(res.office_number);
    //             $('#mobile_number').val(res.mobile_number);
    //          }
    //       });
    //   });

      $('body').on('click', '.delete', function () {
         if (confirm("Delete Record?") == true) {
          var id = $(this).data('id');

          // ajax
          $.ajax({
              type:"POST",
              url: "{{ url('delete-book') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                window.location.reload();
             }
          });
         }
      });

// Add Client
    $('body').on('click', '#btn-save', function (event) {
          var id = $("#id").val();
          var name = $("#name").val();
          var personal_id = $("#personal_id").val();
          var home_number = $("#home_number").val();
          var office_number = $("#office_number").val();
          var mobile_number = $("#mobile_number").val();
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);

        $.ajax({
            type:"POST",
            url: "{{route('add-clients')}}",
            data:   $("#addEditClientForm").serialize(),
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           },
           error: function (xhr, status, error)
                {
                    console.log(xhr.responseJSON.errors);
                    $.each(xhr.responseJSON.errors,function(key,item)
                    {

                        $("#error").html("<li class='alert alert-danger text-center p-1'>"+ item +" </li>");
                    })
                }

        });
    });
// End Add Client
});
</script>
@endsection
