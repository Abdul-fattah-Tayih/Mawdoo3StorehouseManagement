@extends('shared.layout')
@section('title', 'Products')
@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="font-weight-light"> Products list </h2>
            <a href = "{{url('products/create')}}" class="btn btn-primary"> Add Product </a>
        </div>

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Description </th>
                    <th> Category </th>
                    <th> Price </th>
                    <th> Quantity </th>
                    <th> Image </th>
                    <th> Created By </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                    <tr>
                        <td>{{$prod->name}}</td>
                        <td>{{$prod->description}} </td>
                        <td>
                            <ul>
                                @foreach ($prod->categories as $category)
                                    <li>{{$category->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$prod->price}}</td>
                        <td>
                            {{$prod->quantity}}
                            <form class="d-inline" method="POST" action="{{ route('products.decrement', [ 'id' => $prod->id]) }}">
                                {!! csrf_field() !!}
                                {!! method_field('patch') !!}
                                <button class="btn btn-primary"> Decrease </button>
                            </form>
                        </td>
                        <td><img class="img-thumbnail" style="max-width:200px;" src="{{$prod->image}}"></td>
                        <td>{{$prod->user->name}}</td>
                        <td>
                            <form class="d-inline" action="{{url('products', ['id'=>$prod->id])}}" method="post">
                                {!! method_field('delete') !!}
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{url('products/'.$prod->id.'/edit')}}" class="btn btn-warning"> Edit </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links("pagination::bootstrap-4") }}
    </div>
@endsection
