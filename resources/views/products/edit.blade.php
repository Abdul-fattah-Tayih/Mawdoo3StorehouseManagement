@extends('shared.layout')
@section('title', 'Edit Product')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height:75vh">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
                <h3 class="card-title font-weight-light">Edit {{$product->name}}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('products.update', ['id' => $product->id])}}">
                    {!! csrf_field() !!}
                    {!! method_field('patch') !!}
                    @include('shared.errors')
                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label> Description </label>
                        <input type="text" name="description" class="form-control" value="{{$product->description}}">
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label> Price </label>
                            <input type="text" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="col">
                            <label> Quantity </label>
                            <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Image </label>
                        <input type="text" name="image" class="form-control" value="{{$product->image}}">
                    </div>
                    <div class="form-group">
                        <label> Categories </label>
                        <select name='categories[]' class="form-control" multiple>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}" {{ in_array($cat->id, $product->categories->pluck('id')->toArray())? 'selected' : '' }}>{{$cat->name}}</option>
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
