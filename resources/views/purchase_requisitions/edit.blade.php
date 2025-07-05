@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Purchase Requisition (RM)</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('purchase-requisitions.update', $data->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Request Number *</label>
            <input type="text" name="request_number" class="form-control" value="{{ old('request_number', $data->request_number) }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Date *</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $data->date) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Suppliers *</label>
            <select name="supplier" class="form-select">
                <option value="">Pilih Suppliers</option>
                <option value="DOW INDONESIA PT">DOW INDONESIA PT</option>
                <option value="LAIN LAIN">LAIN LAIN</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Requester *</label>
            <select name="requester" class="form-select">
                <option value="">Pilih Requester</option>
                <option value="PPIC">PPIC</option>
                <option value="IT">IT</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Qc Check *</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="qc_check" value="1" id="qcY" {{ old('qc_check', $data->qc_check) ? 'checked' : '' }}>
                    <label class="form-check-label" for="qcY">Y</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="qc_check" value="0" id="qcN" {{ old('qc_check', !$data->qc_check) ? 'checked' : '' }}>
                    <label class="form-check-label" for="qcN">N</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea name="note" class="form-control" placeholder="Note.. (Opsional)">{{ old('note', $data->note) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status *</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $data->status) }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">PO Number</label>
            <input type="text" name="po_number" class="form-control" value="{{ old('po_number', $data->po_number) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $data->type) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Total Items</label>
            <input type="number" name="total_items" class="form-control" value="{{ old('total_items', $data->total_items) }}">
        </div>
        <div class="d-flex gap-2">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
