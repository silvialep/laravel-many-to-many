@extends('layouts/admin')

@section('content')

<div class="d-flex justify-content-between aling-items-center mt-5">
    <h2>Tutte le tecnologie</h2>
    <a href="{{route('admin.technologies.create')}}" class="btn btn-success d-flex align-items-center">Nuova tecnologia</a>
</div>



<table class="mt-5 table table-hover">
  <thead>
    <th scope="col">Nome</th>
    <th scope="col">Slug</th>
    <th scope="col">Colore</th>
    <th scope="col">Progetti</th>
    <th scope="col">Comandi</th>
  </thead>

  <tbody>

    @foreach($technologies as $technology)
    <tr>
        <td style="color:deeppink; text-transform:uppercase; font-weight:bold">{{$technology->name}}</td>
        <td>{{$technology->slug}}</td>
        <td>{{$technology->color}}</td>
        <td>
            @if(count($technology->projects) > 0)
              <ul style="padding:0; list-style-type:none">
                  @foreach($technology->projects as $item)
                  <li>
                  <a href="{{route('admin.projects.show', $item->slug)}}">{{$item->title}}</a>
                  </li>
                  @endforeach
              </ul>
            @else
            <span class="fst-italic text-danger px-3">NN</span>
            @endif
        </td>
        <td>
            <a href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a class="text-success" href="{{route('admin.technologies.edit', $technology)}}"><i class="fa-solid fa-pen"></i></a>
        </td>
    </tr>
    @endforeach


  </tbody>
</table>
@endsection