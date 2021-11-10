@props([
    'pagination', 
    'heading' => [],
    'item-view'
])

<div class="data-table">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                @foreach ($heading as $item)
                    <th>{{ __($item) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($pagination->count())
                @each($itemView, $pagination->items(), 'item')
            @else
                <tr>
                    <td colspan="{{ count($heading) }}" class="text-center">No Data!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex">
        {{ $pagination->links() }}
        <div class="ml-3">Total item(s): {{ $pagination->total() }}</div>
    </div>
</div>