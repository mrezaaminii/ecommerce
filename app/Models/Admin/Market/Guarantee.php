<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guarantee extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];
    public function product(){
        $this->belongsTo(Product::class);
    }
}
