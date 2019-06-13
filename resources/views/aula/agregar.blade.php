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
                    
                          <h4 class="card-title"> Agregar nueva aula</h4>
                          
                       
                </div>
                
                </div>
              </div>
          <div class="card-body">
              <form action="" method="POST" >
                     {{csrf_field()}}
                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input type="text" name="cantidad" class="form-control" value="{{ old('cantidad')}}">
                  
                                         
                </div> 
                                      
                <div class="form-group">
                  <button class="btn btn-success form-control">Guardar Materia</button>
                </div>
              </form>
                 
              
          </div>
        </div>
      </div>
     </div>
@endsection
