@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Pedidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Pedidos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">Lista de pedidos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <a href="{{ url('/pedidos/registrar') }}" class="btn btn-primary btn-sm">Nuevo pedido</a>
                        </div>
                    </div>

                    @include('includes.alertas')

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CLIENTE</th>
                                    <th>NEGOCIO</th>
                                    <th>FECHA</th>
                                    <th>TOTAL</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->cliente->name}}</td>
                                        <td>{{ $item->negocio->nombre }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>
                                            @if ($item->estado == "Entregado")
                                                <span class="badge badge-success">Entregado</span>
                                            @elseif($item->estado == "Enviado")
                                                <span class="badge badge-warning">Enviado</span>
                                            @else
                                                <span class="badge badge-danger">Pendiente</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/pedidos/ver/' . $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/pedidos/actualizar/' . $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>                                            
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pedido->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
