<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    // Allow mass assignment of these attributes
    protected $fillable = [
        'customer_id',
        'title',
        'description',
        'amount',
        '_token' // This should not be added here. Instead, ensure your form isn't sending the _token in the $request->all() array.
    ];
}
