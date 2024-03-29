<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsApp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Event(){
        return $this->hasMany(Event::class,'app_id','id');
    }
}
