@extends('layout.master')

@section('title')
Halaman Edit Profile
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Profile</h3>
                </div>
                
                {{-- Flash Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form method="post" action="/profile/{{$profile->id}}">
                    @csrf
                    @method("put")
                    <p>Nama User : {{$profile->currentUser->name}}</p>
                    <p>Email User : {{$profile->currentUser->email}}</p>
                    
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" value="{{$profile->umur}}" class="form-control" id="umur" name="umur" placeholder="Masukkan umur" required>
                    </div>

                    <div class="form-group">
                        <label for="bio">Biodata</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Masukkan bio" required>{{$profile->bio}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Profile Alamat</label>
                        <input type="text" value="{{$profile->alamat}}" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
