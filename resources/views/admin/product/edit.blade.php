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
                  <textarea name="description" class="summernote @error('description') is-invalid @enderror" name="description" id="description" required></textarea>
                  @error('description')
                      <span class="error invalid-feedback">
                        {{ $message }}
                      </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-body">
              <div class="form-group mb-2">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select @error('status') is-invalid @enderror" required>
                  <option value="Publish" {{ old('status') === 'Publish' ? 'selected=""' : '' }}>Publish</option>
                  <option value="Draft" {{ old('status') === 'Draft' ? 'selected=""' : '' }}>Draft</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="category">Category</label>
                <select name="category" id="category" class="select2 custom-select @error('category') is-invalid @enderror" required>
                  <option></option>
                  @foreach ($categories as $item)
                    <optgroup label="{{ $item->name }}">
                      @foreach($item->child as $child)
                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" required/>
              </div>
              <div class="form-group mb-2">
                <label for="weight">Weight <em>(gram)</em></label>
                <input type="number" id="weight" name="weight" class="form-control" required/>
              </div>
              <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control" required/>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </div>
          </div>
        </div>
    </form>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
      $('.summernote').summernote({
        height: 200,
        placeholder: "{{ __('Product Description') }}"
      });
    </script>
@endpush