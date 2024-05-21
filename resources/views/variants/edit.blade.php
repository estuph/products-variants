@extends('layouts.master')

@section('title', 'Edit Variant')

@section('top', 'Edit Variant')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Edit Variant: {{ $variant->name }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('variants.updateStock', $variant->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Variant Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $variant->name }}" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $variant->stock }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $variant->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection