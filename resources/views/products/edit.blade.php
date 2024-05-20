@extends('layouts.master')

@section('title', 'Edit Product')

@section('top', 'Edit Product')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Update the product details</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" value="{{ $product->rating }}" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

