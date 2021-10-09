@extends('layouts.main', ['page' => __('CrearUsuario'), 'pageSlug' => 'CrearUsuario'])

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear Usuario') }}</h5>
    </div>
    <form method="post" action="{{ route('usuarios.store') }}" autocomplete="off">
        <div class="card-body">
                @csrf

                @include('alerts.success')

                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label>{{ _('Name') }}</label>
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('name') }}" autofocus>
                    @include('alerts.feedback', ['field' => 'name'])
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>{{ _('Email address') }}</label>
                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo') }}" value="{{ old('email') }}" autofocus>
                    @include('alerts.feedback', ['field' => 'email'])
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label>{{ _('Contraseña') }}</label>
                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
        </div>
    </form>
    <hr class="my-4" />
</div>



@endsection
