@extends('layouts.admin')
@section('title', __('List Orders'))
@section('admin-content')
    <div class="card">
      <div class="card-header">{{ __('List Orders') }}</div>
      <div class="card-body">
        <div class="row mb-3">
            <div class="col-auto">
                <form action="{{ route('admin.orders.index') }}">
                    <div class="input-group">
                        <input type="text" value="{{ Request::query('query') }}" name="query" placeholder="Search..." class="form-control" id="inputGroupFile04" aria-describedby="searchGroup" aria-label="{{ __('Search Query') }}">
                        <button class="btn btn-secondary" type="submit" id="searchGroup">{{ __('Search') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <x-data-table
          :pagination="$orders"
          :heading="['Invoice ID', 'Customer', 'Products', 'Price Total', 'Status', 'Action']"
          item-view="admin.order.partials.item" />
      </div>
    </div>
@endsection