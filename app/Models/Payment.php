<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
      protected $fillable =['transaction_id','amount','paid_by','paid_for','paid_date'];

    public function createdBy(){
        return $this->belongsTo(User::class,'paid_by');
    }
    public function paidfor(){
        return $this->belongsTo(Booking::class,'paid_for');
    }
    use HasFactory;
}
