@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('inc.nav')

        @include('inc.sidebar')
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Campers</h4>
                        <h6 class="card-subtitle">List of all comapers in this area for this year(2018)</h6>
                        <div class="table-responsive m-t-40">

                            <table id="campers" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Date of Birth</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                        <th>Parish</th>
                                        <th>Phone</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Date of Birth</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                        <th>Parish</th>
                                        <th>Phone</th>
                                        
                                    </tr>
                                </tfoot>
                                
                            </table>

                        </div>
                    </div>
                </div>
                
            </div>

        </div>
        
    </div> 
    
@endsection

@push('scripts')

<script>
    $(function () {
        $('#campers').DataTable({
            serverSide: true,
            processing: false,
            ajax: 'http://127.0.0.1:8000/admin/campers/data',
            columns: [
                {data: 'firstname'},
                {data: 'gender'},
                {data: 'address'},
                {data: 'dob'},
                {data: 'email'},
                {data: 'area'},
                {data: 'parish'},
                {data: 'phone'},
                
                // {data: 'action', orderable: false, searchable: true}
            ]
        });
    });
</script>
@endpush