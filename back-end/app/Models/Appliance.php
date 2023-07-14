<?php

namespace App\Models;

use App\Enums\ApplianceBrand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'voltage',
        'brand'
    ];
}
