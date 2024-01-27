<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'date',
        'user_id'
    ];

    public function customers(){
        return $this->belongsTo(UserInformation::class,'user_id','id');
    }
}
