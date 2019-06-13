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
                    
                          <h4 class="card-title"> Editar materia</h4>
                          
                       
                </div>
                
                </div>
              </div>
          <div class="card-body">
              <form action="" method="POST" >
                     {{csrf_field()}}
                <div class="form-group">
                  <label for="nombre">Nombre de la materia</label>
                  <input type="text" name="nombre" class="form-control" value="{{$materia->nombre}}">
                                         
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
