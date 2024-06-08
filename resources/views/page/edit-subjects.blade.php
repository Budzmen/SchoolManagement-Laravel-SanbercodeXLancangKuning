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
    <input type="text" class="form-control" name="name" value="{{ $subjects->name }}">
  </div>
  
  <div class="form-group">
    <label for="teacher_id">Teacher</label>
    <select class="form-control" name="teacher_id" id="teacher_id">
      @foreach ($teachers as $teacher)
      <option value="{{ $teacher->id }}" {{ $subjects->teacher_id == $teacher->id ? 'selected' : '' }}>
        {{ $teacher->name }}
      </option> 
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="student_id">Student</label>
    <select class="form-control" name="student_id" id="student_id">
      @foreach ($students as $student)
      <option value="{{ $student->id }}" {{ $subjects->student_id == $student->id ? 'selected' : '' }}>
        {{ $student->name }}
      </option> 
      @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-outline-success">Submit</button>
</form>
@endsection
