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
                                @if(Session::has('added'))
                                    <div class="alert alert-info">{{Session::get('added')}}</div>
                                @endif

                                @if(Session::has('closed'))
                                    <div class="alert alert-info">{{Session::get('closed')}}</div>
                                @endif

                                <div class="card-header">{{ __('Add Camper') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="/adminSuper/area">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control{{ $errors->has('firtsname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                                @if ($errors->has('firstname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                                @if ($errors->has('lastname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Camper Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date OF Birth') }}</label>

                                            <div class="col-md-6">
                                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" required>

                                                @if ($errors->has('dob'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('dob') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>

                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                            <div class="col-md-6">
                                                <select id="gender" class="form-control" name="gender" value="{{ old('gender') }}">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>

                                                @if ($errors->has('gender'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('gender') }}</strong>
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

                                        <!-- add parish dropdown -->
                                        <div class="form-group row">
                                            <label for="parish" class="col-md-4 col-form-label text-md-right">{{ __('Parish') }}</label>

                                            <div class="col-md-6">
                                                <select id="parish" class="form-control" name="parish" value="{{ old('parish') }}">
                                                    @foreach($parish as $parish)
                                                        <option value="{{$parish->parish_name}}">{{$parish->parish_name}}</option>  
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('parish'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('parish') }}</strong>
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