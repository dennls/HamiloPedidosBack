<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NegociosController extends Controller
{
    public function index()
    {
        $negocios = Negocios::with('usuario')->orderBy('id', 'DESC')->paginate(10);
        return view('negocios.index', compact('negocios'));
    }
    public function create()
    {
        return view('negocios.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:negocios',
            'imagen' => 'required|image|mimes:png,jpg,jpeg',
            'descripcion' => 'required|string|min:10|max:500'
        ]);
        if ($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('negocios_') . '.png';
            if (!is_dir(public_path('/imagenes/negocios/'))) {
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path() . '/imagenes/negocios/', 0777, true);
            }
            $subido = $imagen->move(public_path() . '/imagenes/negocios/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }
        $negocio = new Negocios();
        $negocio->nombre = $request->nombre;
        $negocio->imagen = $nombreImagen;
        $negocio->descripcion = $request->descripcion;
        $negocio->estado = true;
        $negocio->usuario_id = auth()->user()->id;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Registro agregado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }

    public function edit($id)
    {
        $negocio = Negocios::find($id);
        return view('negocios.edit', compact('negocio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:negocios,nombre,'.$id,
            'imagen' => 'nullable|image|mimes:png,jpg,jpeg',
            'descripcion' => 'required|string|min:10|max:500'
        ]);

        $negocio = Negocios::find($id);


        if ($request->file('imagen')) {
            //eliminar imagenes anteriores
            if ($negocio->imagen != 'default.png') {
                if (file_exists(public_path() . '/imagenes/negocios/' . $negocio->imagen)) {
                    unlink(public_path() . '/imagenes/negocios/' . $negocio->imagen);
                }
            }
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('negocios_') . '.png';
            if (!is_dir(public_path('/imagenes/negocios/'))) {
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path() . '/imagenes/negocios/', 0777, true);
            }
            $subido = $imagen->move(public_path() . '/imagenes/negocios/', $nombreImagen);
            $negocio->imagen = $nombreImagen;
        }
        $negocio->nombre = $request->nombre;

        $negocio->descripcion = $request->descripcion;
        $negocio->estado = true;
        $negocio->usuario_id = auth()->user()->id;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Registro fue actualizado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }

    public function estado($id){
        $negocio = Negocios::find($id);
        $negocio->estado = !$negocio->estado;
        if ($negocio->save()) {
            return redirect('/negocios')->with('success', 'Estado actualizado correctamente!');
        } else {
            return back()->with('error', 'El estado no fué actualizado!');
        }
    }

    public function show($id){
        $negocio = Negocios::find($id);
        $productos = Productos::where('negocio_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('negocios.show', compact('negocio', 'productos'));
    }
}
