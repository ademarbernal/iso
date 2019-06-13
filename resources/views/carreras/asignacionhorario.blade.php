@extends('plantilla')

@section('content')
 <div class="content">
      <div class="row">
        <div class="col-md-12">
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
                    
                          <h4 class="card-title"> Asignar Horario</h4>
                          
                       
                </div>
                
                </div>
              </div>
          <div class="card-body">
              <form action="" method="POST" >
                     {{csrf_field()}}
              
                <div class="form-group">
                     <label for="horario_id">ELIJA UN HORARIO</label>
                     <select name="horario_id" class="form-control" >
                    
                     @foreach($horarios as $horario)
                     <option value="{{ $horario->id}}">{{ $horario->horario}}</option>

                     @endforeach
                     </select>
                </div>

              
                                      
                <div class="form-group">
                  <button class="btn btn-success form-control">Guardar Cambios</button>
                </div>
              </form>
                 
              
          </div>
        </div>
      </div>
     </div>
@endsection
