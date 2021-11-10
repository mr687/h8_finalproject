@extends('layouts.admin')
@section('title', __('Detail Order'))
@section('admin-content')
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-header">{{ __('Detail Order') }}</div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order->detail as $item)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $item->product->name }}</td>
                      <td>@money($item->product->price)</td>
                      <td>{{ $item->quantity }}</td>
                      <td>@money($item->total)</td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4">Total</th>
                  <th>@money($order->total)</th>
                </tr>
              </tfoot>
            </table>

            <div class="mt-4">
              <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setShipped', $order) }}" method="POST">
                @csrf
                <button type="submit" {{ !in_array($order->status, ['pending']) ? 'disabled' : '' }} class="btn btn-info">Set Processed</button>
              </form>
              <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setShipped', $order) }}" method="POST">
                @csrf
                <button type="submit" {{ !in_array($order->status, ['pending', 'process']) ? 'disabled' : '' }} class="btn btn-info">Set Delivered/Shipped</button>
              </form>
              <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setShipped', $order) }}" method="POST">
                @csrf
                <button type="submit" {{ !in_array($order->status, ['pending', 'process', 'deliver']) ? 'disabled' : '' }} class="btn btn-info">Set Done</button>
              </form>
              <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setShipped', $order) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              <a href="{{ route('admin.orders.index') }}" class="btn-secondary btn">{{ __('Cancel') }}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card">
          <div class="card-header">{{ __('Detail Customer') }}</div>
          <div class="card-body">
            <img src="{{ $order->customer->user->image_url }}" class="img img-thumbnail">
            <h4 class="my-4">{{ $order->customer->user->name }}</h4>
            <label class="text-muted">{{ __('Contact') }}</label>
            <p>
              {{ $order->customer->address }} <br>
              {{ $order->customer->phone }} <br>
              {{ $order->customer->user->email }} <br>
            </p>
          </div>
        </div>
      </div>
    </div>
@endsection