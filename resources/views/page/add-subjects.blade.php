@extends('layout.master')

@section('title')
    Halaman Tambah Data Subject
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/subjects" method="POST">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="teacher_id">Teacher</label>
    <select class="form-control" id="teacher_id">
      {{-- @foreach ($teachers as $teacher)
      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option> 
      @endforeach --}}
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group">
    <label for="student_id">Student</label>
    <select class="form-control" id="student_id">
      {{-- @foreach ($teachers as $teacher)
      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option> 
      @endforeach --}}
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

@endsection
