<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Session;

use App\User;
use App\Membership;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function home(){
        if(Auth::user()){

             //obtiene todos los Membership ACTIVOS con status 0 (pendiente de pago)
        $monto_adeudado = Membership::where('enabled','=',1)
        ->where('status','=',0)
        ->sum('ammount');

        //obtiene todos los Membership ACTIVOS con status 1 (pagados)
        $monto_recaudado = Membership::where('enabled','=',1)
                ->where('status','=',1)
                ->sum('ammount');


        $matriculas_pendientes = Membership::where('enabled','=',1)
        ->where('membershiptype_id','=',2)
        ->where('status','=',0)
        ->count();

        $mensualidades_pendientes = Membership::where('enabled','=',1)
        ->where('membershiptype_id','=',1)
        ->where('status','=',0)
        ->count();

            return view('dashboards.home',compact('monto_adeudado',
            'monto_recaudado','matriculas_pendientes','mensualidades_pendientes'));
        }else{
            return view('templates.login');
        }
    }

    public function login(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $user_data = array (
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if(Auth::attempt(['email' => $user_data['email'], 'password' => $user_data['password']])){
            return back()->with('error','Error en las credenciales');
        }else{
            return back()->with('error','Error en las credenciales');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }


    public function passwordChange(){
        //busca el usuario en la bd
        $user = Auth::user();
        return view('users.passwordchange' , compact('user'));
    }

    public function passwordChangeProcess(Request $request){
        $user = Auth::user();
        $oldpassword = $request->oldpassword;

        if(Hash::check($oldpassword,$user->password)){
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
            $user->update($input);

            $userAutentificated = Auth::loginUsingId($user->id);
            return back()->with('success', 'Contraseña cambiada correctamente');
        }else{
            return back()->with('error','La clave antigua no corresponde')->withInput();
        }
    }
}
