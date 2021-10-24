<form action="{{ route('salidas.update', $salida->id )}}" method="post" enctype="multipart/form-data">
    {{ method_field('patch')}}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{ $salida->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar salida') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Fecha') }}</label>
                        <input type="date" name="fecha" id="input-name" class="form-control form-control-alternative{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="{{ $salida->fecha }}" required autofocus>

                        @if ($errors->has('fecha'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fecha') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('obra_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('obra_id') }}</label>
                        <select name="obra_id" id="obra_id" class="form-control form-control-alternative{{ $errors->has('obra_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el obra --</option>
                            @foreach ($obras as $obra)
                            <option value="{{ $obra['id'] }}">{{ $obra['nombre'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('obra_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('obra_id') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
