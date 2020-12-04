@extends('layouts.app')

@section('content')

<div class="container">

    @if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
    </div>
    
    @endif



    <a href="{{url('empleados/create')}}" class="btn btn-info">Agregar Empleado</a>
    <br>
    <br>

    <table class="table table-dark table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Compañia</th>
                <th>Correo</th>
                <th>Telefono Movil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Compañia}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>{{$empleado->TelefonoMovil}}</td>
                <td>
                    <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="btn btn-warning">Editar</a>

                    
                    <form action="{{url('/empleados/'.$empleado->id)}}" method="post" style="display:inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$empleados->links()}}
</div>
@endsection