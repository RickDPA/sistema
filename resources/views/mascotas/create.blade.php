<form action="{{ url('/mascotas') }}" method="post"> 
@csrf

@include('mascotas.form',['modo'=>'Registrar']);
  

</form>

