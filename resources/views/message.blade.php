@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
<h2>Messagem.</h2><br>
<td><form method="post" action="/message/create">
  {{ csrf_field() }}
  <div class="form-group">
    <button type="submit" class="btn btn-info">Nova Mensagem</button>
  </div>
</form>
</td>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">sender_id</th>
      <th scope="col">body</th>
      <th scope="col">subject</th>
      <th scope="col">Opção</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($message as $key => $value)
      @if(Auth::user()->id == $value->sent_to_id)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->sender_id }}</td>
        <td>{{ $value->body }}</td>
        <td>{{ $value->subject }}</td>
        <td><form method="post" action="/message/create">
          {{ csrf_field() }}
          <div class="form-group">
            <button type="submit" class="btn btn-info">Responder</button>
          </div>
        </form>
      </td>
    </tr>
  </tbody>
  @endif
@endforeach
</table>
@endif

@endsection
</body>
