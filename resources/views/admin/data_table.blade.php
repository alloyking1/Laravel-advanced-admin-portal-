@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Area</th>
                <th>Parish</th>
                <th>Phone Number</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')

<script>
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: false,
            ajax: 'http://127.0.0.1:8000/datatable/test/show',
            columns: [
                {data: 'firstname'},
                {data: 'gender'},
                {data: 'address'},
                {data: 'dob'},
                {data: 'area'},
                {data: 'parish'},
                {data: 'phone'},
                {data: 'action', orderable: false, searchable: true}
            ]
        });
    });
</script>
@endpush