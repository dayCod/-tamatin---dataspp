@extends('petugas.layout.master')

@section('title', 'Login Panel')

@section('content')

<div class="row justify-content-center align-items-center" style="height: 80vh">
    <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Login Petugas</h3>
            </div>
            <form action="{{ route('post.login') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @if(session('errors'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('message'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username (Menggunakan Huruf Kecil Tanpa Spasi)</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Enter Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                            placeholder="Password" value="{{ old('password') }}">
                        @error('password')
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
