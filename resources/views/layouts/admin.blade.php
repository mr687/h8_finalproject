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
            @if (session('success'))
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="fas fa-check-circle fa-2x mr-3"></i>
                <div>
                  {{ session('success') }}
                </div>
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