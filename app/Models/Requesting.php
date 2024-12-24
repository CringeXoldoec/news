<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requesting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'payment_metod',
        'date',
        'cource'
    ];
    public function user(){
        $this->belongsTo(User::class);
    }
    public function review(){
        $this->hasMany(Feedback::class);
    }
}
