<?php

namespace App\Models\Admin\Market;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['user_id ','city_id','postal_code','address','no','recipient_first_name','unit','recipient_last_name','mobile','status'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
