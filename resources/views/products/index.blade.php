@extends('layouts.master')

@section('title', 'Products')

@section('top', 'Products')

@section('content')
<div class="section-header-button">
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Products List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Stock</th>
                            <th>Variants</th>
                            <th>Actions</th>
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
                                    <li>{{ $variant->name }} - Stock: {{ $variant->stock }} - Price: Rp {{ number_format($variant->price, 0, ',', '.') }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info mt-2">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mt-2">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mt-2" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('products.variants.create', $product->id) }}" class="btn btn-success mt-2">Add Variant</a>
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


@section('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    @endif
</script>
@endsection

