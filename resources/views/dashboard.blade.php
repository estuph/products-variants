@extends('layouts.master')

@section('title', 'Dashboard')

@section('top', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <!-- Card for Users -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $userCount }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Card for Products -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-box"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Products</h4>
                    </div>
                    <div class="card-body">
                        {{ $productCount }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Card for Variants -->
        <div class="col-lg-4 col-md-6">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-cubes"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Variants</h4>
                    </div>
                    <div class="card-body">
                        {{ $variantCount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection