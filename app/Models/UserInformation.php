<?php

namespace App\Models;

use App\constants\UserConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = 'user_informations';
    protected $fillable =
        [
            'name',
            'phone',
            'email',
            'address',
            'user_type'
        ];
    use HasFactory;
    public static function usertype(){
       return $usertype = [UserConstants::CUSTOMER,UserConstants::SUPPLIER,UserConstants::DEBTOR];
    }

    public function incomes(){
        return $this->hasMany(Income::class,'user_id',);
    }
    public function expenses(){
        return $this->hasMany(Expense::class,'user_id',);
    }
    public function debtors(){
    return $this->hasMany(Lend::class,'user_id',);
}
   /* protected static function booted () {
        static::deleting(function(UserInformation $user) {
            $user->incomes()->delete();
        });
    }*/
}
