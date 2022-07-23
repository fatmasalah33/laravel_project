<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    protected $table='usersphone';
    protected $fillable=[
        'phone_number','user_id'
    ];
    use HasFactory;
    use SoftDeletes;
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
