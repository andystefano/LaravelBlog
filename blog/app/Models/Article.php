<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

public function scopeLatest($query){
    return $query->orderBy("id","desc");
}

    use HasFactory;
}
