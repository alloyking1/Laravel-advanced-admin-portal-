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

            <div class="container-fluid">
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Change Password') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="/admin/password">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="pass_reset" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="pass_reset" type="password" class="form-control{{ $errors->has('pass_reset') ? ' is-invalid' : '' }}" name="pass_reset" value="{{ old('pass_reset') }}" required autofocus>

                                                @if ($errors->has('pass_reset'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pass_reset') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Change') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>    
@endsection