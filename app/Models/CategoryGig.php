<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGig extends Model
{
    protected $fillable = [
        'category_id',
        'gig_id',

    ];
    protected $table = 'category_gig';
    use HasFactory;
}
