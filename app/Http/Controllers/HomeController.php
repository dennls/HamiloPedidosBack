<?php

namespace App\Http\Controllers;

use App\Models\User;
use Twilio\Rest\Client;

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
        return view('home');
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
