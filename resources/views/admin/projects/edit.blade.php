@extends('layouts/admin')

@section('content')

<h2 class="mt-5">Modifica il progetto</h2>

<div class="container form-container py-5" style="height: calc(100vh - 350px)">
    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST">
    @csrf

    @method ('PUT')

    <div class="mb-2">
      <label for="title">Titolo</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $project->title}}">
      @error('title')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="type_id">Tipologia</label>
      <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id">{{old('type_id') ?? $project->type_id}}
        <option value="">Nessuna</option>
        @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->type_name}}</option>
        @endforeach
      </select>
      @error('type_id')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="my-4 form-group d-flex flex-row">
      <label for="technology">Tecnologie</label>
      @foreach($technologies as $technology)
        <div class="form-check">
          {{--                                                                         aggiungere questo per fare il controllo dei check --}}
          <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked($project->technologies->contains($technology))>
          <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
        </div>
      @endforeach

    </div>

    <div class="mb-2">
      <label for="description">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
      @error('description')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="mb-4">
      <label for="content">Contenuto</label>
      <input class="form-control @error('content') is-invalid @enderror" type="text" id="content" name="content" value="{{old('content') ?? $project->content}}">
      @error('content')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Salva</button>
    <button href="{{url()->previous()}}" class="btn" style="background-color:rgb(208, 208, 215)">Cancel</button>

    
    
    
  </form>

</div>


@endsection
