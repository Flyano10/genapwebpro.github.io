@extends('layouts.app')

@section('content')
<style>
    /* Gradient header */
    .custom-header {
        background: linear-gradient(90deg, #0d6efd 0%, #6f42c1 100%);
        color: #fff;
    }
    /* Tombol hover */
    .btn-primary.shadow:hover {
        background-color: #4b2997;
        box-shadow: 0 0 10px #6f42c1;
        transition: 0.2s;
    }
    .btn-outline-secondary:hover {
        background-color: #adb5bd;
        color: #fff;
        transition: 0.2s;
    }
    /* Animasi fade-in */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInMove 0.7s ease-out forwards;
    }
    @keyframes fadeInMove {
        to {
            opacity: 1;
            transform: none;
        }
    }
</style>
<div class="container">
    <div class="card shadow-sm fade-in">
        <div class="card-header custom-header">
            <h4 class="mb-0">Tambah Purchase Requisition (RM)</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('purchase-requisitions.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Request Number *</label>
                        <input type="text" name="request_number" class="form-control" value="{{ old('request_number', $requestNumber ?? '') }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Suppliers *</label>
                        <select name="supplier" class="form-select">
                            <option value="">Pilih Suppliers</option>
                            <option value="DOW INDONESIA PT" {{ old('supplier') == 'DOW INDONESIA PT' ? 'selected' : '' }}>DOW INDONESIA PT</option>
                            <option value="LAIN LAIN" {{ old('supplier') == 'LAIN LAIN' ? 'selected' : '' }}>LAIN LAIN</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Requester *</label>
                        <select name="requester" class="form-select">
                            <option value="">Pilih Requester</option>
                            <option value="PPIC" {{ old('requester') == 'PPIC' ? 'selected' : '' }}>PPIC</option>
                            <option value="IT" {{ old('requester') == 'IT' ? 'selected' : '' }}>IT</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Qc Check *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="qc_check" value="1" id="qcY" {{ old('qc_check') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="qcY">
                                    <span class="badge bg-success">Y</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="qc_check" value="0" id="qcN" {{ old('qc_check') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="qcN">
                                    <span class="badge bg-danger">N</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status *</label>
                        <input type="text" name="status" class="form-control" value="Request" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">PO Number</label>
                        <input type="text" name="po_number" class="form-control" value="{{ old('po_number') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="">Pilih Type</option>
                            <option value="RM" {{ old('type') == 'RM' ? 'selected' : '' }}>RM</option>
                            <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Total Items</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                            <input type="number" name="total_items" class="form-control" value="{{ old('total_items', 0) }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Note</label>
                        <textarea name="note" class="form-control" placeholder="Note.. (Opsional)">{{ old('note') }}</textarea>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary shadow">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
