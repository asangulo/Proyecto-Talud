<form action="{{ route('clientes.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Nuevo Cliente') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                            <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}" autofocus>

                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('apellido') }}</label>
                            <input type="text" name="apellido" id="input-name" class="form-control form-control-alternative{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el apellido de la marca ') }}" value="{{ old('apellido') }}" autofocus>

                            @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('correo') }}</label>
                            <input type="email" name="correo" id="input-name" class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el correo de la marca ') }}" value="{{ old('correo') }}" autofocus>

                            @if ($errors->has('correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('celular') }}</label>
                            <input type="text" name="celular" id="input-name" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el celular de la marca ') }}" value="{{ old('celular') }}" autofocus>

                            @if ($errors->has('celular'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('clave') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('clave') }}</label>
                            <input type="password" name="clave" id="input-name" class="form-control form-control-alternative{{ $errors->has('clave') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el clave de la marca ') }}" value="{{ old('clave') }}" autofocus>

                            @if ($errors->has('clave'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('clave') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('direcccion') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('direccion') }}</label>
                            <input type="text" name="direcccion" id="input-name" class="form-control form-control-alternative{{ $errors->has('direcccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el direccion de la marca ') }}" value="{{ old('direcccion') }}" autofocus>

                            @if ($errors->has('direcccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direcccion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class="btn btn-danger mt-4"  href="{{ route('clientes.index') }}">{{ __('Volver') }}</a>
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
