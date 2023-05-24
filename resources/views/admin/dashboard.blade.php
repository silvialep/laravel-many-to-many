@extends('layouts/admin')

@section('content')
  <h1 class="mt-5">Pagina di amministrazione</h1>

  <hr>

  <div style="height: calc(100vh - 350px)">
    <ul>
      <li><a href="{{route('admin.projects.index')}}">Mostra tutti i progetti</a></li>
      <li><a href="{{route('admin.types.index')}}">Mostra tutte le tipologie di progetto</a></li>
    </ul>

  </div>
@endsection