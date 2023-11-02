<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'invoice_id', 'date', 'job_number', 'customer_id', 'sender_id', 
        'receiver_id', 'collection_fee', 'handling_fee', 'total_fee', 'note'
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }
}