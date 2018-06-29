@extends('layouts.app')
<body>

@section('content')
@if(Auth::user())
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Role</th>
      <th scope="col">Alterar Role</th>
      <th scope="col">Apagar Utilizador</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($user as $key => $value)
    <tr>
      <th scope="row">{{$value->name}}</th>
      <td>{{ $value->email }}</td>
      <td>{{ $value->role }}</td>
      <td>
        <select class="form-control" id="role">>
          <option value="admin">Admin</option>
          <option value="ps">Profissional de Saude</option>
          <option value="utente">Utente</option>
        </select>
        <form method="post" action="/admin/changeRole/{{$value->role}}">
          {{ csrf_field() }}
          <div class="form-group">
            <button type="submit" class="btn btn-danger">//Alterar</button>
          </div>
        </form>
      </td>
      <td><form method="post" action="/users/delete/{{ $value->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="form-group">
          <button type="submit" class="btn btn-danger">Apagar</button>
        </div>
      </form></td>
    </tr>
  </tbody>
  @endforeach
</table>
@endif
@endsection
</body>
