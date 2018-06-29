@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
  <h2>Selecione a Denuncia que Pretende Responder.</h2><br>
  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">#</th>
        <th scope="col">Local</th>
        <th scope="col">Descriçao</th>
        <th scope="col">Opção</th>
      </tr>
    </thead>
    @if(Auth::user()->role =='ps')
      <tbody>
        @foreach ($denuncia as $key => $value)
          @if ($value->aprovada === 'aprovada')
            <tr>
              @if ($value->anonimo != 'on')
                <th scope="row">{{Auth::user()->name}}</th>
              @else
                <th scope="row">Anonimo</th>
              @endif
              <td>{{ $value->id }}</td>
              <td>{{ $value->local }}</td>
              <td>{{ $value->descricao }}</td>
                <td><form method="post" action="/denuncia/takeCharge/{{ $value->id }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <button type="submit" class="btn btn-info">Tomar posse</button>
                  </div>
                </form>
              </td>
          </tr>
        </tbody>
        @endif
      @endforeach
  @endif
</table>
@endif
@endsection
</body>
