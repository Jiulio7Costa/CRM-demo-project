<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Customer; // Import the Customer model
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    public function create()
    {
        $customers = Customer::all(); // Retrieve all customers
        return view('proposals.create', compact('customers')); // Pass customers to the view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'priority' => 'required|string|in:low,medium,high',
            'status' => 'required|string|in:draft,submitted,approved,rejected',
            'customer_id' => 'required|exists:customers,id', // Validate customer_id
            'contact_info' => 'nullable|string',
            'comments' => 'nullable|string',
            'attachments.*' => 'file|mimes:jpg,png,pdf,docx|max:2048', // Validate file attachments
        ]);

        // Store the proposal
        $proposal = Proposal::create($validated);

        // Handle file attachments if any
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $filename = $attachment->store('attachments', 'public');
                // Save the filename to the proposal or a related model as needed
            }
        }

        return redirect()->route('proposals.index');
    }

    public function show(Proposal $proposal)
    {
        return view('proposals.show', compact('proposal'));
    }

    public function edit(Proposal $proposal)
    {
        $customers = Customer::all(); // Pass customers to the edit view
        return view('proposals.edit', compact('proposal', 'customers'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'priority' => 'required|string|in:low,medium,high',
            'status' => 'required|string|in:draft,submitted,approved,rejected',
            'customer_id' => 'required|exists:customers,id', // Validate customer_id
            'contact_info' => 'nullable|string',
            'comments' => 'nullable|string',
            'attachments.*' => 'file|mimes:jpg,png,pdf,docx|max:2048', // Validate file attachments
        ]);

        // Update the proposal
        $proposal->update($validated);

        // Handle file attachments if any
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $filename = $attachment->store('attachments', 'public');
                // Save the filename to the proposal or a related model as needed
            }
        }

        return redirect()->route('proposals.index');
    }

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('proposals.index');
    }
}
