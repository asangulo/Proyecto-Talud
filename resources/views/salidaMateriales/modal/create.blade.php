<form action="{{ route('salidaMateriales.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Nueva Salida Material') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Estado de la salida') }}</label>
                            <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado') }}" autofocus>

                            @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Seleccione el material') }}</label>
                            <select name="material_id" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                                <option value="">--Escoja  el material --</option>
                                @foreach ($entradaMateriales as $material_ent)
                                <option value="{{ $material_ent->id }}">{{ $material_ent->nombre }} - Disponible: {{$material_ent->cantidad}}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('material_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('material_id') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Ingrese la cantidad') }}</label>
                            <input type="number" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                            @endif
                        </div>



                        <div class="form-group{{ $errors->has('salida_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Escoja la salida') }}</label>
                            <select name="salida_id" id="salida_id" class="form-control form-control-alternative{{ $errors->has('salida_id') ? ' is-invalid' : '' }}">
                                <option value="">--Escoja  el salida --</option>
                                @foreach ($salidas as $salida)
                                <option value="{{ $salida['id'] }}">{{ $salida['fecha'] }}</option>

                                @endforeach
                            </select>
                            @if ($errors->has('salida_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('salida_id') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="text-center">
                            <a class="btn btn-danger mt-4"  href="{{ route('salidaMateriales.index') }}">{{ __('Volver') }}</a>
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
