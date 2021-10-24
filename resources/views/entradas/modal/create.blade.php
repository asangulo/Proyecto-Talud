<form action="{{ route('entradas.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Nueva Entrada') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Fecha') }}</label>
                        <input type="date" name="fecha" id="input-name" class="form-control form-control-alternative{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el fecha de la marca ') }}" value="{{ old('fecha') }}" autofocus>

                        @if ($errors->has('fecha'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fecha') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('proveedor_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('proveedor_id') }}</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-control form-control-alternative{{ $errors->has('proveedor_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el proveedor --</option>
                            @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor['id'] }}">{{ $proveedor['nombre'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('proveedor_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('proveedor_id') }}</strong>
                            </span>
                        @endif

                    </div>
                        <div class="text-center">
                            <a class="btn btn-danger mt-4"  href="{{ route('entradas.index') }}">{{ __('Volver') }}</a>
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
