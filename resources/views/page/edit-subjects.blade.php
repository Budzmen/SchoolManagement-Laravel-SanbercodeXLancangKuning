@extends('layout.master')

@section('title')
    Halaman Edit Data Subject
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
<form action="/subjects/{{$subjects->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="teacher_id">Teacher</label>
    <select class="form-control" id="teacher_id">
      <option>1</option>
      {{-- @foreach ($teachers as $teacher)
      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option> 
      @endforeach --}}
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group">
    <label for="student_id">Student</label>
    <select class="form-control" id="student_id">
      <option>1</option>
      {{-- @foreach ($teachers as $teacher)
      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option> 
      @endforeach --}}
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

@endsection
