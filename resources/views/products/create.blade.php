@extends('shared.layout')
@section('title', 'Create Product')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light"> Create </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('products.store')}}">
                    {{ csrf_field() }}

                    @include('shared.errors')
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label> Description </label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label> Price </label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                        </div>
                        <div class="col">
                            <label> Quantity </label>
                            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Image </label>
                        <input value="{{ old('image') }}" type="text" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categories[]"> Categories </label>
                        <select name='categories[]' class="form-control" multiple>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type='submit' class="btn btn-success" name='submit'>
                    <a href = "{{url('products')}}" class="btn btn-primary ml-1"> Back </a>
                </form>
            </div>
        </div>
    </div>
@endsection
