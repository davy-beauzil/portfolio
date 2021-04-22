<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
    use HasFactory;

    public function type_technologies(){
        return $this->hasOne(typeTechnologies::class);
    }
}
