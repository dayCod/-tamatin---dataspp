@extends('petugas.layout.master')

@section('title', 'Register Panel')

@section('content')

<div class="row justify-content-center align-items-center" style="height: 80vh">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Register Petugas</h3>
            </div>

            <form method="POST" action="{{ route('post.register') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        Success
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Enter Username" autocomplete="off" autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                            placeholder="Password" autocomplete="off">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Petugas</label>
                        <input type="text" name="nama_petugas" value="{{ old('nama_petugas') }}" class="form-control @error('nama_petugas') is-invalid @enderror" id="exampleInputPassword1"
                            placeholder="Nama Petugas" autocomplete="off">
                        @error('nama_petugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
