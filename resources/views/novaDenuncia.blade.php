@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
  <h2>Nova Denuncia</h2>

  <form method="post" action="/denuncia" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
      <label for="localOcorrencia" class="col-sm-3 col-form-label">Local da Ocorrencia: </label>
      <div class="col-sm-9">
        <input name="localOcorrencia" type="text" class="form-control" id="localOcorrencia" placeholder="Local da Ocorrencia">
      </div>
    </div>
    <br><br>
    <div class="form-group row">
      <label for="descricaoOcorrencia" class="col-sm-3 col-form-label">Descricao da Ocorrencia: </label>
      <div class="col-sm-9">
        <textarea name="descricaoOcorrencia" type="textarea" class="form-control" id="descricaoOcorrencia" placeholder="Descricao da Ocorrencia"></textarea>
      </div>
      <br><br>
    </div><br><br>
    <div class="form-group row">
      <div class="offset-sm-3">
        <label class="checkbox">
          <input type="checkbox" id="anonimo" name="anonimo" checked> Denuncia Anonima </label>
      </div>
    </div>
    <br>
    <br>
    <div class="form-group row">
      <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Criar Denuncia</button>
      </div>
    </div>
  </form>
  @endif
@endsection
</body>
