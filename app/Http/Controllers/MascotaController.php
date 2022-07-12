<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['mascota'] = Mascota::paginate(50);
        return view('mascotas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public $timestamps = true;
    public function store(Request $request)
    {
        $campos = [
            'Nombre' => 'required|string|max:50',
            'Tipo' => 'required|string|max:30',
            'Edad' => 'required|string|max:3',
            'Enfermedades' => 'required|string|max:300'

        ];

        $mensaje = [
            'required' => 'La :attribute es requerida',
            'Nombre.required' => 'El nombre es requerido',
            'Tipo.required' => 'La raza es requerida',
            'Enfermedades.required' => 'En caso de no tener enfermedad escribir "Ninguna"'

        ];

        $this->validate($request,$campos,$mensaje);
        

        $values = array(
            'Nombre' => $request->post('Nombre'),
            'Tipo' => $request->post('Tipo'),
            'Edad' => $request->post('Edad'),
            'Enfermedades' => $request->post('Enfermedades'),
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
            
        );
        
        Mascota::insert($values);
        
        return redirect('mascotas')->with('mensaje', 'Mascota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascotas = Mascota::findOrFail($id);
        return view('mascotas.edit', compact('mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Nombre' => 'required|string|max:50',
            'Tipo' => 'required|string|max:30',
            'Edad' => 'required|string|max:3',
            'Enfermedades' => 'required|string|max:300'

        ];

        $mensaje = [
            'required' => 'La :attribute es requerida',
            'Nombre.required' => 'El nombre es requerido',
            'Tipo.required' => 'La raza es requerida',
            'Enfermedades.required' => 'En caso de no tener enfermedad escribir "Ninguna"'

        ];

        $this->validate($request,$campos,$mensaje);

        $datosMascota = request()->except(['_token','_method']);
        Mascota::where('id', '=', $id)->update($datosMascota);

        $mascotas = Mascota::findOrFail($id);
        return redirect('mascotas')->with('mensaje', 'Mascota modificada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascota::destroy($id);
        
        return redirect('mascotas')->with('mensaje', 'Mascota elminada con éxito');
    }
}
