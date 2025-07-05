@extends('layouts.app')

@section('content')
<style>
    /* Gradient header for card */
    .custom-header {
        background: linear-gradient(90deg, #0d6efd 0%, #6f42c1 100%);
        color: #fff;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
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
    /* Tombol action hover */
    .btn-action:hover {
        filter: brightness(0.9) drop-shadow(0 0 5px #6f42c1);
        transition: 0.2s;
    }
    /* Hover row */
    .table-hover tbody tr:hover {
        background-color: #f3f0ff;
        transition: 0.2s;
    }
    /* Card shadow */
    .custom-card {
        border-radius: .5rem;
        box-shadow: 0 4px 24px 0 rgba(111,66,193,0.10);
    }
</style>
<div class="container">
    <div class="card custom-card fade-in">
        <div class="card-header custom-header d-flex align-items-center">
            <i class="bi bi-table me-2"></i>
            <h4 class="mb-0">Daftar Purchase Requisition</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Request Number</th>
                        <th>Date</th>
                        <th>Suppliers</th>
                        <th>Requester</th>
                        <th>QC Check</th>
                        <th>Note</th>
                        <th>PO Number</th>
                        <th>Type</th>
                        <th>Total Items</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i => $row)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><b>{{ $row->request_number }}</b></td>
                        <td>{{ $row->date }}</td>
                        <td>{{ $row->supplier }}</td>
                        <td>{{ $row->requester }}</td>
                        <td>
                            @if($row->qc_check)
                                <span class="badge bg-success">Y</span>
                            @else
                                <span class="badge bg-danger">N</span>
                            @endif
                        </td>
                        <td>{{ $row->note }}</td>
                        <td>{{ $row->po_number }}</td>
                        <td>
                            @if($row->type == 'RM')
                                <span class="badge bg-primary">RM</span>
                            @elseif($row->type == 'Other')
                                <span class="badge bg-secondary">Other</span>
                            @else
                                <span class="badge bg-light text-dark">{{ $row->type }}</span>
                            @endif
                        </td>
                        <td>{{ $row->total_items }}</td>
                        <td>
                            @if($row->status == 'Request')
                                <span class="badge bg-warning text-dark">Request</span>
                            @elseif($row->status == 'Closed')
                                <span class="badge bg-success">Closed</span>
                            @elseif($row->status == 'Created GRN')
                                <span class="badge bg-info text-dark">Created GRN</span>
                            @else
                                <span class="badge bg-secondary">{{ $row->status }}</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('purchase-requisitions.show', $row->id) }}" class="btn btn-info btn-sm btn-action">Detail</a>
                            <a href="{{ route('purchase-requisitions.edit', $row->id) }}" class="btn btn-warning btn-sm btn-action">Edit</a>
                            <form action="{{ route('purchase-requisitions.destroy', $row->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
