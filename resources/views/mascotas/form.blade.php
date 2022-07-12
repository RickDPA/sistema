<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-14">
<br>
<h1>{{ $modo }} mascota</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
       <ul>
        @foreach($errors->all() as $error)
          <li>  {{$error}} </li>
        @endforeach
        </ul>
    </div>
   

@endif

<br><br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"  >
    <thead class="thead-light">

<div class="form-group">    
<label for="Nombre">  Nombre </label>
<input type="text" name="Nombre" 
value="{{ isset($mascotas->Nombre)?$mascotas->Nombre:old('Nombre')}}" id="Nombre" class="form-control">
</div>

<div class="form-group">  
<label for="Tipo">  Raza </label>
<input type="text" class = "form-control" name = "Tipo" 
value = "{{ isset($mascotas->Tipo)?$mascotas->Tipo:old('Tipo')}}" id = "Tipo" >
</div>

<div class="form-group">  
<label for="Edad">  Edad </label>   
<input type="text" class = "form-control" name = "Edad" id = "Edad" 
value = "{{ isset($mascotas->Edad)?$mascotas->Edad:old('Edad')}}">
</div>

<div class="form-group">  
<label for="Enfermedades">  Enfermedades </label>
<input type="text" class = "form-control" name = "Enfermedades" id = "Enfermedades" 
value = "{{ isset($mascotas->Enfermedades)?$mascotas->Enfermedades:old('Enfermedades')}}">
</div>

<input class = "btn btn-primary" type="submit" value ={{$modo}}>
<a href="{{ url('mascotas/') }}" class = "btn btn-warning"> Regresar </a>

</div>
</div>
</div>