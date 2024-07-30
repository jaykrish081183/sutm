<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'booking_dates',
        'street',
        'suburb',
        'postcode',
        'payment_method',
        'payment_amount',
        'payment_date',
        'payment_comment',
        'status',
        'comment',
    ];
}
