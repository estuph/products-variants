@extends('layouts.master')

@section('title', 'Variants')
@section('top', 'Variants')

@section('content')
<div class="section-header">
    <h1>Variants for {{ $product->name }}</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Variants List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Variant Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variant as $variant)
                        <tr>
                            <td>{{ $variant->name }}</td>
                            <td>Rp {{ number_format($variant->price, 0, ',', '.') }}</td>
                            <td>{{ $variant->stock }}</td>
                            <td>
                                <a href="{{ route('variants.edit', $variant->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('variants.destroy', $variant->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
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

