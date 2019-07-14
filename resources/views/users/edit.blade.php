@extends('shared.layout')
@section('title', 'Edit User')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 28rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light"> Edit {{$user->name}} </h3>
            </div>
            <div class="card-body">
                    <form method="POST" action="{{ route('users.update', [ 'id' => $user->id ]) }}">
                        {!! csrf_field() !!}
                        {!! method_field('patch') !!}
                        @include('shared.errors')
                        <div class="form-group">
                            <label> Full Name </label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label> E-mail </label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                        <input type='submit' class="btn btn-success" name='submit'>
                        <a href="{{ route('users.editPassword', [ 'id' => $user->id ]) }}" class="btn btn-warning"> Edit Password </a>
                        <a href = "{{url('users')}}" class="btn btn-primary ml-1"> Back </a>
                    </form>
            </div>
        </div>
    </div>
@endsection
