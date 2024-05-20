@extends('layouts.master')

@section('title', 'Add Product')

@section('top', 'Add Product')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Fill the form to add a new product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection



