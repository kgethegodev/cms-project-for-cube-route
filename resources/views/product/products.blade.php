@extends('layouts.app')
@section('title', 'Products')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Products</h1>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session()->has('deleteMessage'))
                <div class="alert alert-warning">
                    {{ session()->get('deleteMessage') }}
                </div>
            @endif

            <a href="{{ route('addProduct') }}" type="button" class="btn btn-success mb-4">Add Product</a>


            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Variants</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td><a href="/{{ $product->id }}/variants" type="button" class="btn btn-light">Variants</a>
                            </td>
                            <td><a href="/edit-product/{{ $product->id }}" type="button" class="btn btn-primary ">Edit</a>
                            </td>
                            <td>
                                <form action="/delete-product" method="post">
                                    @csrf
                                    <input type="text" name="productID" id="" value={{ $product->id }} hidden>
                                    <button type="submit" type="button" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


            </table>
        </div>
    </div>

@endsection
