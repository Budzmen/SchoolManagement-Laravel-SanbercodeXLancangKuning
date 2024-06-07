@extends('layout.master')

@section('judul')
test
@endsection

@section('judul2')
test
@endsection

@section('content')
<form method="POST" action="/teachers">
    {{-- validation --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form Input --}}
    @csrf
    <div class="form-group">
      <label>Teacher Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label>Teacher Phone Number</label>
      <input type="number" class="form-control" name="phone">
    </div>
    <div class="form-group">
        <label>Teacher Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection