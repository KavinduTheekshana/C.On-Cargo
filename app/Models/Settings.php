<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'sltouk1kg',
        'sltouk2kg',
        'sltouk3kg',
        'sltouk4kg',
        'sltouk5kg',
        'uktosl1kg',
        'uktosl2kg',
        'uktosl3kg',
        'uktosl4kg',
        'uktosl5kg',
        'sltoukpkg',
        'uktoslpkgpersonal',
        'uktoslpkgcommercial',
        'sltoukdeandcolless12',
        'sltoukdeandcolmore12',
        'uktosldeandcolless20wp',
        'uktosldeandcolmore20wp',
        'uktosldeandcolless20owp',
        'uktosldeandcolmore20owp',
    ];
}
