<?php
namespace App\Helpers;
use Morilog\Jalali\Jalalian;

class helper{
public static function jalaliDate($date,$format = '%A, %d %B %Y'){
    return Jalalian::forge($date)->format($format);
}
}
