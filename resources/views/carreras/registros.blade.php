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
                    
                          <h4 class="card-title"> Registro de Carreras</h4>
                          
                       
                </div>
                 <div class="col-md-4">
                    
                         <h5 class="text-right"><a href="/carrera" class="btn btn-success">agregar</a></h5>
                          
                        
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
                        Duracion
                      </th>
                      <th>
                        Nivel Academico
                      </th>
                      
                       <th class="text-right">
                        opciones
                      </th>
                    </thead>
                    <tbody>
                       @foreach($carreras as $carrera)
                        <tr>
                            <td>{{$carrera->nombre}}</td>
                            <td>{{$carrera->duracion}}</td>
                            <td>{{$carrera->nivelacademico}}</td>
                            
                            <td class="text-right">
                    <a href="/carrera_{{$carrera->id}}" class="btn btn-primary" title="editar">editar</a>
                    <a href="/carrera/{{$carrera->id}}/eliminar" class="btn  btn-danger" title="eliminar">eliminar</a>
                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              
              </div>
            </div>
          </div>
           </div>
          </div>
@endsection
