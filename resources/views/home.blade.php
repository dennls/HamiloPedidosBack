@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenido</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <b>Cantidad Pedidos</b>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $cantPedidosAnual }}</h3>
                                        <p>Cantidad de pedidos al año</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $cantPedidosMes }}</h3>
                                        <p>Cantidad de pedidos al mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-chart-bar"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $cantPedidosDia }}</h3>
                                        <p>Cantidad de pedidos al dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cubes"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <b>Monto de pedidos</b>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosAnual) }}</h3>
                                        <p>Monto de pedidos anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosMensual) }}</h3>
                                        <p>Monto de pedidos mensual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosDia) }}</h3>
                                        <p>Monto de pedidos dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <b>Monto de pedidos</b>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEntregadosAnual) }}</h3>
                                        <p>Monto pedidos entregados Anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEntregadosMes) }}</h3>
                                        <p>Monto pedidos entregados Mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEntregadosDia) }}</h3>
                                        <p>Monto pedidos entregados Dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosPendientesAnual) }}</h3>
                                        <p>Monto pedidos pendientes anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosPendientesMes) }}</h3>
                                        <p>Monto pedidos pendientes mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosPendientesDia) }}</h3>
                                        <p>Monto pedidos pendientes dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEnviadasAnual) }}</h3>
                                        <p>Monto pedidos enviados anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEnviadasMes) }}</h3>
                                        <p>Monto pedidos enviados mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ number_format($montoPedidosEnviadasDia) }}</h3>
                                        <p>Monto pedidos enviados dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosPendientesAnual) }}</h3>
                                        <p>Cantidad pedidos pendientes anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosPendientesMes) }}</h3>
                                        <p>Cantidad pedidos pendientes mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosPendientesDia) }}</h3>
                                        <p>Cantidad pedidos pendientes dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEnviadosAnual) }}</h3>
                                        <p>Cantidad pedidos enviados anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEnviadosMes) }}</h3>
                                        <p>Cantidad pedidos enviados Mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEnviadosDia) }}</h3>
                                        <p>Cantidad pedidos enviados Dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEntregadosAnual) }}</h3>
                                        <p>Cantidad pedidos entregados Anual</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEntregadosMes) }}</h3>
                                        <p>Cantidad pedidos entregados Mes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ number_format($cantPedidosEntregadosDia) }}</h3>
                                        <p>Cantidad pedidos entregados Dia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Lista de los ultimos 10 pedidos</div>

                        <div class="card-body">
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
                                        @foreach ($listaPedidos as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->cliente->name }}</td>
                                                <td>{{ $item->negocio->nombre }}</td>
                                                <td>{{ $item->fecha }}</td>
                                                <td>{{ $item->total }}</td>
                                                <td>
                                                    @if ($item->estado == 'Entregado')
                                                        <span class="badge badge-success">Entregado</span>
                                                    @elseif($item->estado == 'Enviado')
                                                        <span class="badge badge-warning">Enviado</span>
                                                    @else
                                                        <span class="badge badge-danger">Pendiente</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('/pedidos/ver/' . $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('/pedidos/actualizar/' . $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
