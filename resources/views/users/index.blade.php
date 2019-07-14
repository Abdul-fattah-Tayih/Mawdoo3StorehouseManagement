@extends('shared.layout')
@section('title', 'Users list')
@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="font-weight-light"> Users list </h2>
            <a href = "{{url('users/create')}}" class="btn btn-primary"> Add User </a>
        </div>

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Products </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->products->count()}}</td>
                        <td>
                            <form class="d-inline" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$user->name}}')">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('users.edit', [ 'id' => $user->id ]) }}" class="btn btn-info"> Edit Info </a>
                            <a href="{{ route('users.editPassword', [ 'id' => $user->id ]) }}" class="btn btn-warning"> Edit Password </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
