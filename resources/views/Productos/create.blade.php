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

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/productos/registrar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
                                    @error('nombre')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" accept="imagen/" class="form-control" name="imagen" value="{{old('imagen')}}">
                                    @error('imagen')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="costo">Costo del producto</label>
                                    <input type="number" step="any" class="form-control" name="costo" value="{{old('costo')}}">
                                    @error('costo') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion del producto</label>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control" value="{{old('descripcion')}}"></textarea>
                                    @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Negocios</label>
                                    <select name="negocio_id" id="" class="form-control">
                                        <option value="">Seleccione un negocio..</option>
                                        @foreach ($negocios as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-center">
                                    <a href="{{ url('/productos') }}" class="btn btn-primary ">Volver al listado</a>
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
