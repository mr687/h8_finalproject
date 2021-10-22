@props([
    'pagination', 
    'heading' => [],
    'item-view'
])

<div class="data-table">
    <div class="row mb-3">
        <div class="col-auto">
            <a href="#" class="btn btn-danger">{{ __('Mass Upload') }}</a>
        </div>
        <div class="col-auto">
            <a href="{{ route('products.create') }}" class="btn btn-primary">{{ __('Add Product') }}</a>
        </div>
        <div class="col-auto ml-auto">
            <form action="{{ route('products.index') }}">
                <div class="input-group">
                    <input type="text" value="{{ Request::query('query') }}" name="query" placeholder="Search..." class="form-control" id="inputGroupFile04" aria-describedby="searchGroup" aria-label="{{ __('Search Query') }}">
                    <button class="btn btn-secondary" type="submit" id="searchGroup">{{ __('Search') }}</button>
                </div>
            </form>
        </div>
    </div>
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
    {{ $pagination->links() }}
</div>