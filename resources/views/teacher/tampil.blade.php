@extends('layout.master')

@section('judul')
test
@endsection

@section('judul2')
test
@endsection

@section('content')

<a href="/teachers/create" class="btn btn-sm btn-primary">Tambah</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $key => $item)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->name}}</td>
            <td>
                <form action="/teachers/{{$item->id}}" method="POST">
                    <a href="/teachers/{{$item->id}}" class="btn btn-sm btn-info">Detail </a>
                    <a href="/teachers/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit </a>
                    @csrf
                    @method("delete")
                    <input type="submit" value="delete" class="btn btn-sm btn-danger">
                </form>
            </td>
          </tr>
        @empty
            <tr>
                <td>Teachers Not Found</td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection