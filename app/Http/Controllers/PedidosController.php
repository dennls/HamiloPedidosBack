<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Twilio\Rest\Client;
use App\Models\Negocios;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function index(){
        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');

        $pedido = Pedidos::with('cliente', 'negocio')->whereIn('negocio_id', $arrayNeg)->orderBy('id', 'DESC')->paginate(10);
        return view('pedidos.index', compact('pedido'));
    }
    public function create(){
        return view('pedidos.create');
    }

    public function estado( $id, $estado){
        $pedido = Pedidos::with('cliente')->find($id);
        $pedido->estado = $estado;
        if ($pedido->save()) {
            //dd($pedido->cliente);
            //si el estado cambia a Enviado el sms es enviado
            if($estado == 'Enviado'){
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_TOKEN');
                $from = env('TWILIO_FROM');
                try{

                    $client = new Client($sid, $token);

                    $client->messages->create($pedido->cliente->telefono, [
                        'from' => $from,
                        'body' => "Su pedido con ID ". $pedido->id ." fue enviado"
            ]);
                }catch (\Throwable $th) {
                    return back()->with('info', 'No se pudo enviar el SMS');
                }
            }
            return back()->with('success', 'Estado cambiado');
        }else {
            return back()->with('error', 'Estado no cambiado');
        }
    }
    public function show($id){
        $pedido = Pedidos::with('cliente', 'negocio', 'detalles', 'detalles.producto')->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }
}
