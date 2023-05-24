@extends('layouts/admin')

@section('content')

<div class="main pt-5">
  <div class="d-flex justify-content-between align-items-center">
    <h1>{{$type->type_name}}</h1>
    <small>{{$type->slug}}</small>
  </div>
  <hr>
  <p>{{$type->description}}</p>

  @if(count($type->projects) > 0)
  <table class="table mb-4">
    <thead>
      <th>Titolo</th>
      <th>Slug</th>
    </thead>

    <tbody>
      @foreach($type->projects as $project)
        <tr>
          <td>{{$project->title}}</td>
          <td>{{$project->slug}}</td>
          <td><a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
        </tr>
      @endforeach

    </tbody>
  </table>
  @else

    <span class="fst-italic text-warning">Nessun progetto di questa categoria</span>
      
  @endif
  
</div>
<div class="container mt-5 d-flex gap-3 justify-content-center align-items-center">
  <a href="{{route('admin.projects.index')}}" class="btn btn-primary d-flex align-items-center">Torna ai progetti</a>
  <a href="{{route('admin.types.index')}}" class="btn btn-info d-flex align-items-center">Torna alle tipologie</a>
  <a href="{{route('admin.types.edit', $type)}}" class="btn btn-warning d-flex align-items-center">Modifica</a>
  <a href="{{route('admin.types.destroy', $type)}}" class="btn btn-danger d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</a>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la tipologia</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          <div class="modal-body">
              Sei sicuro di voler eliminare la tipologia "{{$type->type_name}}"?
          </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                  <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  
                  <button type="submit" class="btn btn-danger">Elimina la tipologia</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection