<?php

namespace App\Http\Controllers\Invoices;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Contracts\InvoicesServiceContract;
use Illuminate\Http\Request;

class DownloadInvoiceController extends Controller
{
    public function __invoke(Order $order, InvoicesServiceContract $invoiceService)
    {
        return $invoiceService->generate($order)->download();
    }
}
