<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Gig extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'logo',
        'company',
        'email',
        'website',
        'user_id',
        'location',
    ];
    protected $table = 'gigs';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
