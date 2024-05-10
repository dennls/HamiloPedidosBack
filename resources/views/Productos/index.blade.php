@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-end">
                            <a href="{{ url('/productos/registrar') }}" class="btn btn-primary btn-sm">Nuevo producto</a>
                        </div>
                    </div>

                    @include('includes.alertas')

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IMAGEN</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCION</th>
                                    <th>COSTO</th>
                                    <th>ESTADO</th>
                                    <th>NEGOCIO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ $item->getImagenUrl() }}" alt="" height="20px">
                                        </td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->costo }}</td>
                                        <td>
                                            @if ($item->estado == true)
                                                <span class="badge badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/productos/actualizar/' . $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($item->estado == true)
                                                <a href="{{ url('/productos/estado/' . $item->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            @else
                                                <a href="{{ url('/productos/estado/' . $item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="{{ url('/productos/eliminar/' . $item->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/negocios/ver/'. $item->negocio->id ) }}" class="btn btn-link">{{ $item->negocio->nombre }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $productos->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
