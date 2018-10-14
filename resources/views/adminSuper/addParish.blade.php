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
                                <div class="card-header">{{ __('Add Parish') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="/adminSuper/area/parish/save">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="parishName" class="col-md-4 col-form-label text-md-right">{{ __('Parish Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="parishName" type="text" class="form-control{{ $errors->has('parishName') ? ' is-invalid' : '' }}" name="parishName" value="{{ old('parishName') }}" required autofocus>

                                                @if ($errors->has('parishName'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('parishName') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- add area drop down -->
                                        <div class="form-group row">
                                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                                            <div class="col-md-6">
                                                <select id="area" class="form-control" name="area" value="{{ old('area') }}">
                                                    @foreach($area as $area)
                                                        <option value="{{$area->area_name}}">{{$area->area_name}}</option>  
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('area'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('area') }}</strong>
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