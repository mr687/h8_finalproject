@extends('layouts.admin')
@section('title', __('List Category'))
@section('admin-content')
<div class="row justify-content-center ">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">{{ __('Kategori Baru') }}</div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="newCategoryName" class="form-label fw-bold ">Nama Kategori</label>
                        <input type="text" class="form-control @error('newCategoryName') is-invalid @enderror"
                            name="newCategoryName" id="newCategoryName" required value="{{ old('newCategoryName') }}">
                        @error('newCategoryName')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="parentCategory">Kategori</label>
                        <select class="form-control fw-bold @error('parentCategory') is-invalid @enderror"
                            name="parentCategory" id="parentCategory">
                            <option value="">None</option>
                            @foreach ($parents as $parent)
                            <option value="{{ $parent->name }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        @error('parentCategory')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7">
        <div class="card">
            <div class="card-header">{{ __('List Products') }}</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="font-weight-bold">{{ $category->name}}</td>
                            <td class="">{{ $category->parent->name ?? '-'}}</td>
                            <td class="">{{ $category->created_at}}</td>
                            <td class="">
                                {{-- Edit --}}
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                    class="btn btn-warning" role="button"><i class="fas fa-edit"></i> Edit</a>
                                {{-- Delete --}}
                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                    method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure want to delete this data?')"><i
                                            class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
