@extends('shared.layout')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
