@extends('app')

@section('title', 'Products')

@section('content')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <button hx-get="{{ route('products.show', $product->id) }}" hx-target="#productDetail">View</button>
                    <button hx-get="{{ route('products.edit', $product->id) }}" hx-target="#productForm">Edit</button>
                    <button hx-delete="{{ route('products.destroy', $product->id) }}" hx-target="closest tr">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="productDetail"></div>
    <div id="productForm"></div>


@endsection