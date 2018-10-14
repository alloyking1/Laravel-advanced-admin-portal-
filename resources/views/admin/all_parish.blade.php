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

                            <table id="parish" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Parish Name</th>
                                        <th>Area Name</th>    
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Parish Name</th>
                                        <th>Area Name</th> 
                                        
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
        $('#parish').DataTable({
            serverSide: true,
            processing: false,
            ajax: 'http://127.0.0.1:8000/admin/parish/data',
            columns: [
                {data: 'parish_name'},
                {data: 'parish_area_name'},
                
                // {data: 'action', orderable: false, searchable: true}
            ]
        });
    });
</script>
@endpush