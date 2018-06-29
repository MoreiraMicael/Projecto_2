@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
<h1>Dados</h1>
@foreach ($user as $key => $value)
@if ($value->id == Auth::user()->id)
<form class="perfil" action="/perfil/update/" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Nome do Utente: </label>
    <div class="col-sm-9">
      <input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name}}" >
    </div>
  </div>

  <div class="form-group row">
    <label for="telefone" class="col-sm-3 col-form-label">Telefone do Utilizador: </label>
    <div class="col-sm-9">
      <input name="telefone" type="number" class="form-control" id="telefone" value="{{$value->telefone}}" >
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">Email do Utilizador: </label>
    <div class="col-sm-9">
      <input name="email" type="text" class="form-control" id="email" value="{{$value->email}}" >
    </div>
  </div>

  <div class="form-group row">
    <label for="sexo" class="col-sm-3 col-form-label">Sexo do Utilizador: </label>
    <div class="col-sm-9">
      <input name="sexo" type="text" class="form-control" id="sexo" value="{{$value->sexo}}" >
    </div>
  </div>

    <div class="form-group row">
      <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Alterar Dados</button>
      </div>
    </div>
    @endif
</form>
@endforeach
@endif
@endsection
</body>
