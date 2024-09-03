<?php

// app/Http/Controllers/PdfController.php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadInvoice(Invoice $invoice)
    {
        // Load the view and pass the invoice data
        $pdf = Pdf::loadView('invoices.pdf', ['invoice' => $invoice]);

        // Download the PDF
        return $pdf->download('invoice_' . $invoice->id . '.pdf');
    }
}
