<form action="{{ route('entradas.update', $entrada->id )}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{ $entrada->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Marca') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Fecha') }}</label>
                        <input type="date" name="fecha" id="input-name" class="form-control form-control-alternative{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="{{ $entrada->fecha }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
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
                        <button type="submit" class="btn btn-primary mt-4">{{ __('Actualizar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
