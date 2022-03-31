<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'food_name',
        
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
