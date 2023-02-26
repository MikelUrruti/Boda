@extends('layouts.template')

@section('assets')
    @vite(['resources/css/informacionrelevante.css'])
@endsection

@section('title','Información relevante')

@section("bodyClass",'h-100')

@section('content')

    <div class="container-fluid my-5 ">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-xxl-10 cajaContainer">
                <div class="row justify-content-center tituloCaja">
                    <div class="col-12 text-center my-3 textoTituloCaja">
                        Unai & Silvia
                    </div>
                </div>
                <div class="row g-1">
                    <div class="col-12 col-lg-7 mt-4 pt-2">
                        <div class="row my-2">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.bienvenida") }}
                            </div>
                        </div>
                        <div class="row mt-4 mb-3">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.adelantofecha") }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center destacarTexto">
                                {{ __("informacionrelevante.fecha") }}
                            </div>
                        </div>
                        <div class="row mt-4 mb-3">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.adelantolugar") }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center destacarTexto">
                                {{ __("informacionrelevante.lugar") }}
                            </div>
                        </div>
                        <div class="d-none d-lg-block">
                            <div class="row my-4">
                                <div class="col-12 text-center">
                                    {{ __("informacionrelevante.notaceremonia") }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    {{ __("informacionrelevante.postceremonia") }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center destacarTexto">
                                    {{ __("informacionrelevante.notapostceremonia") }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-5 text-center mt-4">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-10 col-sm-8 col-md-7 col-lg-11">
                                <div class="d-block w-100 text-center">
                                    <img src="{{ asset('imagenes/calendario.png') }}" alt="" class="w-100 imagen">
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 g-0 d-lg-none">
                        <div class="row my-4">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.notaceremonia") }}
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.postceremonia") }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center destacarTexto">
                                {{ __("informacionrelevante.notapostceremonia") }}
                            </div>
                        </div>
                        {{-- <div class="row my-4">
                            <div class="col-12 text-center">
                                {{ __("informacionrelevante.postceremonia2") }}
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row my-2 g-0">
                    {{-- <div class="row justify-content-center text-center my-2">
                        <div class="col-12">
                            {{ __("informacionrelevante.postceremonia") }}
                        </div>
                    </div> --}}
                    <div class="row justify-content-center text-center mt-4 mb-2 g-0">
                        <div class="col-12">
                            {{ __("informacionrelevante.aportacion") }}
                        </div>
                    </div>
                    <div class="row my-3 g-0">
                        <div class="col-6 text-center">
                            <p>
                                Silvia:
                            </p>
                            <p>
                                680539542
                            </p>
                        </div>
                        <div class="col-6 text-center">
                            <p>
                                Unai:
                            </p>
                            <p>
                                688618008
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center pb-3 g-0">
                        <div class="col-12 col-sm-11 col-lg-8 col-xxl-7">
                            <a href="{{ route("inicio") }}" class="btn w-100 botonBlanco" >{{ __("informacionrelevante.regresarmenu") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer class="container-fluid">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">

            </div>
        </div>
    </footer> --}}

@endsection