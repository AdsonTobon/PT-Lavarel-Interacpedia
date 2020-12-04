<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

        // Mostrar los datos - a continuacion se mostrarà como plasmar los datos en la pestaña index
        // $datos (variable)  'empleados' (es un indice)
        $datos['empleados']=Empleados::paginate(10);

        return view('empleados.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Compañia'=>'required|string|max:100',
            'Correo'=>'required|email',
            'TelefonoMovil'=>'required|integer'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        // $datosEmpleado = request()->all(); 
        // Recogemos todos los datos del storage

        $datosEmpleado=request()->except('_token');
        // Como tenemos que enviar solo los datos que creamos en la base de datos, tenemos que hacer una excepción 
        // con el token, para eso realizamos la siguiente linea de codigo 

        // if($request->hasFile('Logo')){

        //     $datosEmpleado['Logo']=$request->file('Logo')->store('uploads','public');
        // }
        // Modificar de toda la info (logo) el campo Logo y lo vamos a almacenar en la carpeta uploads 
        // que esta en la carpeta public


        Empleados::insert($datosEmpleado);
        // Con esta linea de codigo insertamos los datos del form en la base de datos empleados

        // return response()->json($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Empleado agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleados::findOrFail($id);
        // la funcion findOrFail nos ayuda a buscar mediante un parametro establecido todos los datos
        // que esten relacionados a dicho parametro
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Compañia'=>'required|string|max:100',
            'Correo'=>'required|email',
            'TelefonoMovil'=>'required|integer'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpleado=request()->except(['_token','_method']);
        Empleados::where('id','=',$id)->update($datosEmpleado);

        // $empleado=Empleados::findOrFail($id);
        // return view('empleados.edit',compact('empleado'));

        return redirect('empleados')->with('Mensaje','Empleado modificado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Mediante la funcion destroy recibimos un parametro que es el id y destruimos
        // ese parametro id dentro de todos los empleados y nuevamente retornamos a la vista index donde
        // se evidencia todos los empleados
        Empleados::destroy($id);

        return redirect('empleados')->with('Mensaje','Empleado eliminado con Exito');
    }
}
