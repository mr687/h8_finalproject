@extends('layouts.admin')
@section('title', __('List Category'))
@section('admin-content')
<div class="row justify-content-center ">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">{{ __('Edit Kategori') }} </div>
            <div class="card-body">

                {{-- Delete --}}
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post"
                    class="d-inline-block float-right mb-2 mx-1">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger d-inline-block"
                        onclick="return confirm('Are you sure want to delete this data?')">
                        <i class="fas fa-trash"></i>
                        Delete</button>
                </form>
                {{-- Back to categories --}}
                <a class="btn btn-success float-right mb-2 mx-1" href="{{ route('categories.index') }}" role="button">
                    <i class="fas fa-arrow-alt-circle-left"></i> Back</a>


                <form action="{{ route('categories.update',  ['category' => $category->id]) }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group mb-3">
                        <label for="newCategoryName" class="form-label fw-bold ">Nama Kategori</label>
                        <input type="text" class="form-control @error('newCategoryName') is-invalid @enderror"
                            name="newCategoryName" id="newCategoryName" required
                            value="{{ old('newCategoryName', $category->name) }}">
                        @error('newCategoryName')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="parentCategory">Kategori</label>
                        <select class="form-control fw-bold @error('parentCategory') is-invalid @enderror"
                            name="parentCategory" id="parentCategory" @if ($parentName==NULL) disabled @endif>

                            {{-- Tampilkan parent kategori data pertama --}}
                            <option value="{{ $parentName }}">{{ $parentName }}</option>

                            @foreach ($parentsCategories as $item)
                            @if ($parentName == $item->name)
                            @continue
                            @else
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('parentCategory')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-inline"> <i class="fas fa-edit"></i>Update</button>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection
