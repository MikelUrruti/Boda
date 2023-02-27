@extends('layouts.template')

@section('assets')
    @vite(['resources/css/formulario.css','resources/css/administracion.css','resources/js/administracion/administracion.js'])
@endsection

@section('title',__("administracion.tituloVentana"))

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
                    <form action="{{ route("admin.index") }}" method="get">
                        @csrf
                        <div class="row justify-content-center mt-2">
                            <div class="col-6 g-0 text-center">
                                <input type="text" name="texto" id="" class="cajaTexto w-100 py-2 text-center" value="{{ (isset($filtros) && isset($filtros['texto'])) ? $filtros['texto'] : "" }}" placeholder="{{ __("administracion.buscarTexto") }}">
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <div class="col-4">
                                <label for="">{{ __("administracion.confirmados") }}:</label>
                                <select name="confirmados" id="">
                                    @if (isset($filtros) && isset($filtros["confirmados"]))

                                        @if ($filtros["confirmados"] == "Si")
                                        
                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Si" selected>{{ __("administracion.tipoSiNo.si") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @elseif ($filtros["confirmados"] == "No")

                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                                            <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>

                                        @else

                                            <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @endif

                                    @else

                                    <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                    <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>
                                    <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                    @endif

                                </select>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-2">
                                @if (isset($filtros) && isset($filtros["alergicos"]) && $filtros["alergicos"])
                                    <input type="checkbox" name="alergicos" id="" checked> <label for="alergicos">{{ __("administracion.alergicos") }}</label>
                                @else
                                    <input type="checkbox" name="alergicos" id=""> <label for="alergicos">{{ __("administracion.alergicos") }}</label>
                                @endif

                            </div>
                        </div> --}}
                        <div class="row my-2">
                            <div class="col-4">
                                <label for="">{{ __("administracion.transporte") }}:</label>
                                <select name="transporte" id="">

                                    @if (isset($filtros) && isset($filtros["transporte"]))

                                        @if ($filtros["transporte"] == "Ambos")
                                            
                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Ambos" selected>{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                            <option value="Ida">{{ __("administracion.opcionesTransporte.ida") }}</option>
                                            <option value="Vuelta">{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @elseif ($filtros["transporte"] == "Vuelta")

                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Ambos">{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                            <option value="Ida">{{ __("administracion.opcionesTransporte.ida") }}</option>
                                            <option value="Vuelta" selected>{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @elseif ($filtros["transporte"] == "Ida")
                                        
                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Ambos">{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                            <option value="Ida" selected>{{ __("administracion.opcionesTransporte.ida") }}</option>
                                            <option value="Vuelta">{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @elseif ($filtros["transporte"] == "No")

                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Ambos">{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                            <option value="Ida">{{ __("administracion.opcionesTransporte.ida") }}</option>
                                            <option value="Vuelta">{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                            <option value="No" selected>{{ __("administracion.tipoSiNo.no") }}</option>

                                        @else

                                            <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                            <option value="Ambos">{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                            <option value="Ida">{{ __("administracion.opcionesTransporte.ida") }}</option>
                                            <option value="Vuelta">{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @endif

                                    @else

                                        <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                        <option value="Ambos">{{ __("administracion.opcionesTransporte.ambos") }}</option>    
                                        <option value="Ida">{{ __("administracion.opcionesTransporte.ida") }}</option>
                                        <option value="Vuelta">{{ __("administracion.opcionesTransporte.vuelta") }}</option>
                                        <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>
                                    
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <label for="">{{ __("administracion.tipo") }}:</label>
                                <select name="tipo" id="">

                                    @if (isset($filtros) && isset($filtros["tipo"]))

                                        @if ($filtros["tipo"] == "Usuario")
                                            <option value="Todos">{{ __("administracion.todos") }}</option>    
                                            <option value="Usuario" selected>{{ __("administracion.tipoUsuarios.usuario") }}</option>    
                                            <option value="Admin">{{ __("administracion.tipoUsuarios.admin") }}</option>
                                        @elseif ($filtros["tipo"] == "Admin")
                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Usuario">{{ __("administracion.tipoUsuarios.usuario") }}</option>    
                                            <option value="Admin" selected>{{ __("administracion.tipoUsuarios.admin") }}</option>
                                        @else
                                            <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                            <option value="Usuario">{{ __("administracion.tipoUsuarios.usuario") }}</option>    
                                            <option value="Admin">{{ __("administracion.tipoUsuarios.admin") }}</option>
                                        @endif

                                    @else
                                        <option value="Todos">{{ __("administracion.todos") }}</option>
                                        <option value="Usuario" selected>{{ __("administracion.tipoUsuarios.usuario") }}</option>    
                                        <option value="Admin">{{ __("administracion.tipoUsuarios.admin") }}</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <label for="">{{ __("administracion.tienePareja") }}:</label>
                                <select name="pareja" id="">

                                    @if (isset($filtros) && isset($filtros["pareja"]))

                                        @if ($filtros["pareja"] == "Si")
                                            
                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Si" selected>{{ __("administracion.tipoSiNo.si") }}</option>    
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @elseif ($filtros["pareja"] == "No")

                                            <option value="Todos">{{ __("administracion.todos") }}</option>
                                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>    
                                            <option value="No"selected>{{ __("administracion.tipoSiNo.no") }}</option>

                                        @else

                                            <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                            <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>    
                                            <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>

                                        @endif

                                    @else
                                        <option value="Todos" selected>{{ __("administracion.todos") }}</option>
                                        <option value="Si">{{ __("administracion.tipoSiNo.si") }}</option>    
                                        <option value="No">{{ __("administracion.tipoSiNo.no") }}</option>
                                    @endif

                                </select>
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
            <div class="col-3 text-center g-0">
                <a href="{{ route("admin.create") }}" class="btn botonVerdeClaro">{{ __("administracion.agregarInvitado") }}</a>
            </div>
            <div class="col-2 g-0">
                <input type="submit" value="{{ __("administracion.eliminarInvitados") }}" class="btn botonRojoSinRadious" id="eliminarInvitadosButton">
            </div>
        </div>
    </div>

    <form action="{{ route("admin.destroyAll") }}" id="eliminarSeleccionados" method="POST">

        @csrf
        @method('delete')

        <div class="container mt-2">
            <table class="table table-bordered overflow-hidden">
                <thead>
                    <tr class="table-primary">
                        <th class="text-center">{{ __("administracion.seleccionado") }}</th>
                        {{-- <th scope="col" class="col text-center">{{ __("administracion.id") }}</th> --}}
                        <th class="text-center">{{ __("administracion.nombre") }}</th>
                        <th class="text-center">{{ __("administracion.apellido") }}</th>
                        <th class="text-center">{{ __("administracion.correo") }}</th>
                        <th class="text-center">{{ __("administracion.pareja") }}</th>
                        <th class="text-center">{{ __("administracion.transporte") }}</th>
                        <th class="text-center">{{ __("administracion.tipo") }}</th>
                        <th class="text-center">{{ __("administracion.confirmado") }}</th>
                        <th class="text-center">{{  __("administracion.ultimaActualizacion")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table-secondary">
                            <td class="col text-center">
                                @if ($user->id != auth()->user()->id)
                                    <input type="checkbox" name="usuariosSeleccionados[]" value="{{ $user->id }}">
                                @endif
                                
                            </td>
                            {{-- <td class="col text-center">{{ $user->id }}</td> --}}
                            <td class="text-center">{{ $user->nombre }}</td>
                            <td class="text-center">{{ $user->apellido }}</td>
                            <td class="text-center">{{ $user->correo }}</td>
                            <td class="text-center">
                                @if ($user->parejaInvitado)
                                    <a href="{{ route("admin.index") }}?id={{ $user->parejaInvitado->id }}">{{ $user->parejaInvitado->nombre }} {{ $user->parejaInvitado->apellido }}</a>
                                @elseif ($user->parejaInvitadoHijo)
                                    <a href="{{ route("admin.index") }}?id={{ $user->parejaInvitadoHijo->id }}">{{ $user->parejaInvitadoHijo->nombre }} {{ $user->parejaInvitadoHijo->apellido }}</a>
                                @endif
                            </td>
                            <td class="text-center">{{ $user->transporte }}</td>
                            <td class="text-center">{{ $user->tipo }}</td>
                            <td class="text-center">{{ $user->confirmado }}</td>
                            <td class="text-center">{{ $user->updated_at }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    @if (count($users) == 0)
                        {{ __("administracion.ningunRegistro") }}
                    @else
                        {{  $users->onEachSide(4)->links()  }} {{ trans("administracion.contadorPaginador",["total" => $users->total(),"primeroPagina" => $users->firstItem(), "ultimoPagina" => $users->lastItem()]) }}
                    @endif
                </div>
            </div>
            
            
        </div>
    </form>


@endsection