<form action="{{ url('/mascotas/'.$mascotas->id) }}" method="post">
@csrf
{{ method_field('PATCH')}}

@include('mascotas.form',['modo'=>'Editar']);

</form>
