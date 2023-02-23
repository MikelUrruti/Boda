@extends('layouts.form')


@section("assetsFormulario")
    @vite(['resources/css/confirmarinvitacion.css','resources/js/confirmarinvitacion.js'])
@endsection

@section('action',route("confirmarinvitacion.store"))
@section('method','POST')
@section('id','confirmarinvitacionForm')

@section('tituloPagina',__("confirmarinvitacion.titulo"))
@section('tituloFormulario',__("confirmarinvitacion.tituloFormulario"))


@section('contenidoFormulario')

    @csrf

    {{-- {{ $user->alergias }} --}}

    <div class="row justify-content-center g-0">
        <div class="col-6 text-center bg-light datosTab" id="misDatosBtn">
            {{ __("confirmarinvitacion.misDatos") }}
        </div>
        <div class="col-6 text-center bg-dark text-light datosTab" id="datosParejaBtn">
            {{ __("confirmarinvitacion.datosPareja") }}
        </div>
    </div>

    @if (session('mensaje'))
        
    <div class="row justify-content-center mt-4 g-0">
        <h3 class="col-12 col-md-11 col-lg-10 text-success text-center fw-bold">
            {{ __("anadir.exito") }}
        </h3>
    </div>

    @endif

    <div class="mt-4 row g-0 justify-content-center">
    
        <div id="misDatos" class="col-11 col-sm-10">

        
            <div class="row g-0">
                <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                    <label for="">{{ __("anadir.nombre") }}</label>
                    <input type="text" name="nombre" id="" value="{{ $user->nombre ? $user->nombre : ''}}" class="d-block my-2 w-100 px-3 cajaTexto">
                </div>
            </div>
            <div class="row g-0">
                <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                    <label for="">{{ __("anadir.apellido") }}</label>
                    <input type="text" name="apellido" id="" value="{{ $user->apellido ? $user->apellido : ''}}" class="d-block my-2 w-100 px-3 cajaTexto">
                </div>
            </div>
            <div class="row g-0">
                <div class="col col-sm-9 col-md-8 col-lg-7 my-2">
                    <label for="">{{ __("confirmarinvitacion.confirmado") }}</label>
                    <select name="confirmado" class="d-block my-2 p-2 w-50 cajaTexto" id="confirmado">
                        <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                        <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>
                    </select>
                </div>
            </div>

            <div id="datosConfirmado" class="d-none">
                
                <div class="row g-0">
                    <div class="col col-sm-10 col-lg-9 my-2">
                        <label for="">{{ __("confirmarinvitacion.transporte") }}</label>
                        <select name="transporte" class="d-block my-2 p-2 w-50 cajaTexto" id="">
                            <option value="No" selected>{{ __("confirmarinvitacion.opcionesTransporte.no") }}</option>
                            <option value="Ida">{{ __("confirmarinvitacion.opcionesTransporte.ida") }}</option>
                            <option value="Vuelta">{{ __("confirmarinvitacion.opcionesTransporte.vuelta") }}</option>
                            <option value="Ambos">{{ __("confirmarinvitacion.opcionesTransporte.ambos") }}</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col col-sm-10 col-lg-9 my-2">
                        <label for="">{{ __("confirmarinvitacion.tieneAlergia") }}</label>
                        <select name="tieneAlergia" class="d-block my-2 p-2 w-50 cajaTexto" id="tieneAlergia">
                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                            <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>
                        </select>
                    </div>
                </div>

                <div class="row g-0 d-none" id="alergiaRow">
                    <div class="col col-sm-10 col-lg-12 my-2">
                        <label for="" >{{ __("confirmarinvitacion.indicaAlergias") }}</label>
                        <div class="row g-0" id="rowAlergias">
                            <div class="col-12 d-none" id="rowAlergia">
                                <select class="my-2 p-2 w-50 cajaTexto alergiaSelect">
                                    <option value="">{{ __("confirmarinvitacion.seleccionarOpcion") }}</option>
                                    <option value="Otro">{{ __("confirmarinvitacion.otraAlergia") }}</option>
                                    @foreach ($alergiasExistentes as $alergia)
                                        <option value="{{ $alergia->id }}">{{ $alergia->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="" class="d-none cajaTexto cajaOtro">
                                <button class="d-inline bg-danger border-0 rounded-pill botonAlergia eliminarAlergiaBtn" title="{{ __("confirmarinvitacion.eliminarAlergia") }}"><i class="fas fa-minus"></i></button>
                            </div>
                            <div class="col-12">
                                <select name="alergias[]" class="my-2 p-2 w-50 cajaTexto alergiaSelect">
                                    <option value="">{{ __("confirmarinvitacion.seleccionarOpcion") }}</option>
                                    <option value="Otro">{{ __("confirmarinvitacion.otraAlergia") }}</option>
                                    @foreach ($alergiasExistentes as $alergia)
                                        <option value="{{ $alergia->id }}">{{ $alergia->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="otros[]" id="" class="d-none cajaTexto cajaOtro">
                                <button class="d-inline bg-success border-0 rounded-pill botonAlergia" title="{{ __("confirmarinvitacion.anadirAlergia") }}" id="anadirAlergiaBtn"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row g-0">
                    <div class="col col-sm-10 my-2">
                        <p>{{ __("confirmarinvitacion.recordatorio") }}</p>
                        <button class="border-0 botonAzulTurquesaRadius px-4" id="datosParejaBtnRecordado">{{ __("confirmarinvitacion.datosPareja") }}</button>
                    </div>
                </div>
    
            </div>

            </div>
    
            
        <div id="datosParejaTab" class="d-none col-11 col-sm-10">
            @if ($user->parejaInvitado || $user->parejaInvitadoHijo)
    
                <div class="row g-0" id="tieneParejaRow">
                    <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                        <label for="">{{ __("confirmarinvitacion.tienePareja") }}</label>
                        <select name="tienePareja" class="d-block my-2 p-2 cajaTexto" id="tienePareja" disabled>
                            <option value="Si" selected>{{ __("administracion.tipoSiNo.si") }}</option>
                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0" id="parejaRow">
                    <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                        <label for="">{{ __("confirmarinvitacion.pareja") }}</label>
                        <select name="pareja" class="d-block my-2 p-2 cajaTexto" id="parejaSelect" disabled>
                            {{-- <option value="{{ $user->parejaInvitado->id }}">{{ $user->parejaInvitado->nombre }} {{ $user->parejaInvitado->apellido }}</option> --}}
                            @if ($user->parejaInvitado)
                                <option value="{{ $user->parejaInvitado->id }}">{{ $user->parejaInvitado->nombre }} {{ $user->parejaInvitado->apellido }}</option>
                            @else
                                <option value="{{ $user->parejaInvitadoHijo->id }}">{{ $user->parejaInvitadoHijo->nombre }} {{ $user->parejaInvitadoHijo->apellido }}</option>
                            @endif
                        </select>
                    </div>
                </div>
            @else
                <div class="row g-0" id="tieneParejaRow">
                    <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                        <label for="">{{ __("confirmarinvitacion.tienePareja") }}</label>
                        <select name="tienePareja" class="d-block my-2 p-2 cajaTexto" id="tienePareja">
                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                            <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0 d-none" id="parejaRow">
                    <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                        <label for="">{{ __("confirmarinvitacion.pareja") }}</label>
                        <select name="pareja" class="d-block my-2 p-2 cajaTexto" id="parejaSelect">
                            <option value="" selected>{{ __("confirmarinvitacion.seleccionarOpcion") }}</option>
                            <option value="Otro">{{ __("confirmarinvitacion.otraPareja") }}</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" nombre="{{ $usuario->nombre }}" apellido="{{ $usuario->apellido }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="datosPareja" class="d-none">
                    
                    <div class="row g-0">
                        <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                            <label for="">{{ __("confirmarinvitacion.nombrePareja") }}</label>
                            <input type="text" name="nombrePareja" id="" value="" class="d-block my-2 w-100 px-3 cajaTexto">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                            <label for="">{{ __("confirmarinvitacion.apellidoPareja") }}</label>
                            <input type="text" name="apellidoPareja" id="" value="" class="d-block my-2 w-100 px-3 cajaTexto">
                        </div>
                    </div>
                    <div class="row g-0 d-none" id="correoParejaRow">
                        <div class="col col-sm-10 col-md-8 col-lg-7 my-2">
                            <label for="">{{ __("confirmarinvitacion.correoPareja") }}</label>
                            <input type="text" name="correoPareja" id="" class="d-block my-2 w-100 px-3 cajaTexto">
                        </div>
                    </div>
                    <div class="row g-0 d-none" id="transporteParejaRow">
                        <div class="col col-sm-10 col-lg-9 my-2">
                            <label for="">{{ __("confirmarinvitacion.transportePareja") }}</label>
                            <select name="transportePareja" class="d-block my-2 p-2 w-50 cajaTexto" id="">
                                <option value="No" selected>{{ __("confirmarinvitacion.opcionesTransporte.no") }}</option>
                                <option value="Ida">{{ __("confirmarinvitacion.opcionesTransporte.ida") }}</option>
                                <option value="Vuelta">{{ __("confirmarinvitacion.opcionesTransporte.vuelta") }}</option>
                                <option value="Ambos">{{ __("confirmarinvitacion.opcionesTransporte.ambos") }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 d-none" id="tieneAlergiaParejaRow">
                        <div class="col col-sm-10 col-lg-9 my-2">
                            <label for="">{{ __("confirmarinvitacion.tieneAlergia") }}</label>
                            <select name="tieneAlergiaPareja" class="d-block my-2 p-2 w-50 cajaTexto" id="tieneAlergiaPareja">
                                <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                                <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 d-none" id="alergiaRowPareja">
                        <div class="col col-sm-10 col-lg-12 my-2">
                            <label for="" >{{ __("confirmarinvitacion.indicaAlergiasPareja") }}</label>
                            <div class="row g-0" id="rowAlergiasPareja">
                                <div class="col-12 d-none" id="rowAlergiaPareja">
                                    <select class="my-2 p-2 w-50 cajaTexto alergiaSelectPareja">
                                        <option value="">{{ __("confirmarinvitacion.seleccionarOpcion") }}</option>
                                        <option value="Otro">{{ __("confirmarinvitacion.otraAlergia") }}</option>
                                        @foreach ($alergiasExistentes as $alergia)
                                            <option value="{{ $alergia->id }}">{{ $alergia->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" id="" class="d-none cajaTexto cajaOtro">
                                    <button class="d-inline bg-danger border-0 rounded-pill botonAlergia eliminarAlergiaBtn" title="{{ __("confirmarinvitacion.eliminarAlergia") }}"><i class="fas fa-minus"></i></button>
                                </div>
                                <div class="col-12">
                                    <select name="alergiasPareja[]" class="my-2 p-2 w-50 cajaTexto alergiaSelectPareja">
                                        <option value="">{{ __("confirmarinvitacion.seleccionarOpcion") }}</option>
                                        <option value="Otro">{{ __("confirmarinvitacion.otraAlergia") }}</option>
                                        @foreach ($alergiasExistentes as $alergia)
                                            <option value="{{ $alergia->id }}">{{ $alergia->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="otrosPareja[]" id="" class="d-none cajaTexto cajaOtro">
                                    <button class="d-inline bg-success border-0 rounded-pill botonAlergia" title="{{ __("confirmarinvitacion.anadirAlergia") }}" id="anadirAlergiaBtnPareja"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
    
            @endif
        </div>
    
    </div>

    

    
    {{-- {{ $errors }} --}}



    <div class="row justify-content-center pb-4 g-0 mt-4">
            <div class="col-11 col-sm-9 col-md-8 col-lg-7 g-0 text-center">
                <input id="botonEnviar" type="submit" value="{{ __("confirmarinvitacion.confirmarDatos") }}" class="btn w-100 botonBlanco">
            </div>
    </div>
    <div class="row justify-content-center pb-4 g-0">
        <div class="col-11 col-sm-9 col-md-8 col-lg-7 g-0 text-center">
            {{-- <input id="" type="submit" value="{{ __("anadir.volver") }}" class="btn w-100 botonRojo"> --}}
            <a href="{{ route("inicio") }}" class="btn w-100 botonRojo" >{{ __("anadir.volver") }}</a>
        </div>
    </div>

    @if (count($errors) > 0)
        
        <div class="row justify-content-center pb-4 g-0">

            <div class="col-11 col-md-10 col-lg-9 text-danger text-center fw-bold text-decoration-underline fs-5">

                {{ $errors->first() }}

            </div>

        </div>

    @endif



@endsection