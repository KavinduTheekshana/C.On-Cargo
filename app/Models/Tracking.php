<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'stop_id', 'departed_at', 'arrived_at', /* other fields */];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
