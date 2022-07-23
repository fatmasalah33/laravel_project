<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    protected $table='usersphone';
    use HasFactory;
    use SoftDeletes;
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
