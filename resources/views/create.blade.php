@extends('app')

@section('title', 'Create product')

@section('content')
    <h1>Create Product</h1>

    <form hx-post="{{ route('products.store') }}" hx-target="#productList" hx-swap="outerHTML">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required>
        <button type="submit">Create</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Product List</a>
@endsection
