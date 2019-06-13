<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Materia;
use App\Aula;
use App\Horario;
class CarreraController extends Controller
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
        $carreras = Carrera::all();

      return view('carreras.registros')->with(compact('carreras'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('carreras.agregar');
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
        'nivelacademico' => 'required',
        'duracion' => 'required',
        
       
      ];

      $messages=[
        'nombre,required' =>'El Nombre de la carrera es Requerido',
        'nivelacademico,required' =>'El nivel academico es Requerido',
        'duracion,required' =>'La duracion es Requerida',
        
        
      ];

      $this->validate($request, $rules, $messages);

      $carrera = new Carrera();
      $carrera->nombre = $request->input('nombre');
      $carrera->nivelacademico = $request->input('nivelacademico');
      $carrera->duracion = $request->input('duracion');
      
      $carrera->save();
      return redirect('/Carre')->with('notification','Carrera registrada exitosamente');
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
         $carrera = Carrera::find($id);

      return view('carreras.edit')->with(compact('carrera'));
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
        'nivelacademico' => 'required',
        'duracion' => 'required',
        
       
      ];

      $messages=[
        'nombre,required' =>'El Nombre de la carrera es Requerido',
        'nivelacademico,required' =>'El nivel academico es Requerido',
        'duracion,required' =>'La duracion es Requerida',
    
        
      ];
       $this->validate($request, $rules, $messages);
       $carrera =Carrera::find($id);
      $carrera->nombre = $request->input('nombre');
      $carrera->nivelacademico = $request->input('nivelacademico');
      $carrera->duracion = $request->input('duracion');
   
      $carrera->save();
       return redirect('/Carre')->with('notification','Carrera modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete(); 
        return redirect('/Carre')->with('notification','La carrera ha sido eliminada exitosamente');
    }
//parte de las asignaciones

    //materias
    public function asignacionmateria($id){
      $carreras = Carrera::find($id);
      $materias = Materia::all();
      return view('carreras.asignacionmateria')->with(compact('carreras','materias'));
    }
     public function actualizacionmateria(Request $request, $id)
     {
        $rules=[
       'materia_id' => 'required',
       
       
      ];

      $messages=[
        
       
        'materia_id,required' =>'La materia es Requerida',
      
        
      ];
       $this->validate($request, $rules, $messages);
       $carrera =Carrera::find($id);
      $carrera->materia_id = $request->input('materia_id');
      $carrera->save();
       return redirect('/home')->with('notification','Materia asignada exitosamente');
    }

    //aulas
    public function asignacionaula($id){
      $carreras = Carrera::find($id);
    
      $aulas = Aula::all();
    
      return view('carreras.asignacionaula')->with(compact('carreras','aulas'));
    }
     public function actualizacionaula(Request $request, $id)
     {
        $rules=[
       
        'aula_id' => 'required',
        
       
       
      ];

      $messages=[
        
        'aula_id,required' =>'La Cantidad es Requerida',
       
      
        
      ];
       $this->validate($request, $rules, $messages);
       $carrera =Carrera::find($id);
      
      $carrera->aula_id = $request->input('aula_id');
      
      $carrera->save();
       return redirect('/home')->with('notification','Aula asignada exitosamente');
    }
//horarios
    public function asignacionhorario($id){
      $carreras = Carrera::find($id);
   
      $horarios = Horario::all();
      return view('carreras.asignacionhorario')->with(compact('carreras','horarios'));
    }
     public function actualizacionhorario(Request $request, $id)
     {
        $rules=[
       
        'horario_id' => 'required',
    
       
       
      ];

      $messages=[
        
        'horario_id,required' =>'El horario es Requerido',

      
        
      ];
       $this->validate($request, $rules, $messages);
       $carrera =Carrera::find($id);
      $carrera->horario_id = $request->input('horario_id');
      $carrera->save();
       return redirect('/home')->with('notification','Horario asignado exitosamente');
    }






    public function registrosasignados(){

      $carreras = Carrera::all();
      $materias = Materia::all();
      $aulas = Aula::all();
      $horarios = Horario::all();
      return view('home')->with(compact('carreras','materias','aulas','horarios'));
    }
}
