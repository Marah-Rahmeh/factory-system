@extends('layouts.app')

@section('content')

<form>
<strong>From: </strong>
<input type="date" id="from">

<strong>To: </strong>
<input type="date" id="to">
</form>
<hr>
<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            {{-- <th hidden>user id</th> --}}
            <th>Name</th>
            <th>Personal Id</th>
            <th>Home Number</th>
            <th>Mobile Number</th>
            <th>Creation Date</th>
            <th>Proposals No</th>
            <th>Contracts No</th>
            <th>Projects No</th>
        </tr>
    </thead>
    <body>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                {{-- <td hidden>{{ $client->user_id }}</td> --}}
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->personal_id }}</td>
                <td>{{ $client->home_number }}</td>
                <td>{{ $client->mobile_number }}</td>
                <td>{{ $client->created_at }}</td>
                <td>{{ $client->proposals_no }}</td>
                <td>{{ $client->contracts_no }}</td>
                <td>{{ $client->projects_no }}</td>
        @endforeach
    </body>
    </table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        searching: true,
        ordering:  true,
        select: true
    } );
} );
</script>


@endsection
