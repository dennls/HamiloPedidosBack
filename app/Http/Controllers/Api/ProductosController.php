<?php

namespace App\Http\Controllers\Api;

use App\Models\Productos;
use App\Models\Negocios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductosController extends Controller
{
    public function index($id)
    {
        $negocio = Negocios::find($id);
        $negocio->imagen = $negocio->getImagenUrl();
        $productos = Productos::where('negocio_id', $id)->orderBy('id', 'DESC')->paginate(10);

        foreach ($productos as $value) {
            $value->imagen = $value->getImagenUrl();
        }
        return response()->json(['mensaje' => 'Datos cargados', 'datos' => $productos, 'negocio' => $negocio]);
    }
}
