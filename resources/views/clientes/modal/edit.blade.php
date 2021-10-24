<form action="{{ route('clientes.update', $cliente->id )}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{ $cliente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar cliente') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                        <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre', $cliente->nombre) }}" autofocus>

                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('apellido') }}</label>
                        <input type="text" name="apellido" id="input-name" class="form-control form-control-alternative{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el apellido de la marca ') }}" value="{{ old('apellido', $cliente->apellido) }}" autofocus>

                        @if ($errors->has('apellido'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('correo') }}</label>
                        <input type="email" name="correo" id="input-name" class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el correo de la marca ') }}" value="{{ old('correo', $cliente->correo) }}" autofocus>

                        @if ($errors->has('correo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('correo') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('celular') }}</label>
                        <input type="text" name="celular" id="input-name" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el celular de la marca ') }}" value="{{ old('celular', $cliente->celular) }}" autofocus>

                        @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('clave') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('clave') }}</label>
                        <input type="password" name="clave" id="input-name" class="form-control form-control-alternative{{ $errors->has('clave') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el clave de la marca ') }}" value="{{ old('clave', $cliente->clave) }}" autofocus>

                        @if ($errors->has('clave'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('clave') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('direcccion') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('direccion') }}</label>
                        <input type="text" name="direcccion" id="input-name" class="form-control form-control-alternative{{ $errors->has('direcccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el direccion de la marca ') }}" value="{{ old('direcccion', $cliente->direcccion) }}" autofocus>

                        @if ($errors->has('direcccion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('direcccion') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4">{{ __('Actualizar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
