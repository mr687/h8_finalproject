<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::query()
            ->with('customer');
        if ($request->has('from'))
        {
            $invoices = $invoices->whereDate('created_at', '>=', $request->get('from'));
        }
        if ($request->has('to'))
        {
            $invoices = $invoices->whereDate('created_at', '<=', $request->get('to'));
        }
        return view('admin.report.index')
            ->withInvoices($invoices->paginate(10));
    }

    public function exportPdf()
    {
        $invoices = Invoice::with('customer')->get();
        $pdf = PDF::loadview(
            'admin.report.export-pdf',
            compact('invoices')
        )->setPaper('a4', 'landscape');
        
        $nowTimestamp = time();
        $filename = "Report_{$nowTimestamp}";
        return $pdf->stream($filename);
    }
}
