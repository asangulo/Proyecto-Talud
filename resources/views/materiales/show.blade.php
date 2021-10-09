@extends('layouts.main', ['title' => __('Detalles del Tipo material')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Usuarios</div>
            <p class="card-category">Vista detallada de usuarios {{ $material->nombre }}</p>
          </div>
          <!-- body -->
           <div class="card-body">
            <div class="row">
              {{-- <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#">
                          <img src="{{ asset('/img/theme/team-1.jpg') }}" alt="imagen" class="avatar">
                          <h5 class="title mt-3"> Nombre: {{ $material->name }}</h5>
                        </a>
                        <p class="descripcion">
                           Correo: {{ $material->email }}   <br>
                           Fecha de creación: {{ $material->created_at }}  <br>

                        </p>
                      </div>
                    </p>
                    <div class="card-descripcion">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio deleniti error quidem, aliquam neque asperiores dolorem id reprehenderit inventore minima qui, maxime, earum enim repellat laboriosam vel laborum cumque voluptatem.
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <button class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>  --}}
{{-- sugundo card --}}
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#" class="d-flex">
                          <img src="{{ asset('/img/theme/team-1.jpg') }}" alt="imagen" class="avatar">
                          <h5 class="title mx-3"> Nombre: {{ $material->tamaño }}</h5>
                        </a>
                        <p class="descripcion">
                           Correo: {{ $material->cantidad }}   <br>
                           Fecha de creación: {{ $material->created_at }}  <br>

                        </p>
                      </div>
                    </p>
                    <div class="card-descripcion">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio deleniti error quidem, aliquam neque asperiores dolorem id reprehenderit inventore minima qui, maxime, earum enim repellat laboriosam vel laborum cumque voluptatem.
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ route('materiales.index') }}" class="btn btn-sm btn-success mr-3" >Volver</a>
                      <button class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
