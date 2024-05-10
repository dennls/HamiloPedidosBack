@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Negocios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Negocios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Listado de negocios</div>

                        <div class="card-body">
                            @include('includes.alertas')

                            <div class="row">
                                <div class="col-12 text-end">
                                    <a href="{{ url('/negocios/registrar') }}" class="btn btn-primary btn-sm">Nuevo
                                        negocio</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>IMAGEN</th>
                                                    <th>NOMBRE</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>ESTADO</th>
                                                    <th>USUARIO</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($negocios as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td class="text-center">
                                                            <img src="{{ $item->getImagenUrl() }}" alt=""
                                                                class="border" height="40px">
                                                        </td>
                                                        <td>{{ $item->nombre }}</td>
                                                        <td>{{ $item->descripcion }}</td>
                                                        <td>
                                                            @if ($item->estado == true)
                                                                <span class="badge badge-success">Activo</span>
                                                            @else
                                                                <span class="badge badge-danger">Inactivo</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->usuario->name }}</td>
                                                        <td>
                                                            <a href="{{ url('/negocios/ver/' . $item->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{ url('/negocios/actualizar/' . $item->id) }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            @if ($item->estado == true)
                                                                <a href="{{ url('/negocios/estado/' . $item->id) }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-ban"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/negocios/estado/' . $item->id) }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-check"></i>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $negocios->links('pagination::bootstrap-5') }}
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
