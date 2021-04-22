<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Technology;

class typeTechnologies extends Model
{
    use HasFactory;

    public function technologies(){
        return $this->hasMany(Technology::class);
    }
}
