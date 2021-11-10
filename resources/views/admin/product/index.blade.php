@extends('layouts.admin')
@section('title', __('List Products'))
@section('admin-content')
    <div class="card">
      <div class="card-header">{{ __('List Products') }}</div>
      <div class="card-body">
        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ __('Add Product') }}</a>
            </div>
            <div class="col-auto ml-auto">
                <form action="{{ route('admin.products.index') }}">
                    <div class="input-group">
                        <input type="text" value="{{ Request::query('query') }}" name="query" placeholder="Search..." class="form-control" id="inputGroupFile04" aria-describedby="searchGroup" aria-label="{{ __('Search Query') }}">
                        <button class="btn btn-secondary" type="submit" id="searchGroup">{{ __('Search') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <x-data-table
          :pagination="$products"
          :heading="['#', 'Product', 'Price', 'Created At', 'Status', 'Action']"
          item-view="admin.product.partials.item" />
      </div>
    </div>
@endsection