@extends('layouts.master')

@section('title', 'Product Details'
)
@section('top', 'Product Details')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Product Details</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" class="form-control" value="{{ $product->name }}" readonly>
            </div>
            {{-- <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control" value="Rp {{ number_format($product->price, 0, ',', '.') }}" readonly>
            </div> --}}
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" id="rating" class="form-control" value="{{ $product->rating }}" readonly>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" class="form-control" value="{{ $product->stock }}" readonly>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
