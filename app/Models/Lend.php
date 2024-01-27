<?php

namespace App\Models;

use App\constants\StatusConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'amount',
        'issue_date',
        'due_date',
        'status',
        'user_id'
    ];
    public static function status(){
        return $status = [StatusConstants::DUE,StatusConstants::RETURNE];
    }
    public function debtors(){
        return $this->belongsTo(UserInformation::class,'user_id','id');
    }
}
