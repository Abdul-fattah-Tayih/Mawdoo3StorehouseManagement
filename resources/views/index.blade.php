@extends('shared.layout')

@section('content')
    <div class="container text-center">
        <h1 class="font-weight-light my-3"> Storehouse Management </h1>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Product count</th>
                    <th>User count</th>
                    <th>Category count</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$analytics[0]['total_products']}}</td>
                    <td>{{$analytics[0]['total_users']}}</td>
                    <td>{{$analytics[0]['total_categories']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
