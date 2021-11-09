<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Code ini niatnya nampilin index dengan search, tapi belum bisa karena If nya tidak tervalidasi
        // if (!empty($request->fromFilter)) {
        //     $invoices = Invoice::with('customer')
        //     ->whereBetween('created_at', [$request->fromFilter, $request->toFilter])
        //     ->paginate(10);
        //     return view('admin.order.index')
        //         ->with([ 'invoices' => $invoices]);

        // } else {
        //     $invoices = Invoice::with('customer')
        //             ->paginate(10);
        //     return view('admin.order.index')
        //         ->with([ 'invoices' => $invoices]);
        // }

        $invoices = Invoice::with('customer')
                    ->paginate(10);
            return view('admin.order.index')
                ->with([ 'invoices' => $invoices]);

        
    }

    public function exportpdf()
    {
        $invoices = Invoice::with('customer')->get();
        $pdf = PDF::loadview('admin.order.exportpdf', compact('invoices'))->setPaper('a4', 'landscape');
        return $pdf->stream('invoices.pdf');
    }

    public function filter(Request $request) {
        $invoices = Invoice::with('customer')
            ->whereBetween('created_at', [$request->fromFilter, $request->toFilter])
            ->get();
            return view('admin.order.filter')
                ->with([ 'invoices' => $invoices]);
    }
}
