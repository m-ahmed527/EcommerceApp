<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'slug',
        'name',
        'description',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function orders(){
        return $this->belongsToMany(Orders::class)->withPivot('quantity');
    }
}
