@extends('layouts.main', [
    'namePage' => 'salida material',
    'class' => 'sidebar-mini',
    'activePage' => 'salidaMaterial',
  ])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                @can('salidasMateriales.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir Salida Material</a>
                @endcan
              </div>
            <h4 class="card-title"> Salida Material </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                  <th>ID</th>
                  <th>Estado</th>
                  <th>Cantidad Retirada</th>
                  <th>Material</th>
                  <th>ID Salida</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($salidaMateriales as $salidaMaterial )
                  <tr>
                    <td>{{ $salidaMaterial->id }}</td>
                    <td>{{ $salidaMaterial->estado }}</td>
                    <td>{{ $salidaMaterial->cantidad}}</td>
                    <td>{{ $salidaMaterial->material->nombre }}</td>
                    <td>{{ $salidaMaterial->salida->fecha }}</td>
                    <td class="text-right" >
                        @can('salidasMateriales.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $salidaMaterial->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>

                        @endcan
                        @can('salidasMateriales.destroy')
                        <form action="{{ route('salidaMateriales.destroy', $salidaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                  <i >Eliminar</i>
                            </button>
                        </form>
                        @endcan

                      </td>
                      @include('SalidaMateriales.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $salidaMateriales->links() }}
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
            <h5 class="title">{{ _('Crear salida') }}</h5>
        </div>
        <form method="post" action="{{ route('salidaMateriales.store') }}" autocomplete="off">
            <div class="card-body">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Estado de la salida') }}</label>
                            <input type="text" name="estado[]" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado') }}" autofocus>

                            @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Seleccione el material') }}</label>
                            <select name="material_id[]" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
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
                            <input type="number" name="cantidad[]" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                            @if ($errors->has('cantidad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                            @endif
                        </div>



                        <div class="form-group{{ $errors->has('salida_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Escoja la salida') }}</label>
                            <select name="salida_id[]" id="salida_id" class="form-control form-control-alternative{{ $errors->has('salida_id') ? ' is-invalid' : '' }}">
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
                            {{-- <a class="btn btn-danger mt-4"  href="{{ route('salidaMateriales.index') }}">{{ __('Volver') }}</a> --}}
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </div>
        </form>
        <hr class="my-4" />
    </div>
    </div>
  </div>
  @include('salidaMateriales.modal.create')
@endsection
