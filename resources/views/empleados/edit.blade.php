@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>
</div>
@endif


<form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{ method_field('PATCH')}}
<!-- con esto accedemos al metodo update de EmpleadosController -->
@include('empleados.form',['Modo'=>'editar'])

</form>
</div>
@endsection