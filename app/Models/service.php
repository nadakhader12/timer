<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','icon','work_id','content'];


    public function work()
    {
        return $this->belongsTo(work::class)->withDefault();
    }
}
