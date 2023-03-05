@extends('layouts.template')

@section('assets')
    @vite(['resources/css/formulario.css','resources/css/administracion.css','resources/js/administracion/alergias.js'])
@endsection

@section('title',__("alergias.tituloVentana"))

@section('content')

    @include("layouts.menuadministracion")

    {{-- <h1 class="text-center my-4">{{ __("administracion.titulo") }}</h1> --}}

    @if (count($errors) > 0)
        
        <div class="row justify-content-center pb-4 g-0 mt-4">

            <div class="col-11 col-md-10 col-lg-9 text-danger text-center fw-bold text-decoration-underline fs-5">

                {{ $errors->first() }}

            </div>

        </div>

    @elseif (session("mensaje"))

    <div class="row justify-content-center pb-4 g-0 mt-4">

        <div class="col-11 col-md-10 col-lg-9 text-success text-center fw-bold fs-5">

            {{ session("mensaje") }}

        </div>

    </div>

    @endif

    <div class="container">

        <div class="row justify-content-center my-4">
            <div class="col-10 bg-info cajaFiltro">
                <fieldset>
                    <div class="row">
                        <legend class="text-center text-white py-2 bg-dark cajaTituloFiltro">{{ __("administracion.filtros") }}</legend>
                    </div>
                    <form action="{{ route("alergias.index") }}" method="get" id="filtros">
                        @csrf

                        @if (count($alergias) > 0)
                            <input type="hidden" name="alergias" id="alergiasPage" value="{{ $alergias->currentPage() }}">
                        @endif

                        
                        {{-- <input type="hidden" name="usuarios" id="usuariosPage"> --}}
                        <input type="hidden" name="alergiaSeleccionada" class="alergiaSeleccionada" id="alergiaSeleccionadaInput">
                        <div class="row justify-content-center mt-2">
                            <div class="col-6 g-0 text-center">
                                <input type="text" name="texto" id="" class="cajaTexto w-100 py-2 text-center" value="{{ (isset($filtros) && isset($filtros['texto'])) ? $filtros['texto'] : "" }}" placeholder="{{ __("alergias.buscarTexto") }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4 pb-3 text-center">
                                <input type="submit" value="{{ __("administracion.buscar") }}" class="btn botonBlanco w-25">
                            </div>
                        </div>
                    </form>

                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2 text-center g-0">
                <a href="{{ route("alergias.create") }}" class="btn botonVerdeClaro">{{ __("alergias.anadir") }}</a>
            </div>
            <div class="col-3 text-center g-0">
                <a href="{{ route("alergias.anadirusuario") }}" class="btn botonAzulTurquesa">{{ __("alergias.anadirUsuario") }}</a>
            </div>
        </div>
    </div>

    <div class="container mt-2" id="alergias">
        <table class="table table-bordered overflow-hidden">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">{{ __("administracion.seleccionado") }}</th>
                    {{-- <th scope="col" class="col text-center">{{ __("administracion.id") }}</th> --}}
                    <th class="text-center">{{ __("administracion.nombre") }}</th>
                    {{-- <th class="text-center">{{ __("administracion.ultimaActualizacion") }}</th> --}}
                    <th class="text-center">{{ __("alergias.acciones") }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alergias as $alergia)
                    <tr class="table-secondary">
                        <td class="text-center">
                            {{-- <form action="{{ route("alergias.index") }}" method="get"> --}}
                                {{-- @csrf --}}

                                @if (isset($filtros) && isset($filtros["alergiaSeleccionada"]) && ($alergia->id == $filtros["alergiaSeleccionada"]))
                                    <input type="radio" name="alergiaSeleccionar" class="alergiaSeleccionada" value="{{ $alergia->id }}" checked>
                                @else
                                    <input type="radio" name="alergiaSeleccionar" class="alergiaSeleccionada" value="{{ $alergia->id }}">
                                @endif

                                
                            {{-- </form> --}}
                        </td>
                        {{-- <td class="col text-center">{{ $alergia->id }}</td> --}}
                        <td class="text-center">{{ $alergia->nombre }}</td>
                        {{-- <td class="text-center">{{ $alergia->created_at }}</td> --}}
                        <td class="text-center">
                            <form action="{{ route("alergias.destroy",$alergia->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="{{ __("alergias.eliminar") }}" class="btn botonRojo">
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                @if (count($alergias) == 0)
                    {{ __("administracion.ningunRegistro") }}
                @else
                    {{  $alergias->appends([
                        "texto" => (isset($filtros) && isset($filtros['texto'])) ? $filtros['texto'] : ""
                    ])->links()  }} {{ trans("administracion.contadorPaginador",["total" => $alergias->total(),"primeroPagina" => $alergias->firstItem(), "ultimoPagina" => $alergias->lastItem()]) }}
                @endif
            </div>
        </div>
        
    </div>

    @if (isset($usuariosAlergicos) && count($usuariosAlergicos) > 0)

        <form class="container mt-5" action="{{ route("alergias.destroyusers") }}" method="post" id="usuariosAlergicos">
                    {{-- <p>{{ $usuariosAlergicos }}</p> --}}
            @csrf


            <input type="hidden" name="alergia" class="" value="{{ $filtros['alergiaSeleccionada'] }}" checked>

            <div class="row my-2">
                <div class="col-4 text-center g-0">
                    <input type="submit" class="btn botonRojo" value="{{ __("alergias.eliminarusers") }}">
                </div>
            </div>

            <table class="table table-bordered overflow-hidden">
                <thead>
                    <tr class="table-primary">
                        {{-- <th class="text-center">{{ __("administracion.seleccionado") }}</th> --}}
                        {{-- <th scope="col" class="col text-center">{{ __("administracion.id") }}</th> --}}
                        <th class="text-center">{{ __("administracion.seleccionado") }}</th>
                        <th class="text-center">{{ __("administracion.nombre") }}</th>
                        <th class="text-center">{{ __("administracion.apellido") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosAlergicos as $usuarioAlergico)
                    
                        <tr class="table-secondary">
                            {{-- <td class="text-center">
                                <input type="radio" name="alergiaSeleccionada" value="{{ $alergia->id }}">
                            </td> --}}
                            {{-- <td class="col text-center">{{ $alergia->id }}</td> --}}
                            <td class="text-center"><input type="checkbox" name="usuariosSeleccionados[]" value="{{ $usuarioAlergico->id }}"></td>
                            <td class="text-center">{{ $usuarioAlergico->nombre }}</td>
                            <td class="text-center">{{ $usuarioAlergico->apellido }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    @if (count($usuariosAlergicos) == 0)
                        {{ __("administracion.ningunRegistro") }}
                    @else
                        {{  $usuariosAlergicos->appends([
                            "texto" => (isset($filtros) && isset($filtros['texto'])) ? $filtros['texto'] : "",
                            "alergiaSeleccionada" => (isset($filtros) && isset($filtros['alergiaSeleccionada'])) ? $filtros['alergiaSeleccionada'] : "",
                            "alergias" => (isset($filtros) && isset($filtros['alergias'])) ? $filtros['alergias'] : ""
                        ])->links()  }} {{ trans("administracion.contadorPaginador",["total" => $usuariosAlergicos->total(),"primeroPagina" => $usuariosAlergicos->firstItem(), "ultimoPagina" => $usuariosAlergicos->lastItem()]) }}
                    @endif
                </div>
            </div>
            
        </form>

    @endif

    


@endsection