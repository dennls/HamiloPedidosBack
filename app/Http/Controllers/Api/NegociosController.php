<?php

namespace App\Http\Controllers\Api;

use App\Models\Negocios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NegociosController extends Controller
{
    public function index()
    {
        $negocios = Negocios::where('estado', true)->with('usuario')->orderBy('id', 'DESC')->paginate(10);
        foreach ($negocios as $value) {
            $value->imagen = $value->getImagenUrl();
        }
        return response()->json(['mensaje' => 'Datos cargados correctamente', 'datos' => $negocios]);
    }
}
