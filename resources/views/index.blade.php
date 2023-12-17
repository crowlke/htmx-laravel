@extends('app')

@section('title', 'Products')

@section('content')

    <section hx-get="{{ route('products.index') }}" hx-trigger="loadProducts from:body" id="index">
        <h1>Product List</h1>

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
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <button hx-get="{{ route('products.show', $product->id) }}" hx-target="#productDetail">View</button>
                            <button hx-get="{{ route('products.edit', $product->id) }}" hx-target="#productForm">Edit</button>
                            <button hx-delete="{{ route('products.destroy', $product->id) }}" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' hx-target="closest tr">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <div id="productDetail"></div>
        <div id="productForm"></div>

    </section>


@endsection