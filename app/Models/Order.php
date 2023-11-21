<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'fname',
        'lname',
        'email',
        'sub_total',
        'grand_total',
        'address',
        'country',
        'state',
        'zip',
        'status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
