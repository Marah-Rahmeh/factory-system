@extends('layouts.app')

@section('content')

<form>
    <strong>From: </strong>
    <input type="date" id="from">

    <strong>To: </strong>
    <input type="date" id="to">
    {{-- href= {{route('clients/create')}} --}}
    <a  class="btn btn-success" style="color:white" id="set">
        <span style="color:white"></span> {{ __('SET') }}
    </a>
</form>
    <hr>

           <div class="card-body">
                <div class="table-responsive">
                        <table class="display nowrap" style="width:100%" id="quiztable">
                        <thead>
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
                        </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                </div>
            </div>

<script>
        $('#quiztable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        searching: true,
        ordering:  true,
        processing:true,
        serverSide:true,
        ajax:{
            url: '{{route("print-report")}}'
            },
            columns: [
                    {data: 'id', name: 'id'},
                    { data: 'first_name', name: 'first_name' },
                    { data: 'personal_id', name: 'personal_id' },
                    { data: 'home_number', name: 'home_number' },
                    { data: 'mobile_number', name: 'mobile_number' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'proposals_no', name: 'proposals_no' },
                    { data: 'contracts_no', name: 'contracts_no' },
                    { data: 'projects_no', name: 'projects_no' }
                 ],

        });

$('#set').on('click', function () {
                    alert($('#from').val());
                   var from_date = $('#from').val();
                   var to_date = $('#to').val();
                    table = $('#quiztable').DataTable();
                    // $('#quiztable').DataTable().ajax.reload();
                    $.ajax({
                                url: '{{route("print-report")}}',
                                method:"GET",
                                data: {
                                        from: from_date,
                                        to: to_date
                                        },
                                success: function (response) {
                                        $('#quiztable').remove();
                                        var t = $('#quiztable').DataTable();

                                        $("#tbody").children().remove();

                                        console.log(response.data);
                                        var html = '';
                                        $.each(response.data, function(k, v) {

                                                html += '<tr>';
                                                html += '<td>' + v.id + '</td>';
                                                html += '<td>' + v.first_name + '</td>';
                                                html += '<td>' + v.personal_id + '</td>';
                                                html += '<td>' + v.home_number + '</td>';
                                                html += '<td>' + v.mobile_number + '</td>';
                                                html += '<td>' + v.created_at + '</td>';
                                                html += '<td>' + v.proposals_no + '</td>';
                                                html += '<td>' + v.contracts_no + '</td>';
                                                html += '<td>' + v.projects_no+ '</td>';
                                                html += '</tr>';

                                            console.log(html);
                                            // $("#tbody").append(html)

                                            $('#tbody').html(html);

                                                            });

                            }
                            });

});

</script>
@endsection
