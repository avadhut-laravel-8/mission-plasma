@extends('layouts.app')

@section('styles')
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success float-right" href="{{ route('donors.create') }}" title="Add Donor"> <i class="fa fa-plus-circle"></i> Add Donor</a>
            <h2>Plasma Donors</h2>
            <hr>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table id="donor-table" class="table table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Blood Group</th>
                        <th>Positive Date</th>
                        <th>Negative Date</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

<script>
    $(document).ready( function () {
        var i = 1;
        $('#donor-table').DataTable({
            // dom: 'Bfrtip',
            // buttons: ['copy', 'excel', 'pdf','csv'],
            // "order": [[ 0, "desc" ]],
            'bJQueryUI': true,
            'sPaginationType': 'full_numbers',
            "aaData"     : {!! json_encode($donors) !!},
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "gender" },
                { "data": "age" },
                { "data": "blood_group" },
                { "data": "positive_date" },
                { "data": "negative_date" },
                { "data": "state" },
                { "data": "city" },
                { "data": "phone_number" },
            ],
            "columnDefs": [
                { 
                    "targets": 0,
                    "render": function ( data, type, row, meta ) {
                        return i++;
                    }
                },
                // { 
                //     "targets": 4,
                //     "render": function ( data, type, row, meta ) {
                //         var BASE_URL = '<?php url('/'); ?>';
                //         return '<form action="'+ base_url +'/employees/'+ row.slug +'" method="POST"><input type="hidden" name="_token" value="'+'{{csrf_token()}}'+'"><input type="hidden" name="_method" value="DELETE"><a href="' + BASE_URL + 'employees/' + row.id + '"><i class="fa fa-edit  fa-lg"></i></a><button type="submit" data-toggle="tooltip"  data-original-title="Delete" class="delete-employee" style="border: none; background-color:transparent;cursor: pointer;"><i class="fa fa-trash fa-lg text-danger"></i></button></form>';
                //     }
                // },
            ]
        });   
    }); 
</script>
@endsection


