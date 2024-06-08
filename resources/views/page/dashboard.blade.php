@extends('layout.master')

@section('title')
    Dashboard
@endsection

@section('content')
<img src="{{asset('/template/dist/img/schools.jpg')}}" alt="schools" class="brand-image elevation-3" style="opacity: .8; width: 100%;">

<div class="row mt-5">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Jumlah Guru Saat Ini</h5>
        <p class="card-text">Para guru yang aktif mengajar saat ini memiliki total yaitu {{$teacherCount}} guru.</p>
        <a href="/teachers" class="btn btn-outline-info">
          Check Teacher
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Jumlah Murid Saat Ini</h5>
        <p class="card-text">Murid saat ini memiliki total sebanyak {{$studentCount}} .</p>
        <a href="/students" class="btn btn-outline-success">
          Check Student 
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
          <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
        </svg>
      </a>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header"><h5>Daftar Guru Terbaru</h5></div>
  <div class="card-body">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Join</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listTeacher as $teacher)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->phone }}</td>
        <td>{{$teacher->created_at}}</td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
@endsection