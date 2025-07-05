<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_number', 'date', 'supplier', 'requester', 'qc_check', 'note', 'status',
        'po_number', 'type', 'total_items'
    ];
}
