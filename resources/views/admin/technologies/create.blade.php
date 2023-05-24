@extends('layouts/admin')

@section('content')

<h2 class="mt-5">Aggiungi una nuova tipologia</h2>

<div class="container form-container py-5" style="height: calc(100vh - 350px)">
    <form action="{{route('admin.technologies.store')}}" method="POST">
    @csrf


    <div class="mb-2">
      <label for="name">Nome</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
      @error('name')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>


    <div class="my-4">
      <label for="color">Scegli il colore</label>
      <input type="color" class="color-control @error('color') is-invalid @enderror" id="color" name="color">{{old('color')}}</input>
      @error('color')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <button class="mt-3 btn btn-primary" type="submit">Salva</button>

    
    
    
  </form>

</div>


@endsection
