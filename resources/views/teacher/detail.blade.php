@extends('layout.master')

@section('judul')
test
@endsection

@section('judul2')
test
@endsection

@section('content')
<h1>{{$teacher->name}}</h1>
<p>{{$teacher->phone}}</p>

<a href="/teachers" class="btn btn-secondary btn-sm">Kembali</a>
@endsection