@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Purchase Requisition</h4>
    <table class="table">
        <tr><th>Request Number</th><td>{{ $data->request_number }}</td></tr>
        <tr><th>Date</th><td>{{ $data->date }}</td></tr>
        <tr><th>Supplier</th><td>{{ $data->supplier }}</td></tr>
        <tr><th>Requester</th><td>{{ $data->requester }}</td></tr>
        <tr><th>QC Check</th><td>{{ $data->qc_check ? 'Y' : 'N' }}</td></tr>
        <tr><th>Note</th><td>{{ $data->note }}</td></tr>
        <tr><th>Status</th><td>
            @if($data->status == 'Request')
                <span class="badge bg-warning text-dark">Request</span>
            @elseif($data->status == 'Closed')
                <span class="badge bg-success">Closed</span>
            @elseif($data->status == 'Created GRN')
                <span class="badge bg-info text-dark">Created GRN</span>
            @else
                <span class="badge bg-secondary">{{ $data->status }}</span>
            @endif
        </td></tr>
        <tr><th>PO Number</th><td>{{ $data->po_number }}</td></tr>
        <tr><th>Type</th><td>
            @if($data->type == 'RM')
                <span class="badge bg-primary">RM</span>
            @elseif($data->type == 'Other')
                <span class="badge bg-secondary">Other</span>
            @else
                <span class="badge bg-light text-dark">{{ $data->type }}</span>
            @endif
        </td></tr>
        <tr><th>Total Items</th><td>{{ $data->total_items }}</td></tr>
    </table>
    <a href="{{ route('purchase-requisitions.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
