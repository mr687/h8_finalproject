@extends('layouts.admin')
@section('title', __('List Orders'))
@section('admin-content')
<div class="row justify-content-center">
    <div class="col-12 col-md-10">
        <div class="card">
            <div class="card-header">{{ __('List Orders') }}</div>
            <div class="card-body">
                <div class="text-right">
                    <form action="{{ route('orders.filter') }}" method="POSt" class="d-inline-block">
                        @csrf
                        <div class="form-group mb-3 d-inline-block">
                            <label for="fromFilter" class="form-label ">From</label>
                            <input type="date"
                                class="form-control d-inline-block @error('fromFilter') is-invalid @enderror"
                                name="fromFilter" id="fromFilter" required value="{{ old('fromFilter') }}">
                            @error('fromFilter')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3 d-inline-block">
                            <label for="toFilter" class="form-label  ">To</label>
                            <input type="date"
                                class="form-control d-inline-block @error('toFilter') is-invalid @enderror"
                                name="toFilter" id="toFilter" required value="{{ old('toFilter') }}">
                            @error('toFilter')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary">Filter</button>
                    </form>
                    <a class="btn btn-primary my-2" href="{{ route('orders.export-pdf') }}" role="button">Export PDF</a>
                </div>

                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">InvoiceID</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td class="font-weight-bold">{{ $invoice->customer->user->name}}</td>
                            <td class="">{{$invoice->total}}</td>
                            <td class="">{{ $invoice->status}}</td>
                            <td class="">{{ $invoice->created_at}}</td>
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
