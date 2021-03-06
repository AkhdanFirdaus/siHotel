@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Hello <small>{{ Auth::user()->name }}</small></h2>
                    @foreach ( Auth::user()->roles() as $jabatan)
                    <p>You're a {{ $jabatan['nama'] }}</p>
                    @endforeach
                    You are logged in!
                    <a href="{{ route('dashboard')}}" class="btn btn-success">Masuk ke halaman dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
