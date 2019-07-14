@extends('shared.layout')
@section('title', 'Create User')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 28rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light"> Create User </h3>
            </div>
            <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        {!! csrf_field() !!}
                        @include('shared.errors')
                        <div class="form-group">
                            <label> Full Name </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label> E-mail </label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-row my-2">
                            <div class="col">
                                <label> Password </label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col">
                                <label> Confirm Password </label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <input type='submit' class="btn btn-success" name='submit'>
                        <a href = "{{url('users')}}" class="btn btn-primary ml-1"> Back </a>
                    </form>
            </div>
        </div>
    </div>
@endsection
