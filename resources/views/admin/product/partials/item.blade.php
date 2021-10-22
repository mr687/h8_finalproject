<tr>
  <td>
    <img src="{{ $item->image_url }}" width="250" alt="{{ $item->name }}">
  </td>
  <td>
    <div class="font-weight-bold">{{ $item->name }}</div>
    <div class="font-weight-bold">Category: <span class="badge badge-info">{{ $item->category->name }}</span></div>
    <div class="font-weight-bold">Weight: <span class="badge badge-info">{{ $item->weight }} gr</span></div>
  </td>
  <td> @money($item->price) </td>
  <td> @date($item->created_at) </td>
  <td><span class="badge badge-secondary">{{ $item->status }}</span></td>
  <td>
    <a href="{{ route('products.edit', $item) }}" class="btn btn-sm btn-warning">
      <i class="fas fa-pencil-alt"></i>
      Edit
    </a>
    <form class="delete-form d-inline-block" action="{{ route('products.destroy', $item) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger">
        <i class="fas fa-trash"></i>
        Delete
      </button>
    </form>
  </td>
</tr>