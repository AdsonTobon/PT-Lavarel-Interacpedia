
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}" class="form-control">
</div>

<div class="form-group">
<label for="ApellidoPaterno" class="control-label">{{'Apellido Paterno'}}</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:''}}" class="form-control">
</div>

<div class="form-group">
<label for="ApellidoMaterno" class="control-label">{{'Apellido Materno'}}</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:''}}" class="form-control">
</div>

<div class="form-group">
<label for="Compañia" class="control-label">{{'Compañia'}}</label>
<input type="text" name="Compañia" id="Compañia" value="{{isset($empleado->Compañia)?$empleado->Compañia:''}}" class="form-control">
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>
<input type="email" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}" class="form-control">
</div>

<div class="form-group">
<label for="TelefonoMovil" class="control-label">{{'Telefono Movil'}}</label>
<input type="number" name="TelefonoMovil" id="TelefonoMovil" value="{{isset($empleado->TelefonoMovil)?$empleado->TelefonoMovil:''}}" class="form-control">
</div>


<input type="submit" value="{{$Modo=='crear'? 'Agregar':'Modificar'}}" class="btn btn-success">

<a href="{{url('empleados')}}" class="btn btn-dark">Regresar</a>