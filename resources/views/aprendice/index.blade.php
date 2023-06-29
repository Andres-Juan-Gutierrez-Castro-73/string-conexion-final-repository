@extends('layouts.plantillaGeneral')

@section('titulo')
Perfil usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <center>
                <div class="col-sm-12">
                    <br><br><br>
                    <div class="card card-profile">
                        <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                    @if($aprendiz->foto_perfil)
                                        <img src="assets/img/institucion/aprendiz.jpg" class="rounded-circle img-fluid border border-2 border-white" style="width: 200px;">
                                    @else
                                        <img src="{{ asset('storage/users-avatar/avatar.png') }}" class="rounded-circle img-fluid border border-2 border-white" style="width: 200px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            @if ($aprendiz)
                                <div class="text-center mt-4 mb-4">
                                    <h5>{{ $aprendiz->user->name }}</h5>
                                    <div class="font-weight-300">
                                        <i class="ni location_pin mr-2"></i>{{ $aprendiz->cadena->nombre_cadena }}:<br>
                                        {{ $aprendiz->programa->nombre_programa }}
                                    </div>
                                    <div class="h6 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>{{ $aprendiz->habilidades }}
                                    </div>
                                    <br>
                                    <form action="{{ route('aprendices.destroy', $aprendiz->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('aprendices.edit', $aprendiz->id) }}"><i class="fa fa-fw fa-edit"></i>Editar perfil de usuario</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i>Eliminar perfil de usuario</button>
                                    </form>
                                </div>
                            @else
                                <div class="text-center mt-4">
                                    <h5>No has configurado tu perfil.</h5>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('aprendices.create') }}">Crear perfil de usuario</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
@endsection
