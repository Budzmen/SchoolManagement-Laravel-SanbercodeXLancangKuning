@extends('layout.master')

@section('title')
    Halaman Data Subjects
@endsection

@section('content')
@if (session('success'))
<script>
    Swal.fire({
        title: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
  <a href="subjects/create"><button class="btn btn-outline-primary mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
  </svg></button></a>

  @forelse ($subjects as $key => $item)
  @if ($key % 3 == 0)
    <div class="row">
  @endif

  <div class="col-sm-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4>{{$item->name}}</h4>
        <button class="btn btn-outline-danger" onclick="confirmDelete({{ $item->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
        </svg></button>
      </div>
      <div class="card-body ">
        <p class="card-text">{{$item->bio}}</p>
        <div class="d-flex justify-content-between align-items-center">
          <a href="/casts/{{$item->id}}/edit" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg></a>
          <small>{{$item->created_at}}</small>
        </div>

      </div>
    </div>
  </div>

  @if ($key % 3 == 2)
</div>
  @endif

@empty
<div class="card">
  <div class="card-body">
    Data empty
  </div>
</div>
@endforelse

@if ($subjects->count() % 3 != 0)
  </div>
@endif

<script>
  function confirmDelete(id) {
      Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "data tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya Hapus'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById(`delete-form-${id}`).submit();
          }
      })
  }
</script>

@foreach ($subjects as $item)
  <form id="delete-form-{{ $item->id }}" action="/subjects/{{$item->id}}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
  </form>
@endforeach
@endsection