<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
  public function index(Request $request)
  {
    $orders = Invoice::query();
    if ($request->has('query')) {
      $orders = $orders->whereHas('customer', function ($query) use ($request) {
        return $query->whereHas('user', function ($q) use ($request) {
          return $q->where('name', 'like', "%{$request->get('query')}%");
        });
      })
        ->orWhere('id', $request->get('query'));
    }
    return view('admin.order.index')
      ->withOrders($orders->paginate(10));
  }

  public function show(Request $request, Invoice $invoice)
  {
    return view('admin.order.show')
      ->withOrder($invoice);
  }

  public function setProcessed(Request $request, Invoice $invoice)
  {
    $invoice->update(['status' => 'process']);
    return redirect()
      ->route('admin.orders.index')
      ->with('success', 'Successfuly set order processed.');
  }

  public function setShipped(Request $request, Invoice $invoice)
  {
    $invoice->update(['status' => 'deliver']);
    return redirect()
      ->route('admin.orders.index')
      ->with('success', 'Successfuly set order shipped.');
  }

  public function setDone(Request $request, Invoice $invoice)
  {
    $invoice->update(['status' => 'done']);
    return redirect()
      ->route('admin.orders.index')
      ->with('success', 'Successfuly set order done.');
  }

  public function destroy(Request $request, Invoice $invoice)
  {
    $invoice->delete();
    return redirect()
      ->route('admin.orders.index')
      ->with('success', 'Successfuly order deleted.');
  }
}
