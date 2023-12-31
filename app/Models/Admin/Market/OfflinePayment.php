<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePayment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function payments(){
        return $this->morphMany(Payment::class,'paymentable');
    }
}
