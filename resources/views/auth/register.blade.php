@extends('layouts.main', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('/img/fondo4.jpg') ,
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ml-auto">
            <div class="info-area info-horizontal">
              <div class="description">
                <div class="info-area info-horizontal mt-2">
                    <img src="{{ asset('/img/Sin.png') }}" alt="" srcset="">
                  </div>
              </div>
            </div>
        </div>
        <div class="col-md-4 mr-auto">
          <div class="text-center">
            <div class=" ">
              <h4 class="card-title">{{ __('Registro') }}</h4>
              {{-- <div class="card-header ">
                <div class="container">
                   <center> <img src="{{ asset('/img/nuevo.png') }}" alt=""></center>
                </div>
            </div> --}}

            </div>

            <div class="card-body ">
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!--Begin input name -->
                <div class="input-group lg {{ $errors->has('name') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input email -->
                <div class="input-group lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" type="email" name="email" value="{{ old('email') }}" required>
                 </div>
                 @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <!--Begin input user type-->

                <!--Begin input password -->
                <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('contraseña') }}" type="password" name="password" required>
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input confirm password -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i></i>
                    </div>
                  </div>
                  <input class="form-control" placeholder="{{ __('Confirmar Contraseña') }}" type="password" name="password_confirmation" required>
                </div>

                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg">{{__('Registrar')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
