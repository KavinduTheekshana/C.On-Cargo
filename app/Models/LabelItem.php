<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabelItem extends Model
{
    use HasFactory,SoftDeletes;

    public function label()
    {
        return $this->belongsTo(Label::class);
    }
}
