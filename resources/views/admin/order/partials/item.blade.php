<tr>
  <td><a href="{{ route('admin.orders.show', $item) }}"><u>{{ $item->id }}</u></a></td>
  <td><b>{{ $item->customer->user->name }}</b></td>
  <td>{{ $item->detail->count() }} product</td>
  <td>@money($item->total)</td>
  <td>@include('admin.order.partials.status', ['order' => $item])</td>
  <td>@include('admin.order.partials.action', ['order' => $item])</td>
</tr>