@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
  <h2>Nova Mensagem</h2>

  <form class="form-horizontal" method="post" action="/message/store" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
      <label for="sent_to_id" class="col-sm-3 col-form-label">Send to id: </label>
      <div class="col-sm-9">
        <input name="sent_to_id" type="number" class="form-control" id="sent_to_id" placeholder="Local da Ocorrencia">
      </div>
    </div>
    <br><br>
    <div class="form-group row">
      <label for="body" class="col-sm-3 col-form-label">Body: </label>
      <div class="col-sm-9">
        <input name="body" type="text" class="form-control" id="body" placeholder="Local da Ocorrencia">
      </div>
    </div>
    <br><br>
    <div class="form-group row">
      <label for="subject" class="col-sm-3 col-form-label">Subject: </label>
      <div class="col-sm-9">
        <textarea name="subject" type="textarea" class="form-control" id="subject" placeholder="Descricao da Ocorrencia"></textarea>
      </div>
      <br><br>
    </div><br><br>

    <br>
    <div class="form-group row">
      <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Enviar Mensagem </button>
      </div>
    </div>
  </form>
  @endif
@endsection
</body>
