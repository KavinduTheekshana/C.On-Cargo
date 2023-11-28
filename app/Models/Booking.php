<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    public function sender()
    {
        return $this->belongsTo(Customer::class, 'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo(Customer::class, 'receiver_id');
    }
}
