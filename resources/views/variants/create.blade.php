@extends('layouts.master')

@section('title', 'Create Variant')

@section('top', 'Create Variant')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Create Variant for {{ $product->name }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.variants.store', $product->id) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Variant Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection