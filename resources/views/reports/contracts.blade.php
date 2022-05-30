@extends('layouts.app')

@section('content')

{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script> --}}

<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Proposal Id</th>
            <th>Client Name</th>
            <th>Price Amount</th>
            <th>Start Date</th>
            <th>Delivery Date</th>
            <th>Creation Date</th>
            <th>Has Contract</th>

        </tr>
    </thead>
    <body>
        @foreach ($contracts as $contract)
            <tr>
                <td>{{ $contract->id }}</td>
                <td>{{ $contract->proposal_id }}</td>
                <td>{{ $contract->client_name }}</td>
                <td>{{ $contract->price_amount }}</td>
                <td>{{ $contract->start_date }}</td>
                <td>{{ $contract->delivery_date }}</td>
                <td>{{ $contract->created_at }}</td>
                <td>{{ $contract->has_project }}</td>
        @endforeach
    </body>
    </table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
});
</script>


@endsection
