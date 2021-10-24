<form action="{{ route('permissions.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear Un Nuevo permiso') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Nombre del permiso') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>


                        </div>
                        <div class="text-center">
                            <a class="btn btn-danger mt-4"  href="{{ route('permissions.index') }}">{{ __('Volver') }}</a>
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
