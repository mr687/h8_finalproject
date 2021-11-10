@extends('layouts.app')
@section('body-class', 'hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('admin.components.breadcrumb')
            </div>
        </div>
        <section class="content">
          <div class="container-fluid">
            {{-- Alert --}}
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @yield('admin-content')
          </div>
        </section>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/admin.js') }}"></script>
@endpush
