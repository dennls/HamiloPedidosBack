<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductosController extends Controller
{
    public function index()
    {
        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');
        $productos = Productos::whereIn('negocio_id', $arrayNeg)->orderBy('id', 'DESC')->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        return view('productos.create', compact('negocios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'costo' => 'required|numeric',
            'imagen' => 'required|image|mimes:png,jpg,jpeg',
            'descripcion' => 'required|string|min:10|max:500',
            'negocio_id' => 'required|exists:negocios,id'
        ]);
        if ($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('productos_') . '.png';
            if (!is_dir(public_path('/imagenes/productos/'))) {
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path() . '/imagenes/productos/', 0777, true);
            }
            $subido = $imagen->move(public_path() . '/imagenes/productos/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }
        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->imagen = $nombreImagen;
        $producto->costo = $request->costo;
        $producto->descripcion = $request->descripcion;
        $producto->estado = true;
        $producto->negocio_id = $request->negocio_id;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Registro agregado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }
    public function edit($id)
    {
        $negocios = Negocios::where('usuario_id', auth()->user()->id)->get();
        $producto = Productos::find($id);
        return view('productos.edit', compact('producto', 'negocios'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'costo' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'required|string|min:10|max:500',
            'negocio_id' => 'required|exists:negocios,id'
        ]);
        $producto = Productos::find($id);
        if ($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('productos_') . '.png';
            if (!is_dir(public_path('/imagenes/productos/'))) {
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path() . '/imagenes/productos/', 0777, true);
            }
            $subido = $imagen->move(public_path() . '/imagenes/productos/', $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->nombre = $request->nombre;
        $producto->costo = $request->costo;
        $producto->descripcion = $request->descripcion;
        $producto->estado = true;
        $producto->negocio_id = $request->negocio_id;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Registro agregado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }
    public function estado($id)
    {
        $producto = Productos::find($id);
        $producto->estado = !$producto->estado;
        if ($producto->save()) {
            return redirect('/productos')->with('success', 'Estado actualizado correctamente!');
        } else {
            return back()->with('error', 'El estado no fué actualizado!');
        }
    }

}
