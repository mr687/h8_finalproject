@extends('layouts.admin')
@section('title', __('List Products'))
@section('admin-content')
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">{{ __('Add Product') }}</div>
              <div class="card-body">
                <div class="form-group mb-2">
                  <label for="name">{{ __('Product Name') }}</label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Product Name') }}" required autofocus>
                  @error('name')
                      <span class="error invalid-feedback">
                        {{ $message }}
                      </span>
                  @enderror
                </div>
                <div class="form-group mb-2">
                  <label for="description">{{ __('Product Description') }}</label>
                  <textarea name="description" class="@error('description') is-invalid @enderror" name="description" id="description" required></textarea>
                  @error('description')
                      <span class="error invalid-feedback">
                        {{ $message }}
                      </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6"></div>
        </div>
    </form>
@endsection

@push('scripts')
    <script defer>
      $(document).ready(function() {
        $('#description').summernote();
      })
    </script>
@endpush