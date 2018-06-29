@extends('layouts.app')
<body>


@section('content')
@if(Auth::user())
  <h2>Selecione as Denuncias que Pretende Apagar ou Aprovar.</h2><br>
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
    @if(Auth::user()->role =='admin')
      <tbody>
        @foreach ($denuncia as $key => $value)
          <tr>
            @if ($value->anonimo != 'on')
              <th scope="row">{{Auth::user()->name}}</th>
            @else
              <th scope="row">Anonimo</th>
            @endif
            <td>{{ $value->id }}</td>
            <td>{{ $value->local }}</td>
            <td>{{ $value->descricao }}</td>
            <td><form method="post" action="/denuncia/delete/{{ $value->id }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <div class="form-group">
                <button type="submit" class="btn btn-danger">Apagar</button>
              </div>
            </form></td>
            @if ($value->aprovada != 'aprovada')
              <td><form method="post" action="/denuncia/aprove/{{ $value->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Aprovar</button>
                </div>
              </form>
            @else
              <td><form method="post" action="/denuncia/deaprove/{{ $value->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <button type="submit" class="btn btn-warning">Desaprovar</button>
                </div>
              </form>
            </td>
          @endif
        </tr>
      </tbody>
    @endforeach
  @endif
</table>
@endif
@endsection
</body>
