<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;

    public function project(){
        return $this->hasOne(Project::class);
    }

    public function article(){
        return $this->hasOne(Article::class);
    }

    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
}
