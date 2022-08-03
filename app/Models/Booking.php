<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =['booking_by','amount','booking_for','start_date','end_date','address'];

    public function createdBy(){
        return $this->belongsTo(User::class,'booking_by');
    }
    public function car(){
        return $this->belongsTo(Car::class,'booking_for');
    }

    use HasFactory;
}
