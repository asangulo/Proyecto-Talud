@extends('layouts.main', ['title' => __('Marcas')])

@section('content')

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tables</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('categoria.create') }}" class="btn btn-sm btn-neutral">Nueva Categoria</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Light table</h3>
            <div>
              @if (session('success'))
              <div class="alert alert-warning" role="alert">
                {{ session('success') }}
              @endif
            </div>
            </div>
          </div>



<div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="sort" data-sort="id">ID</th>
          <th scope="col" class="sort" data-sort="nombre">Nombre</th>
          <th scope="col" class="sort" data-sort="created_at">Created_at</th>
          <th scope="col" class="sort text-right" >Acciones</th>
        </tr>
      </thead>

      <tbody class="list">
          @foreach ($categorias as $categoria )


         <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->created_at }}</td>
            <td class="text-right" >

                {{-- <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info btn-sm"><i class="ni ni-single-02">Detalle</i></a> --}}
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm"><i class="ni ni-single-02">Edit</i></a>
                 <form action="{{ route('categorias.delete', $categoria->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="ni ni-fat-remove ">Eliminar</i>
                    </button>
                </form>
            </td>
         </tr>
         @endforeach
      </tbody>
    </table>
    <div class="card-footer mr-auto">
        {{ $categorias->links() }}
        </div>
</div>

@endsection
