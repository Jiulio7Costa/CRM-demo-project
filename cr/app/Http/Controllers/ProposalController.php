<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
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
        return view('proposals.create');
    }

    public function store(Request $request)
{
    $proposalData = $request->except('_token'); // Exclude the _token field
    $proposal = Proposal::create($proposalData);
    return redirect()->route('proposals.index');
}


    public function show(Proposal $proposal)
    {
        return view('proposals.show', compact('proposal'));
    }

    public function edit(Proposal $proposal)
    {
        return view('proposals.edit', compact('proposal'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        $proposal->update($request->all());
        return redirect()->route('proposals.index');
    }

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('proposals.index');
    }
}
