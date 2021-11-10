@extends('layouts.admin')
@section('title', __('Dashboard'))
@section('admin-content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-globe"></i>
          {{ __('Shop Activities') }}
        </h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>@money($totalProfit)</h3>
                <p>{{ __('Total Profit') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalCustomers ?? 0 }}</h3>
                <p>{{ __('Customers') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalCategories }}</h3>
                <p>{{ __('Product Categories') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalProducts }}</h3>
                <p>{{ __('Total Products') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalOrder['new'] }}</h3>
                <p>{{ __('New Orders') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalOrder['processed'] }}</h3>
                <p>{{ __('Processed Orders') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalOrder['shipped'] }}</h3>
                <p>{{ __('Shipped Orders') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalOrder['done'] }}</h3>
                <p>{{ __('Orders Done') }}</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection