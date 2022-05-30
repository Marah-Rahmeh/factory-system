@extends('layouts.app')

@section('content')

<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Contract Id</th>
            <th>Client Name</th>
            <th>Manager Name</th>
            <th>Plane Delivery Date</th>
            <th>Delivery Date</th>
            <th>Status</th>
            <th>Creation Date</th>
        </tr>
    </thead>
    <body>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->contract_id }}</td>
                <td>{{ $project->client_name }}</td>
                <td>{{ $project->manager_name }}</td>
                <td>{{ $project->plane_delivery_date }}</td>
                <td>{{ $project->delivery_date }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->created_at }}</td>
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
