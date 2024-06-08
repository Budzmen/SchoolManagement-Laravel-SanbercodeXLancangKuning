@extends('layout.master')

@section('judul')
test
@endsection

@section('judul2')
test
@endsection

@section('content')<title>Siswa Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="container">
    <h1>Siswa Details</h1>

    <div class="card">
        <div class="card-header">
            Details of {{ $student->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $student->name }}</h5>
            <p class="card-text">Email: {{ $student->email }}</p>
            <p class="card-text">Grade: {{ $student->grade }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Kembali Ke List Siswa</a>
        </div>
    </div>
</div>

@endsection