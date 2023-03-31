<?php

namespace App\Models;

use services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class work extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','image','content'];

    public function service()
    {
        return $this->hasMany(service::class)->withDefault();
    }
}
