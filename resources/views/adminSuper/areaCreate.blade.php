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

            <div class="container-fluid">
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Add Area') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="/adminSuper/createArea/save">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="areaName" class="col-md-4 col-form-label text-md-right">{{ __('Area Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="areaName" type="text" class="form-control{{ $errors->has('areaName') ? ' is-invalid' : '' }}" name="areaName" value="{{ old('areaName') }}" required autofocus>

                                                @if ($errors->has('firstname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('areaName') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="areaAdmin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                                            <div class="col-md-6">
                                                <input id="areaAdmin" type="text" class="form-control{{ $errors->has('areaAdmin') ? ' is-invalid' : '' }}" name="areaAdmin" value="{{ old('areaAdmin') }}" required autofocus>

                                                @if ($errors->has('areaAdmin'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('areaAdmin') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
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