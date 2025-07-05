<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\PurchaseRequisition::all();
        return view('purchase_requisitions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Generate nomor otomatis, misal: PR250000025
        $last = \App\Models\PurchaseRequisition::latest()->first();
        $nextNumber = 'PR' . date('y') . str_pad(($last->id ?? 0) + 1, 8, '0', STR_PAD_LEFT);
        return view('purchase_requisitions.create', ['requestNumber' => $nextNumber]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_number' => 'required|unique:purchase_requisitions',
            'date' => 'required|date',
            'supplier' => 'required',
            'requester' => 'required',
            'qc_check' => 'required|boolean',
            'note' => 'nullable',
            'status' => 'required',
            'po_number' => 'nullable|string',
            'type' => 'nullable|string',
            'total_items' => 'nullable|integer|min:0',
        ]);
        \App\Models\PurchaseRequisition::create($validated);
        return redirect()->route('purchase-requisitions.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = \App\Models\PurchaseRequisition::findOrFail($id);
        return view('purchase_requisitions.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = \App\Models\PurchaseRequisition::findOrFail($id);
        return view('purchase_requisitions.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'request_number' => 'required',
            'date' => 'required|date',
            'supplier' => 'required',
            'requester' => 'required',
            'qc_check' => 'required|boolean',
            'note' => 'nullable',
            'status' => 'required',
            'po_number' => 'nullable|string',
            'type' => 'nullable|string',
            'total_items' => 'nullable|integer|min:0',
        ]);
        \App\Models\PurchaseRequisition::findOrFail($id)->update($validated);
        return redirect()->route('purchase-requisitions.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        \App\Models\PurchaseRequisition::findOrFail($id)->delete();
        return redirect()->route('purchase-requisitions.index')->with('success', 'Data berhasil dihapus!');
    }
}
