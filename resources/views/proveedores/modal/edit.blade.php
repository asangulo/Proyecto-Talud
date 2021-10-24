<form action="{{ route('proveedores.update', $proveedor->id )}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{ $proveedor->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Proveedor') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-nombre">{{ __('nombre') }}</label>
                        <input type="text" name="nombre" id="input-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{  old('nombre', $proveedor->nombre )}}" autofocus>

                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-apellido">{{ __('apellido') }}</label>
                        <input type="text" name="apellido" id="apellido" class="form-control form-control-alternative{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{  old('apellido', $proveedor->apellido )}}" autofocus>

                        @if ($errors->has('apellido'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-celular">{{ __('celular') }}</label>
                        <input type="text" name="celular" id="input-celular" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" value="{{  old('celular', $proveedor->celular )}}" autofocus>

                        @if ($errors->has('celular'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('celular') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-correo">{{ __('correo') }}</label>
                        <input type="text" name="correo" id="input-correo" class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{  old('correo', $proveedor->correo )}}" autofocus>

                        @if ($errors->has('correo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('correo') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('clave') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-clave">{{ __('clave') }}</label>
                        <input type="text" name="clave" id="input-clave" class="form-control form-control-alternative{{ $errors->has('clave') ? ' is-invalid' : '' }}" value="{{  old('clave', $proveedor->clave )}}" autofocus>

                        @if ($errors->has('clave'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('clave') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-estado">{{ __('estado') }}</label>
                        <input type="text" name="estado" id="input-estado" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" value="{{  old('estado', $proveedor->estado )}}" autofocus>

                        @if ($errors->has('estado'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('estado') }}</strong>
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
