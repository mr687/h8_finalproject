@extends('layouts.admin')
@section('title', __('List Products'))
@section('admin-content')
    <div class="card">
      <div class="card-header">{{ __('List Products') }}</div>
      <div class="card-body">
        <x-data-table
          :pagination="$products"
          :heading="['#', 'Product', 'Price', 'Created At', 'Status', 'Action']"
          item-view="admin.product.partials.item" />
      </div>
    </div>
@endsection