<div>
    @include('includes.alertas')
    @if ($negocio_id > 0)
        negocio seleccionado {{$negocio_id}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Seleccionar productos</div>
                    <div class="card-body">
                        <input wire:model.live="buscarProducto" type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>IMAGEN</th>
                                    <th>PRODUCTO</th>
                                    <th>COSTO</th>
                                    <th>AGREGAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $itemProd)
                                    <tr>
                                        <td>
                                            <img src="{{ $itemProd->getImagenUrl() }}" alt="Img" height="40px">
                                        </td>
                                        <td>{{$itemProd->nombre }}</td>
                                        <td>{{$itemProd->costo }}</td>
                                        <td>
                                            <button wire:click="agregarCarrito({{ $itemProd }})" class="btn btn-primary">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$productos->links()}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Carrito</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buscarCliente">Buscar cliente</label>
                                    <input type="text" wire:model="buscarCliente" class="form-control">
                                    @error('buscarCliente') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buscarCliente">Buscar</label><br>
                                    <button wire:click="filtrarClientes()" class="btn btn-primary">
                                        BUscar <i class="fa fa-spinner" wire:loading wire:target="filtrarClientes()" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Selecionar cliente</label>
                                    <select wire:model.live="cliente_id" class="form-control" name="" id="">
                                        <option value="">Seleccionar</option>
                                        @foreach ($clientes as $itemcli)
                                            <option value="{{ $itemcli->id}}">{{ $itemcli->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Costo</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carrito as $key => $itemcar)
                                        <tr>
                                            <td>{{$itemcar['nombre']}}</td>
                                            <td>
                                                <input wire:model.live="carrito.{{ $key }}.cantidad" wire:change="calcularTotal" type="number" step="any" class="form-control">
                                            <td class="text-end">{{$itemcar['costo']}}</td>
                                            <td class="text-end">{{$itemcar['subtotal']}}</td>
                                            <td>
                                                <button wire:click="quitarProducto({{ $key }})" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td class="text-end">{{$total}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if ($cliente_id > 0 && $total > 0)
                            <div>
                                <button wire:click="guardarPedido()" class="btn btn-success">
                                    Guardar Pedido <i class="fa fa-spinner" wire:loading wire:target="guardarPedido()" aria-hidden="true"></i></button>
                            </div>
                        @else

                        @endif
                    </div>
                </div>
            </div>

        </div>





    @else
    <div class="row justify-content-center">
        @foreach ($negocios as $itemNeg)
        <div class="col-md-4 p-1">
            <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ $itemNeg->getImagenUrl() }}" alt="Img" class="rounded" height="200px">
                        <h2>{{$itemNeg->nombre}}</h2>
                        <button wire:click="seleccionaNegocio({{$itemNeg->id}})" class="btn btn-primary">Seleccionar</button>
                    </div>
                </div>

        </div>
        @endforeach
    </div>

    @endif
</div>
