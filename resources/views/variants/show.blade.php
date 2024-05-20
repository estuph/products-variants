@extends('layouts.master')

@section('title', 'Variant Details')

@section('top', 'Variant Details')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Variant Details</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Variant Name</label>
                <input type="text" id="name" class="form-control" value="{{ $variant->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" class="form-control" value="{{ $variant->stock }}" readonly>
            </div>
            <a href="{{ route('products.variants.index', $variant->product_id) }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
