<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $materias = Materia::all();

      return view('materia.registros')->with(compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materia.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
        'nombre' => 'required',
       
       
      ];

      $messages=[
        'nombre,required' =>'El Nombre de la materia es Requerido',
       
        
      ];

      $this->validate($request, $rules, $messages);

      $materia = new Materia();
      $materia->nombre = $request->input('nombre');
      
      $materia->save();
      return redirect('/materia')->with('notification','Materia registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);

      return view('materia.edit')->with(compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
        'nombre' => 'required',
       
       
      ];

      $messages=[
        'nombre,required' =>'El Nombre de la materia es Requerido',
       
        
      ];
       $this->validate($request, $rules, $messages);
         $materia =Materia::find($id);
         $materia->nombre = $request->input('nombre');
         $materia->save();
       return redirect('/materia')->with('notification','Materia modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete(); 
        return redirect('/materia')->with('notification','La materia ha sido eliminada exitosamente');    
    }
}
