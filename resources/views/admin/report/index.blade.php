@extends('layouts.admin')
@section('title', __('Order Reports'))
@section('admin-content')
<div class="row justify-content-center">
    <div class="col-12 col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Order Reports') }}</div>
            <div class="card-body">
                <div class="text-right">
                    <form action="{{ route('admin.reports.index') }}" class="d-inline-block">
                        <div class="form-group mb-3 d-inline-block">
                            <label for="from" class="form-label ">From</label>
                            <input type="date"
                                class="form-control d-inline-block @error('from') is-invalid @enderror"
                                name="from" id="from" required value="{{ request()->get('from') ?? '' }}">
                            @error('from')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3 d-inline-block">
                            <label for="to" class="form-label  ">To</label>
                            <input type="date"
                                class="form-control d-inline-block @error('to') is-invalid @enderror"
                                name="to" id="to" required value="{{ request()->get('to') ?? '' }}">
                            @error('to')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn ml-2 btn-secondary">Filter</button>
                    </form>
                    <a class="btn btn-primary mx-3" href="{{ route('admin.reports.exportPdf') }}" role="button">Export PDF</a>
                </div>

                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">OrderID</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->order_id }}</td>
                            <td class="font-weight-bold">{{ $invoice->customer->user->name}}</td>
                            <td>@money($invoice->total)</td>
                            <td>{{ ucfirst($invoice->status) }}</td>
                            <td class="">{{ $invoice->created_at->format('l, d F Y H:i A')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right mt-2">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
