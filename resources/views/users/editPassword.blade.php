@extends('shared.layout')
@section('title', 'Edit Password')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 28rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light">Change password for {{$user->name}} </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.updatePassword', [ 'id' => $user->id ]) }}">
                    {!! csrf_field() !!}
                    {!! method_field('patch') !!}
                    @include('shared.errors')
                    <div class="form-row my-2">
                        <div class="col">
                            <label> New Password </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col">
                            <label> Confirm Password </label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <input type='submit' class="btn btn-success" name='submit'>
                    <a href="{{ route('users.edit', [ 'id' => $user->id ]) }}" class="btn btn-info"> Edit Info </a>
                    <a href = "{{ route('users.index') }}" class="btn btn-primary ml-1"> Back </a>
                </form>
            </div>
        </div>
    </div>
@endsection
