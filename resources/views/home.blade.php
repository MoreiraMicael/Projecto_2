@extends('layouts.app')
<body>
  @section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Bem Vindo</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      {{Auth::user()->name}} Realizou Login como {{Auth::user()->role}}, carrege no seu nome no canto superior direito para ter acesso ás funcionalidades do site.
                      <br>
                      <br>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection
</body>
