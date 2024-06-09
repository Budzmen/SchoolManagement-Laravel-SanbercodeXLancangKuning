@extends('layout.master')

@section('title')
Detail Teachers
@endsection

@section('content')
<h1>Teacher Name: {{$teacher->name}}</h1>
<p>Teacher Phone Number: {{$teacher->phone}}</p>
<p>Teacher Email: {{$teacher->email}}</p>

<a href="/teachers" class="btn btn-secondary btn-sm">Kembali</a>
@endsection