@extends('shared.layout')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="font-weight-light"> Categories list </h2>
            <a href = "{{url('categories/create')}}" class="btn btn-primary"> Add Category </a>
        </div>

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Products in category </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->products->count()}}</td>
                        <td>
                            <form method="POST" class="d-inline" action="{{ route('categories.destroy', ['id' => $category->id]) }}">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$category->name}}?')">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('categories.edit', ['id'=> $category->id]) }}" class="btn btn-warning"> Edit </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>
@endsection
