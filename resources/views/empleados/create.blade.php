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

Sección para crear empleados

<form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data" class="form-horizontal">

{{ csrf_field() }} 
<!-- nos proporciona un token para poder acceder al storage-->
@include('empleados.form',['Modo'=>'crear'])


</form>
</div>
@endsection