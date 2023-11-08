<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use HasFactory,SoftDeletes;

    public function labelitems()
    {
        return $this->hasMany(LabelItem::class);
    }
}
