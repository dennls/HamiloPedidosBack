<?php

namespace App\Http\Controllers;

use App\Models\User;
use Twilio\Rest\Client;
use App\Models\Negocios;
use App\Models\Pedidos;

use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arrayNeg = Negocios::where('usuario_id', auth()->user()->id)->get()->pluck('id');
        //cantidad de ventas
        $cantPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->count();
        //cantidad de ventas mensual
        $cantPedidosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        //cantidad de ventas al dia
        $cantPedidosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->count();
        //monto total de pedidos anual
        $montoPedidosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->sum('total');
        //monto total de pedidos mensual
        $montoPedidosMensual = Pedidos::whereIn('negocio_id', $arrayNeg)->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        //monto total de pedidos dia
        $montoPedidosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->whereDate('fecha', date('Y-m-d'))->sum('total');
        //monto de ventas entregadas anual
        $montoPedidosEntregadosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->sum('total');
        //monto de ventas entregadas mensual
        $montoPedidosEntregadosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        //monto de ventas entregadas dia
        $montoPedidosEntregadosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereDate('fecha', date('Y-m-d'))->sum('total');

        //monto de ventas pendientes anual
        $montoPedidosPendientesAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereYear('fecha', date('Y'))->sum('total');
        //monto de ventas pendientes mensual
        $montoPedidosPendientesMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        //monto de ventas pendientes dia
        $montoPedidosPendientesDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereDate('fecha', date('Y-m-d'))->sum('total');
        
        //monto total de ventas enviadas anual
        $montoPedidosEnviadasAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereYear('fecha', date('Y'))->sum('total');
        //monto total de ventas enviadas mensual
        $montoPedidosEnviadasMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->sum('total');
        //monto total de ventas enviadas dia
        $montoPedidosEnviadasDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereDate('fecha', date('Y-m-d'))->sum('total');
        
        //cantidad de pedidos Pendientes Anual
        $cantPedidosPendientesAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereYear('fecha', date('Y'))->count();
        //cantidad de pedidos Pendientes Mes
        $cantPedidosPendientesMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        //cantidad de pedidos Pendientes Dia
        $cantPedidosPendientesDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Pendiente')->whereDate('fecha', date('Y-m-d'))->count();


        //cantidad de pedidos Enviados Anual
        $cantPedidosEnviadosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereYear('fecha', date('Y'))->count();
        //cantidad de pedidos Enviados Mes
        $cantPedidosEnviadosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        //cantidad de pedidos Enviados Dia
        $cantPedidosEnviadosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Enviado')->whereDate('fecha', date('Y-m-d'))->count();


        //cantidad de pedidos Entregados Anual
        $cantPedidosEntregadosAnual = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->count();
        //cantidad de pedidos Entregados Mes
        $cantPedidosEntregadosMes = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereYear('fecha', date('Y'))->whereMonth('fecha', date('m'))->count();
        //cantidad de pedidos Entregados Dia
        $cantPedidosEntregadosDia = Pedidos::whereIn('negocio_id', $arrayNeg)->where('estado', 'Entregado')->whereDate('fecha', date('Y-m-d'))->count();


        //lista de los ultimos 10 pedidos
        $listaPedidos = Pedidos::whereIn('negocio_id', $arrayNeg)->with('cliente', 'negocio')->orderBy('id', 'DESC')->take(10)->get();
        return view('home', compact('cantPedidosAnual', 'cantPedidosMes', 'cantPedidosDia', 'montoPedidosAnual', 'montoPedidosMensual',
                                    'montoPedidosDia', 'montoPedidosEntregadosAnual', 'montoPedidosEntregadosMes', 'montoPedidosEntregadosDia',
                                    'montoPedidosPendientesAnual', 'montoPedidosPendientesMes', 'montoPedidosPendientesDia',
                                    'montoPedidosEnviadasAnual', 'montoPedidosEnviadasMes','montoPedidosEnviadasDia',
                                    'cantPedidosPendientesAnual','cantPedidosPendientesMes','cantPedidosPendientesDia',
                                    'cantPedidosEnviadosAnual','cantPedidosEnviadosMes','cantPedidosEnviadosDia',
                                    'cantPedidosEntregadosAnual','cantPedidosEntregadosMes','cantPedidosEntregadosDia', 'listaPedidos'));
        /*  */
    }
    public function verificar(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required|numeric'
        ]);
        $usuario = User::where('id', auth()->user()->id)->first();
        if ($usuario->otp == $request->otp) {
            $usuario->verificado = true;
            $usuario->save();
            return redirect('/home');
        } else {
            return back()->with('error', 'El codigo otp es incorrecto');
        }
    }
    //reenviar el otp
    public function reenviar(){
        $ParaOtp = rand(100000, 999999);

        $usuario = User::where('id', auth()->user()->id)->first();
        $usuario->otp = $ParaOtp;
        $usuario->save();


        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $from = env('TWILO_FROM');
        try {
            $client = new Client($sid, $token);

            $client->messages->create($usuario->telefono, [
                'from' => $from,
                'body' => "Tu codigo OTP es: " . $ParaOtp . ". No lo compartas con nadie"
            ]);
            return redirect('/home')->with('info', 'se envio el OTP');
        } catch (\Throwable $th) {
            return redirect('/home')->with('info', 'No se pudo enviar el OTP');
        }

    }
}
