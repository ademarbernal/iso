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
                    
                          <h4 class="card-title"> Registro de horarios</h4>
                          
                       
                </div>
                 <div class="col-md-4">
                    
                         <h5 class="text-right"><a href="/crear_horario" class="btn btn-success">agregar</a></h5>
                          
                        
                </div>
                </div>
              </div>
              <div class="card-body">
               
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Total de horarios
                      </th>
                     
                      
                       <th class="text-right">
                        opciones
                      </th>
                    </thead>
                    <tbody>
                       @foreach($horarios as $horario)
                        <tr>
                            <td>{{$horario->horario}}</td>
                           
                            <td class="text-right">
                    <a href="/horario_{{$horario->id}}" class="btn btn-primary" title="editar">editar</a>
                    <a href="/horario/{{$horario->id}}/eliminar" class="btn  btn-danger" title="eliminar">eliminar</a>
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
