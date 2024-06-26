<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // If you want to use mass assignment for specific columns
    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'status'
        // Add other service-related fields here
    ];

    // If you want to guard against mass assignment and allow all other attributes
    // protected $guarded = ['id'];

    // Optionally, if you have dates that need to be cast to Carbon instances
    protected $dates = [
        'created_at',
        'updated_at',
        // Add any other date fields here
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // If you need to cast attributes to native types
    protected $casts = [
        'price' => 'float',
        // Add other casts here
    ];

    // Define relationships to other models if needed, for example, a service might have many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Add any other methods or relationship definitions here
}