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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/negocios/actualizar/'.$negocio->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="{{$negocio->nombre}}">
                                    @error('nombre')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" accept="imagen/" class="form-control" name="imagen">
                                    @error('imagen')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control">{{$negocio->descripcion}}</textarea>
                                    @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="text-center">
                                    <img src="{{ $negocio->getImagenUrl() }}" alt="" height="80px">
                                </div>
                                <div class="form-group text-center mt-3">
                                    <a href="{{ url('/negocios') }}" class="btn btn-primary ">Volver al listado</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
