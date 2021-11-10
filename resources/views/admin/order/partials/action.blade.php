<div class="btn-group">
  <a type="button" class="btn btn-default" href="{{ route('admin.orders.show', $order) }}">Show</a>
  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu" role="menu" style="">
    <div class="dropdown-item">
      <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setProcessed', $order) }}" method="POST">
        @csrf
        <button type="submit" {{ !in_array($order->status, ['pending']) ? 'disabled' : '' }} class="btn btn-link p-0">Set Processed</button>
      </form>
    </div>
    <div class="dropdown-item">
      <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setShipped', $order) }}" method="POST">
        @csrf
        <button type="submit" {{ !in_array($order->status, ['pending', 'process']) ? 'disabled' : '' }} class="btn btn-link p-0">Set Delivered/Shipped</button>
      </form>
    </div>
    <div class="dropdown-item">
      <form class="confirm-form d-inline-block" action="{{ route('admin.orders.setDone', $order) }}" method="POST">
        @csrf
        <button type="submit" {{ !in_array($order->status, ['pending', 'process', 'deliver']) ? 'disabled' : '' }} class="btn btn-link p-0">Set Done</button>
      </form>
    </div>
    <div class="dropdown-divider"></div>
    <div class="dropdown-item">
      <form class="delete-form d-inline-block" action="{{ route('admin.orders.destroy', $order) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-link p-0">Delete</button>
      </form>
    </div>
  </div>
</div>