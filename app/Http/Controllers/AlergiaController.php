<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyUserAlergiaRequest;
use App\Http\Requests\StoreAlergiaRequest;
use App\Http\Requests\StoreAlergiaUserRequest;
use App\Models\Alergia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlergiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $alergia = Alergia::query();

        $responseData = [];
        $filtros = [];
        $usuariosAlergicos = [];

        if ($request->has("alergiaSeleccionada") && $request->get("alergiaSeleccionada")) {
            
            $filtros["alergiaSeleccionada"] = $request->get("alergiaSeleccionada");

            $usuariosAlergicos = $alergia->find($request->alergiaSeleccionada)->usuarios();

            $usuariosAlergicos = $usuariosAlergicos->paginate(10,["*"],"usuarios");
            
            $alergia = Alergia::query();

        }

        if ($request->has("texto") && $request->get("texto")) {
                
            $filtros["texto"] = $request->get("texto");

            $alergia->where("nombre","like","%".$request->texto."%");

        }

        if ($request->has("alergias") && $request->get("alergias")) {
            $filtros["alergias"] = $request->get("alergias");
        }

        if ($request->has("usuarios") && $request->get("usuarios")) {
            $filtros["usuarios"] = $request->get("usuarios");
        }


        $alergias = $alergia->orderBy('updated_at','DESC')->paginate(5,["*"],"alergias");

        // Log::debug($alergias);

        Log::debug($request->all());
        Log::debug($alergias);
        Log::debug($usuariosAlergicos);

        $responseData["alergias"] = $alergias;
        $responseData["usuariosAlergicos"] = $usuariosAlergicos;
        $responseData["filtros"] = $filtros;

        return view('admin.alergias.index', $responseData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.alergias.anadir");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createuser()
    {

        $usuarios = User::query()->where("tipo","usuario")->get();
        $alergias = Alergia::all();

        return view("admin.alergias.anadirUsuario",[
            "usuarios" => $usuarios,
            "alergias" => $alergias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlergiaRequest $request)
    {
        
        $alergia = new Alergia();

        $alergia->nombre = $request->nombre;

        $alergia->save();

        return redirect()->route("alergias.create")->with("mensaje","exito");

    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeuser(StoreAlergiaUserRequest $request)
    {

        $alergia = Alergia::where("id",$request->alergia)->first();

        $alergia->usuarios()->attach($request->usuario);

        return redirect()->route("alergias.anadirusuario")->with("mensaje","exito");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroyUser(DestroyUserAlergiaRequest $request)
    {
        $alergia = Alergia::where("id",$request->alergia)->first();
        $usuarios = $request->usuariosSeleccionados;

        foreach ($usuarios as $usuario) {
            
            $alergia->usuarios()->detach($usuario);

        }

        return redirect()->route("alergias.index")->with("mensaje",trans("destroy.exitoUsuarioAlergia",["alergia" => $alergia->nombre]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $alergia = Alergia::find($id);

        Alergia::destroy($id);

        return redirect()->route("alergias.index")->with("mensaje",trans("destroy.exitoAlergia",["alergia" => $alergia->nombre]));

    }


}
