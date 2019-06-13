<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aula;
class AulaController extends Controller
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
       $aulas = Aula::all();

      return view('aula.registros')->with(compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('aula.agregar');
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
        'cantidad' => 'required',

       
       
      ];

      $messages=[
        'cantidad,required' =>'La cantidad es Requerida',
        
       
        
      ];

      $this->validate($request, $rules, $messages);

      $aula = new Aula();
      $aula->cantidad = $request->input('cantidad');
     
      $aula->save();
      return redirect('/aula')->with('notification','Aula registrada exitosamente');
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
       $aula = Aula::find($id);

      return view('aula.edit')->with(compact('aula'));
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
        'cantidad' => 'required',
  
       
       
      ];

      $messages=[
        'cantidad,required' =>'La cantidad es Requerida',
        
       
        
      ];
       $this->validate($request, $rules, $messages);
        $aula =Aula::find($id);
        $aula->cantidad = $request->input('cantidad');
       
        $aula->save();
       return redirect('/aula')->with('notification','Aula modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aula = Aula::find($id);
        $aula->delete(); 
        return redirect('/aula')->with('notification','El aula ha sido eliminada exitosamente');
    }
}
