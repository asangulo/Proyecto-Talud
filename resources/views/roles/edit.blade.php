@extends('layouts.main', [
    'namePage' => 'roles',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',
  ])

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Editar roles</h5>
                    </div>

                    <form action="{{ route('roles.update', $role->id) }}" method="post"   class="form-horizontal">
                        @csrf
                        @method('PUT')


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{  old('name', $role->name )}}" autofocus>


                            </div>

                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-contect">
                                            <div class="tab-pane active">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($permissions as $id => $permission )
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $permission->description }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                            </div>
                        </div>

                    </form>
                    <hr class="my-4" />
                </div>

        </div>

    </div>
@endsection
