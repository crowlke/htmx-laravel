<form hx-put="{{ route('products.update', $product->id) }}" hx-swap="delete" hx-target="#productForm">
    @csrf
    @method('put')
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $product->name}}" required>
    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>

    <button type="submit">Update</button>
</form>