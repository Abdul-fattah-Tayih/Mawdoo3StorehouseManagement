@extends('shared.layout')
@section('title', 'Create Category')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 28rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light"> Create Category </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.store') }}">
                    {!! csrf_field() !!}
                    @include('shared.errors')
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <input type='submit' class="btn btn-success" name='submit'>
                    <a href = "{{url('categories')}}" class="btn btn-primary ml-1"> Back </a>
                </form>
            </div>
        </div>
    </div>
@endsection
