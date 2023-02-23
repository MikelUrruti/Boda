<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyUserRequest;
use App\Http\Requests\StoreConfirmarInvitacionRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\enviarCredenciales;
use App\Mail\EnviarInvitacion;
use App\Models\Alergia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        // Log::debug("test");

        $user = User::query();

        $responseData = [];
        $filtros = [];

        if ($request->has("confirmados") && $request->get("confirmados")) {
            
            $filtros["confirmados"] = $request->get("confirmados");

            if ($request->get("confirmados") == "Si") {
                $user->where("confirmado","Si");
            }
            elseif ($request->get("confirmados") == "No") {
                $user->where("confirmado","No");
            }
            else {
                $filtros["confirmados"] = "Todos";
            }

        }

        if ($request->has("alergicos") && $request->get("alergicos")) {
            
            $filtros["alergicos"] = true;

        }

        if ($request->has("texto") && $request->get("texto")) {
            
            $user->where("nombre","like","%".$request->texto."%");
            $user->orWhere("apellido","like","%".$request->texto."%");
            $user->orWhere("correo","like","%".$request->texto."%");

            $filtros["texto"] = $request->get("texto");

        }

        if ($request->has("tipo") && $request->get("tipo")) {

            $filtros["tipo"] = $request->get("tipo");

            if ($request->get("tipo") == "Admin") {
                $user->where("tipo","Admin");
            }
            elseif ($request->get("tipo") == "Usuario") {
                $user->where("tipo","Usuario");
            }
            else {
                $filtros["tipo"] = "Todos";
            }
        }
        if ($request->has("transporte") && $request->get("transporte")) {

            $filtros["transporte"] = $request->get("transporte");

            if ($request->get("transporte") == "Ambos") {
                $user->where("transporte","Ambos");
            }
            elseif ($request->get("transporte") == "Vuelta") {
                $user->where("transporte","Vuelta");
            }
            elseif ($request->get("transporte") == "Ida") {
                $user->where("transporte","Ida");
            }
            elseif ($request->get("transporte") == "No") {
                $user->where("transporte","No");
            }
            else {
                $filtros["transporte"] = "Todos";
            }
        }
        if ($request->has("pareja") && $request->get("pareja")) {

            $filtros["pareja"] = $request->get("pareja");

            if ($request->get("pareja") == "Si") {
                // $user->whereHas("parejaInvitado")->orWhereHas("parejaInvitadoHijo");
                $user->where(function ($query) use ($user) {
                    $query->whereHas('parejaInvitado')
                    ->orWhereHas('parejaInvitadoHijo');
                });
            }
            elseif ($request->get("pareja") == "No") {
                $user->doesntHave("parejaInvitado")->doesntHave("parejaInvitadoHijo");
            }
            else {
                $filtros["pareja"] = "Todos";
            }
        }
        if ($request->has("id") && $request->get("id")) {

            $user->where("id",$request->get("id"));
            $filtros["tipo"] = "Todos";
            
        }

        $users = $user->orderBy('updated_at','DESC')->with("parejaInvitado")->with("parejaInvitadoHijo")->paginate(5);

        Log::debug($users);

        $responseData["users"] = $users;
        $responseData["filtros"] = $filtros;

        return view('admin.usuarios.index', $responseData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.usuarios.anadir");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = new User();

        $generadorRandom = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $passwordGenerada = substr($generadorRandom, 0, 15);

        $user->correo = $request->correo;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->tipo = $request->tipo;
        $user->password = Hash::make($passwordGenerada);

        $user->save();

        //Vuelvo a poner la password sin el hash para mandarsela por correo al usuario invitado

        $user->password = $passwordGenerada;

        Mail::to($user->correo)->send(new EnviarInvitacion($user));
        
        return redirect()->route("admin.create")->with("mensaje","exito");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showConfirmarInvitacion(Request $request)
    {
        
        $responseData = [];

        $responseData['user'] = User::query()->where("id",auth()->user()->id)->with(["parejaInvitado","parejaInvitadoHijo","alergias"])->get()->first();

        $responseData['usuarios'] = User::query()->where("tipo","usuario")->whereNot("id",auth()->user()->id)->doesntHave("parejaInvitado")->doesntHave("parejaInvitadoHijo")->orderBy("nombre")->get(['id','nombre','apellido']);

        $responseData['alergiasExistentes'] = Alergia::all();

        return view("confirmarinvitacion",$responseData);

    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function storeConfirmarInvitacion(StoreConfirmarInvitacionRequest $request)
    {

        Log::debug($request->all());
        
        $user = User::find(auth()->user()->id);

        $user->nombre = $request->get("nombre");
        $user->apellido = $request->get("apellido");

        if ($request->get("confirmado") && $request->get("confirmado") == "Si") {
            
            $user->transporte = $request->get("transporte");

            if ($request->get("tienePareja") && $request->get("tienePareja") == "Si") {
                
                if ($request->get("pareja") == "Otro") {
                    
                    $userPareja = new User();

                    $userPareja->nombre = $request->get("nombrePareja");
                    $userPareja->apellido = $request->get("apellidoPareja");
                    $userPareja->transporte = $request->get("transportePareja");
                    $userPareja->correo = $request->get("correoPareja");
                    $userPareja->tipo = "Usuario";
                    $userPareja->confirmado = "Si";
                    $userPareja->externo = "Si";

                    $userPareja->save();

                    $user->pareja = $userPareja->id;

                    if ($request->get("tieneAlergiaPareja") && $request->get("tieneAlergiaPareja") == "Si") {

                        if ($request->get("alergiasPareja")) {
        
                            foreach ($request->get("alergiasPareja") as $alergia) {
        
                                if ($alergia !== "" && $alergia !== "Otro") {
                                    $userPareja->alergias()->attach($alergia);
                                }
        
                            }
        
                        }
        
                        if ($request->get("otrosPareja")) {
                            
                            foreach ($request->get("otrosPareja") as $otraAlergia) {
        
                                $alergiaExistente = Alergia::query()->where("nombre",$otraAlergia)->get();

                                if (count($alergiaExistente) > 0) {
                                    
                                    $userPareja->alergias()->attach($alergiaExistente->id);
        
                                } else {

                                    $alergiaNueva = new Alergia();
        
                                    $alergiaNueva->nombre = $otraAlergia;
            
                                    $alergiaNueva->save();
            
                                    $userPareja->alergias()->attach($alergiaNueva->id);

                                }
        

        
                            }
        
                        }
            
                    }


                } else {

                    $user->pareja = $request->get("pareja");

                }
    
            }

            if ($request->get("tieneAlergia") && $request->get("tieneAlergia") == "Si") {

                if ($request->get("alergias")) {

                    foreach ($request->get("alergias") as $alergia) {

                        if ($alergia !== "" && $alergia !== "Otro") {
                            $user->alergias()->attach($alergia);
                        }

                    }

                }

                if ($request->get("otros")) {
                    
                    foreach ($request->get("otros") as $otraAlergia) {

                        if (count(Alergia::query()->where("nombre",$otraAlergia)->get()) > 0) {
                            
                            break;

                        }

                        $alergiaNueva = new Alergia();

                        $alergiaNueva->nombre = $otraAlergia;

                        $alergiaNueva->save();

                        $user->alergias()->attach($alergiaNueva->id);

                    }

                }
    
            }
    
            $user->confirmado = "Si";

        } else {

            $user->confirmado = "No";

        }

        $user->save();

        return redirect()->route("confirmarinvitacion.confirmado");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyUserRequest $request)
    {

        Log::debug("prueba");

        $ids = $request->usuariosSeleccionados;

        $idsParejas = [];

        foreach ($ids as $id) {
            
            Log::debug($id);

            $usuario = User::find($id)->first();

            Log::debug($usuario);

            if ($usuario->parejaInvitado || $usuario->parejaInvitadoHijo) {
                
                $idsParejas[count($idsParejas)] =  $usuario->parejaInvitado->id || $usuario->parejaInvitadoHijo->id;

            }

        }

        User::whereIn('id', $ids)->delete();

        if (count($idsParejas) > 0) {
            User::whereIn('id', $idsParejas)->delete();
        }

        return redirect()->back();
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyAll(DestroyUserRequest $request)
    {

        Log::debug("prueba");

        $ids = $request->usuariosSeleccionados;

        $idsParejas = [];

        foreach ($ids as $id) {
            
            Log::debug($id);

            $usuario = User::where("id",$id)->with("parejaInvitado")->with("parejaInvitadoHijo")->first();

            Log::debug($usuario);

            if ($usuario->parejaInvitado) {

                //Esto se hace para comprobar si la pareja ha sido agregada por una fuente externa

                if ($usuario->parejaInvitado->externo === "Si") {

                    $idsParejas[count($idsParejas)] = $usuario->parejaInvitado->id;

                }

            }



        }

        // return $ids;

        // return $idsParejas;

        User::whereIn('id', $ids)->delete();

        if (count($idsParejas) > 0) {
            User::whereIn('id', $idsParejas)->delete();
        }

        return redirect()->back()->with("mensaje",trans("destroy.exito"));
    }



}
