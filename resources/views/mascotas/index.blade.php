
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">

    <br>  
    <h1>Veterinaria</h1>
    <br>


    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje')}}
    <button type = "button" class = "close"  data-dismiss = "alert" aria-label = "close">
        <span aria-hidden = "true"> &times; </span>
    </div>
    @endif

    



<a href="{{ url('mascotas/create') }}" class = "btn btn-success" > Registrar mascota </a>
<br/>
<br/>
<table class="table table-light" >
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"  >
    <thead class="thead-light">
        
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Enfermedades</th>
            <th>Fecha de registro</th>
            <th>Última modificación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mascota as $mascotas)
        <tr>
            <td>{{$mascotas->id}}</td>
            <td>{{$mascotas->Nombre}}</td>
            <td>{{$mascotas->Tipo}}</td>
            <td>{{$mascotas->Edad}}</td>
            <td>{{$mascotas->Enfermedades}}</td>
            <td>{{$mascotas->created_at}}</td>
            <td>{{$mascotas->updated_at}}</td>
            <td>
                
            <a href="{{ url('/mascotas/'.$mascotas->id.'/edit') }}" class = "btn btn-primary">
               Editar

            </a>
                            
            <form action="{{ url('/mascotas/'.$mascotas->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class ="btn btn-danger" type="submit" onclick = "return confirm('¿Seguro que quieres eliminarlo?')"  value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</div>
