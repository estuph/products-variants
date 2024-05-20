@extends('layouts.master')

@section('title', 'Products and Variants')
@section('top', 'Products and Variants')

@section('content')

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Products and Variants List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Rating</th>
                            <th>Product Stock</th>
                            <th>Variant Name</th>
                            <th>Variant Price</th>
                            <th>Variant Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <ul>
                                    @foreach ($product->variants as $variant)
                                    <li>{{ $variant->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($product->variants as $variant)
                                    <li>Rp {{ number_format($variant->price, 0, ',', '.') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($product->variants as $variant)
                                    <li>{{ $variant->stock }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

