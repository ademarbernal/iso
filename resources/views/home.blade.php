@extends('plantilla')

@section('content')
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                @if(session('notification'))
                        <div class="alert alert-success">
                                      {{ session('notification')}}
                                  </div>
                                @endif

                                 @if(count($errors)>0)
                                  <div class="alert alert-danger">
                                    <ul>
                                      @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>          
              @endif
                <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                    
                          <h4 class="card-title"> Registro de Asignaciones</h4>
                       
                </div>
                 
                </div>
              </div>
              <div class="card-body">
               
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nombre
                      </th>  
                      <th>
                        Materia
                      </th>
                      <th >
                        asignar
                      </th>
                      <th>
                        Aula
                      </th>
                      <th >
                        asignar
                      </th>
                      <th >
                        Horario
                      </th>
                         <th >
                        asignar
                      </th>

                    </thead>
                    <tbody>
                       @foreach($carreras as $carrera)
                        <tr>
                            <td>{{$carrera->nombre}}</td> 
                            <td>@if($carrera->materia) {{$carrera->materia->nombre}} @else Sin Asignar @endif</td>
                            <td><a href="/asignarmateria_{{$carrera->id}}" class="btn  btn-success" title="asignar">materias</a></td> 
                            <td>@if($carrera->aula) {{$carrera->aula->cantidad}}@else Sin Asignar @endif</td>
                            <td><a href="/asignaraula_{{$carrera->id}}" class="btn  btn-success" title="asignar">aulas</a></td> 
                            <td>@if($carrera->horario) {{$carrera->horario->horario}} @else Sin Asignar @endif</td>
                            <td><a href="/asignarhorario_{{$carrera->id}}" class="btn  btn-success" title="asignar">horarios</a></td> 
                            
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              
              </div>
            </div>
          </div>
@endsection
