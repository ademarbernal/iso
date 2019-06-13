<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
class HorarioController extends Controller
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
     $horarios = Horario::all();

      return view('horarios.registros')->with(compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('horarios.agregar');
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
        'horario' => 'required',

       
       
      ];

      $messages=[
        'horario,required' =>'El horario es Requerido',
        
       
        
      ];

      $this->validate($request, $rules, $messages);

      $horario = new Horario();
      $horario->horario = $request->input('horario');
     
      $horario->save();
      return redirect('/horario')->with('notification','Horario registrada exitosamente');
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
       $horario = Horario::find($id);

      return view('horarios.edit')->with(compact('horario'));
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
        'horario' => 'required',
  
       
       
      ];

      $messages=[
        'horario,required' =>'El horario es Requerido',
        
       
        
      ];
       $this->validate($request, $rules, $messages);
        $horario =Horario::find($id);
        $horario->horario = $request->input('horario');
       
        $horario->save();
       return redirect('/horario')->with('notification','Horario modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete(); 
        return redirect('/horario')->with('notification','El horario ha sido eliminado exitosamente');
    }
}
