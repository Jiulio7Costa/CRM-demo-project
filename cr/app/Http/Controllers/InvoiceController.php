<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer; // Make sure you have this import
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Fetch invoices with their associated customer using eager loading
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create(Request $request)
    {
        // Get the customer_id from the query string if it exists
        $customer_id = $request->query('customer_id');
        return view('invoices.create', compact('customer_id'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        // Find or create the customer
        $customer = Customer::firstOrCreate(
            ['email' => $validatedData['customer_email']],
            ['name' => $validatedData['customer_name']]
        );

        // Create the invoice using the validated data
        $invoice = new Invoice([
            'amount' => $validatedData['amount'],
            'due_date' => $validatedData['due_date'],
        ]);

        $invoice->customer()->associate($customer); // Associate the customer with the invoice
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        // Update customer information
        $customer = Customer::firstOrCreate(
            ['email' => $validatedData['customer_email']],
            ['name' => $validatedData['customer_name']]
        );

        $invoice->update([
            'amount' => $validatedData['amount'],
            'due_date' => $validatedData['due_date'],
        ]);

        $invoice->customer()->associate($customer); // Re-associate customer
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
