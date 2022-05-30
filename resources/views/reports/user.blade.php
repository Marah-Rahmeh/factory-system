@extends('layouts.app')

@section('content')
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Clients Report') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('reports')}}>{{ __('Reports') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Clients Report') }}</li>
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
    {{-- <form action="{{ route('add-task') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="col-md-6">
            <div class="form-group">
                <strong>From:</strong>
                <input  type="date" name="from" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>To:</strong>
                <input  type="date" name="to"  id="to" class="form-control" >
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="btn-save" >Submit
            </button>
        </div>

    </form> --}}
    <hr>
    <div class="col-md-12 col-sm-12">

        <table class="table table-bordered table-responsive-lg first-1 shadow-lg" id="datatables">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Personal Id</th>
                <th>Home Number</th>
                <th>Mobile Number</th>
                <th>Creation Date</th>
                <th>Proposals No</th>
                <th>Contracts No</th>
                <th>Projects No</th>
            </tr>
            <tbody>
            </tbody>
        </table>
        <div>


{{-- <script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('print') }}",
          columns: [

              {data: 'first_name', name: 'first_name'},
              {data: 'personal_id', name: 'personal_id'},
              {data: 'home_number', name: 'home_number'},
              {data: 'mobile_number', name: 'mobile_number'},
          ]
      });

    });
  </script> --}}

<script type="text/javascript">

    $(document).ready( function () {
       $('#datatables').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('print') }}",
              columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'personal_id', name: 'personal_id'},
                    {data: 'home_number', name: 'home_number'},
                    {data: 'mobile_number', name: 'mobile_number'}
                    ]
          });
       });
   </script>
@endsection
