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

        @include('inc.superSidebar')
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        <div class="page-wrapper">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Areas</h4>
                        <h6 class="card-subtitle">List of all Areas in this Provinces</h6>
                        <div class="table-responsive m-t-40">
                            <table id="area" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Area Name</th>
                                        <th>Area Admin</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Area Name</th>
                                        <th>Area Admin</th>
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
        $('#area').DataTable({
            serverSide: true,
            processing: false,
            ajax: 'http://127.0.0.1:8000/adminSuper/area/all/data',
            columns: [
                {data: 'area_name'},
                {data: 'area_admin_name'},
                // {data: 'action', orderable: false, searchable: true}
            ]
        });
    });
</script>
@endpush