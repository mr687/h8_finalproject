@php
    $type = 'primary';
    switch ($order->status) {
      case 'pending':
        $type = 'primary';
        break;
      case 'process':
        $type = 'success';
        break;
      case 'deliver':
        $type = 'warning';
        break;
      case 'done':
        $type = 'danger';
        break;
      default:
        $type = 'primary';
        break;
    }
@endphp

<span class="badge bg-{{$type}}">{{ ucfirst($order->status) }}</span>